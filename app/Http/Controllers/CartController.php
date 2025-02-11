<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

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
}
