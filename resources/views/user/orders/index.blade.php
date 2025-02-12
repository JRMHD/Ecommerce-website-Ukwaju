@extends('layouts.app')

@section('content')
    <div style="background-color: #f8f9fa; min-height: 100vh; padding: 24px 16px;">
        <div class="container" style="max-width: 1200px; margin: 0 auto;">
            <h2 style="color: #1a202c; font-size: 1.875rem; font-weight: 600; margin-bottom: 24px;">My Orders</h2>

            <!-- Search and Filter Form -->
            <div
                style="background-color: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 20px; margin-bottom: 32px;">
                <form method="GET" action="{{ route('user.orders.index') }}">
                    <div
                        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; align-items: end;">
                        <div>
                            <label style="display: block; font-size: 0.875rem; color: #4a5568; margin-bottom: 8px;">Search
                                Orders</label>
                            <input type="text" name="search" placeholder="Search by Order ID or Product"
                                value="{{ request('search') }}"
                                style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 0.875rem;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.875rem; color: #4a5568; margin-bottom: 8px;">Filter
                                by Status</label>
                            <select name="status"
                                style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 0.875rem; background-color: white;">
                                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Orders
                                </option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped
                                </option>
                                <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered
                                </option>
                            </select>
                        </div>
                        <div>
                            <button type="submit"
                                style="width: 100%; padding: 10px; background-color: #4f46e5; color: white; border: none; border-radius: 6px; font-weight: 500; cursor: pointer; transition: background-color 0.2s;">
                                Search Orders
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Pending & Shipped Orders Section -->
            <div
                style="background-color: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 20px; margin-bottom: 32px;">
                <h4 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin-bottom: 20px;">Pending & Shipped
                    Orders</h4>

                @if ($pendingOrders->isEmpty())
                    <p style="color: #718096; text-align: center; padding: 20px;">No pending or shipped orders found.</p>
                @else
                    <div style="overflow-x: auto;">
                        @foreach ($pendingOrders as $order)
                            <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; margin-bottom: 16px;">
                                <div
                                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 16px; align-items: center;">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        @if ($order->items->isNotEmpty())
                                            <img src="{{ asset('storage/' . $order->items->first()->product_image) }}"
                                                alt="Product"
                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                        @endif
                                        <div>
                                            <div style="font-weight: 600; color: #2d3748;">Order #{{ $order->id }}</div>
                                            <div style="font-size: 0.875rem; color: #718096;">{{ ucfirst($order->status) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: right;">
                                        <div style="font-weight: 600; color: #2d3748;">
                                            ${{ number_format($order->total_price, 2) }}</div>
                                        <a href="{{ route('user.orders.show', $order->id) }}"
                                            style="display: inline-block; padding: 8px 16px; background-color: #4f46e5; color: white; text-decoration: none; border-radius: 6px; font-size: 0.875rem; margin-top: 8px;">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div style="margin-top: 20px;">
                        {{ $pendingOrders->links() }}
                    </div>
                @endif
            </div>

            <!-- Delivered Orders Section -->
            <div
                style="background-color: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 20px;">
                <h4 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin-bottom: 20px;">Delivered Orders</h4>

                @if ($deliveredOrders->isEmpty())
                    <p style="color: #718096; text-align: center; padding: 20px;">No delivered orders found.</p>
                @else
                    <div style="overflow-x: auto;">
                        @foreach ($deliveredOrders as $order)
                            <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; margin-bottom: 16px;">
                                <div
                                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 16px; align-items: center;">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        @if ($order->items->isNotEmpty())
                                            <img src="{{ asset('storage/' . $order->items->first()->product_image) }}"
                                                alt="Product"
                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                        @endif
                                        <div>
                                            <div style="font-weight: 600; color: #2d3748;">Order #{{ $order->id }}</div>
                                            <div style="font-size: 0.875rem; color: #718096;">{{ ucfirst($order->status) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: right;">
                                        <div style="font-weight: 600; color: #2d3748;">
                                            ${{ number_format($order->total_price, 2) }}</div>
                                        <a href="{{ route('user.orders.show', $order->id) }}"
                                            style="display: inline-block; padding: 8px 16px; background-color: #4f46e5; color: white; text-decoration: none; border-radius: 6px; font-size: 0.875rem; margin-top: 8px;">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div style="margin-top: 20px;">
                        {{ $deliveredOrders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
