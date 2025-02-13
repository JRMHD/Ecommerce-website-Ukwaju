<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Product statistics
        $totalProducts = Product::count();
        $latestProducts = Product::latest()->take(5)->get();

        // Order statistics
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $shippedOrders = Order::where('status', 'shipped')->count();
        $deliveredOrders = Order::where('status', 'delivered')->count();
        $latestOrders = Order::with('user')->latest()->take(5)->get();

        // Financial statistics from existing orders
        $totalRevenue = Order::where('status', 'delivered')->sum('total_price'); // Total earnings from completed orders
        $pendingRevenue = Order::where('status', 'pending')->sum('total_price'); // Revenue stuck in pending orders
        $shippedRevenue = Order::where('status', 'shipped')->sum('total_price'); // Revenue from shipped orders
        $averageOrderValue = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0; // Revenue per order

        // Customer statistics
        $totalCustomers = User::has('orders')->count(); // Customers who placed at least 1 order
        $latestCustomers = User::has('orders')->latest()->take(5)->get(); // Recent customers with orders

        return view('admin.dashboard', compact(
            'totalProducts',
            'latestProducts',
            'totalOrders',
            'pendingOrders',
            'shippedOrders',
            'deliveredOrders',
            'latestOrders',
            'totalRevenue',
            'pendingRevenue',
            'shippedRevenue',
            'averageOrderValue',
            'totalCustomers',
            'latestCustomers'
        ));
    }
}
