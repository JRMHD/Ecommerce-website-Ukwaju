<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch Cart Data
        $cart = Session::get('cart', []);
        $cartCount = count($cart);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        // Fetch Wishlist Data
        $wishlist = Session::get('wishlist', []);
        $wishlistCount = count($wishlist);

        // Fetch Order Data
        $pendingOrders = Order::with('items')
            ->where('user_id', Auth::id())
            ->where('status', '!=', 'delivered')
            ->orderBy('created_at', 'desc')
            ->limit(5) // Limit to last 5 pending orders
            ->get();

        $deliveredOrders = Order::with('items')
            ->where('user_id', Auth::id())
            ->where('status', 'delivered')
            ->orderBy('created_at', 'desc')
            ->limit(5) // Limit to last 5 delivered orders
            ->get();

        return view('dashboard', compact('cart', 'cartCount', 'total', 'wishlist', 'wishlistCount', 'pendingOrders', 'deliveredOrders'));
    }
}
