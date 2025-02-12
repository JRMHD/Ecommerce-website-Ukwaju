<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('items')
            ->where('user_id', Auth::id()) // Ensure users only see their own orders
            ->orderBy('created_at', 'desc');

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%$search%")
                    ->orWhereHas('items', function ($q) use ($search) {
                        $q->where('product_name', 'like', "%$search%");
                    });
            });
        }

        // Filter by order status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Separate delivered orders
        $pendingOrders = $query->where('status', '!=', 'delivered')->paginate(10);
        $deliveredOrders = Order::with('items')
            ->where('user_id', Auth::id())
            ->where('status', 'delivered')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.orders.index', compact('pendingOrders', 'deliveredOrders'));
    }


    public function show($id)
    {
        // Ensure user can only access their own orders
        $order = Order::with('items')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('user.orders.show', compact('order'));
    }
}
