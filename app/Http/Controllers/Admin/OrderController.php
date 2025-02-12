<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderDeliveredMail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('items', 'user');

        // Search by Order ID or User Name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%$search%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            });
        }

        // Filter by Status (Exclude Delivered for Pending Orders)
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        } else {
            $query->where('status', '!=', 'delivered');
        }

        // Get pending & shipped orders
        $orders = $query->orderBy('created_at', 'desc')->paginate(10);

        // Get delivered orders separately
        $deliveredOrders = Order::with('items', 'user')
            ->where('status', 'delivered')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.orders.index', compact('orders', 'deliveredOrders'));
    }


    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        // Send email if order is marked as Delivered
        if ($request->status == 'delivered') {
            Mail::to($order->user->email)->send(new OrderDeliveredMail($order));
        }

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    // Delete an order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
