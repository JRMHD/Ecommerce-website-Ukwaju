<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Session::get('wishlist', []);

        return view('wishlist', compact('wishlist'));
    }

    public function addToWishlist($id)
    {
        $product = Product::findOrFail($id);
        $wishlist = Session::get('wishlist', []);

        // Store only the image path, not the full URL
        $image = json_decode($product->images, true)[0] ?? null;

        if (!isset($wishlist[$id])) {
            $wishlist[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $image // Store only filename, like cart does
            ];
        }

        Session::put('wishlist', $wishlist);

        return response()->json(['message' => 'Added to wishlist!', 'wishlist' => $wishlist]);
    }



    public function removeFromWishlist($id)
    {
        $wishlist = Session::get('wishlist', []);

        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
            Session::put('wishlist', $wishlist);
        }

        return response()->json(['message' => 'Removed from wishlist!', 'wishlist' => $wishlist]);
    }

    public function moveToCart($id)
    {
        $wishlist = Session::get('wishlist', []);
        $cart = Session::get('cart', []);

        if (isset($wishlist[$id])) {
            $cart[$id] = [
                'name' => $wishlist[$id]['name'],
                'price' => $wishlist[$id]['price'],
                'quantity' => 1,
                'image' => $wishlist[$id]['image'] // Keep filename only
            ];

            unset($wishlist[$id]);

            Session::put('wishlist', $wishlist);
            Session::put('cart', $cart);
        }

        return response()->json(['message' => 'Moved to cart!', 'cart' => $cart, 'wishlist' => $wishlist]);
    }


    public function moveAllToCart()
    {
        $wishlist = Session::get('wishlist', []);
        $cart = Session::get('cart', []);

        foreach ($wishlist as $id => $item) {
            if (!isset($cart[$id])) {
                $cart[$id] = [
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => 1,
                    'image' => $item['image']
                ];
            }
        }

        // Clear wishlist after moving items
        Session::forget('wishlist');
        Session::put('cart', $cart);

        return response()->json(['message' => 'All wishlist items moved to cart!', 'cart' => $cart]);
    }
}
