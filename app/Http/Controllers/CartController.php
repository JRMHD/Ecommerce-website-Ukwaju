<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\ShippingAddress;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedMail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        if (request()->ajax()) {
            return response()->json([
                'cart_count' => count($cart),
                'cart_total' => $total
            ]);
        }

        return view('cart', compact('cart', 'total'));
    }


    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => json_decode($product->images, true)[0] ?? null
            ];
        }

        Session::put('cart', $cart);

        return response()->json(['message' => 'Added to cart!', 'cart' => $cart]);
    }

    public function removeFromCart($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return response()->json(['message' => 'Removed from cart!', 'cart' => $cart]);
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, intval($request->quantity));
            session()->put('cart', $cart);
        }

        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return response()->json([
            'message' => 'Cart updated successfully',
            'newTotal' => $total
        ]);
    }

    public function checkout()
    {
        $cart = Session::get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        // Get the user's shipping address
        $shippingAddress = ShippingAddress::where('user_id', Auth::id())->first();

        return view('checkout', compact('cart', 'total', 'shippingAddress'));
    }

    public function saveAddress(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $address = ShippingAddress::updateOrCreate(
            ['user_id' => Auth::id()],
            $request->all()
        );

        return redirect()->back()->with('success', 'Address saved successfully!');
    }


    public function completeOrder()
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        $user = Auth::user();
        $shippingAddress = ShippingAddress::where('user_id', $user->id)->first();

        if (!$shippingAddress) {
            return redirect()->back()->with('error', 'Please add a shipping address first.');
        }

        // Calculate total price
        $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'shipping_address' => json_encode($shippingAddress), // Store as JSON
        ]);

        // Save order items
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'product_name' => $item['name'],
                'product_price' => $item['price'],
                'quantity' => $item['quantity'],
                'product_image' => $item['image'],
            ]);
        }

        // Send order confirmation email
        Mail::to($user->email)->send(new OrderPlacedMail($order));

        // Clear cart session
        Session::forget('cart');

        return redirect()->route('order.success')->with('success', 'Order placed successfully! A confirmation email has been sent.');
    }

    public function orderSuccess()
    {
        return view('checkout.success'); // Ensure you have this view file
    }

    public function paypalCheckout()
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $totalPrice
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel')
            ]
        ]);

        if (isset($response['id']) && $response['status'] == 'CREATED') {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('cart.index')->with('error', 'Something went wrong!');
    }

    public function paypalCancel()
    {
        return redirect()->route('checkout')->with('error', 'You have canceled the PayPal payment.');
    }
}
