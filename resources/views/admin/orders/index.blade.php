@extends('layouts.admin')

@section('content')
    <div style="padding: 20px; max-width: 1400px; margin: 0 auto;">
        @if (session('success'))
            <div
                style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 style="color: #2d3748; font-size: 1.875rem; font-weight: 600; margin: 0;">
                <i class="fas fa-shopping-cart" style="margin-right: 0.5rem;"></i> Orders
            </h2>
        </div>

        <!-- Search & Filter Form -->
        <div
            style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
            <form method="GET" action="{{ route('admin.orders.index') }}">
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <div style="flex: 1 1 300px;">
                        <div style="position: relative;">
                            <i class="fas fa-search"
                                style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #718096;"></i>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search by Order ID or User..."
                                style="width: 100%; padding: 0.75rem 1rem 0.75rem 2.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s;">
                        </div>
                    </div>
                    <div style="flex: 1 1 200px;">
                        <select name="status"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; appearance: none; background: url('data:image/svg+xml;charset=US-ASCII,<svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 10l5 5 5-5z\"/></svg>') no-repeat right 1rem center/1em; background-color: white;">
                            <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Orders</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered
                            </option>
                        </select>
                    </div>
                    <div style="display: flex; gap: 0.5rem;">
                        <button type="submit"
                            style="background-color: #4299e1; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; border: none; cursor: pointer; transition: background-color 0.2s;">
                            <i class="fas fa-filter" style="margin-right: 0.5rem;"></i> Filter
                        </button>
                        <a href="{{ route('admin.orders.index') }}"
                            style="background-color: #718096; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; display: inline-flex; align-items: center; transition: background-color 0.2s;">
                            <i class="fas fa-undo" style="margin-right: 0.5rem;"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Pending & Shipped Orders -->
        <div
            style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
            <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #e2e8f0;">
                <h3 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin: 0;">
                    <i class="fas fa-clock" style="margin-right: 0.5rem;"></i> Pending & Shipped Orders
                </h3>
            </div>
            @if ($orders->isEmpty())
                <div style="padding: 2rem; text-align: center; color: #718096;">
                    <p>No pending or shipped orders found.</p>
                </div>
            @else
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                        <thead>
                            <tr style="background-color: #f7fafc;">
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-hashtag" style="margin-right: 0.5rem;"></i> Order ID
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-user" style="margin-right: 0.5rem;"></i> User
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-image" style="margin-right: 0.5rem;"></i> Image
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-dollar-sign" style="margin-right: 0.5rem;"></i> Total Price
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-info-circle" style="margin-right: 0.5rem;"></i> Status
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-cog" style="margin-right: 0.5rem;"></i> Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr style="transition: background-color 0.2s; hover:background-color: #f7fafc;">
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">#{{ $order->id }}</td>
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">{{ $order->user->name }}
                                    </td>
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                        @if ($order->items->isNotEmpty())
                                            <img src="{{ asset('storage/' . $order->items->first()->product_image) }}"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 0.375rem;">
                                        @else
                                            <span style="color: #718096;">N/A</span>
                                        @endif
                                    </td>
                                    <td
                                        style="padding: 1rem; border-bottom: 1px solid #e2e8f0; color: #2d3748; font-weight: 600;">
                                        ${{ number_format($order->total_price, 2) }}
                                    </td>
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                        <span
                                            style="background-color: {{ $order->status === 'pending' ? '#fef3c7' : '#f0fff4' }}; 
                                                     color: {{ $order->status === 'pending' ? '#92400e' : '#2f855a' }}; 
                                                     padding: 0.25rem 0.75rem; 
                                                     border-radius: 9999px; 
                                                     font-size: 0.875rem;">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                        <div style="display: flex; gap: 0.5rem;">
                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                                style="background-color: #4299e1; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem; transition: background-color 0.2s;">
                                                <i class="fas fa-eye" style="margin-right: 0.5rem;"></i> View
                                            </a>
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    style="background-color: #f56565; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; transition: background-color 0.2s;"
                                                    onclick="return confirm('Are you sure you want to delete this order?')">
                                                    <i class="fas fa-trash-alt" style="margin-right: 0.5rem;"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="padding: 1rem; display: flex; justify-content: center;">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            @endif
        </div>

        <!-- Delivered Orders -->
        <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
            <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #e2e8f0;">
                <h3 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin: 0;">
                    <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i> Delivered Orders
                </h3>
            </div>
            @if ($deliveredOrders->isEmpty())
                <div style="padding: 2rem; text-align: center; color: #718096;">
                    <p>No delivered orders found.</p>
                </div>
            @else
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                        <thead>
                            <tr style="background-color: #f7fafc;">
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-hashtag" style="margin-right: 0.5rem;"></i> Order ID
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-user" style="margin-right: 0.5rem;"></i> User
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-image" style="margin-right: 0.5rem;"></i> Image
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-dollar-sign" style="margin-right: 0.5rem;"></i> Total Price
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-info-circle" style="margin-right: 0.5rem;"></i> Status
                                </th>
                                <th
                                    style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                    <i class="fas fa-cog" style="margin-right: 0.5rem;"></i> Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliveredOrders as $order)
                                <tr style="transition: background-color 0.2s; hover:background-color: #f7fafc;">
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">#{{ $order->id }}</td>
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">{{ $order->user->name }}
                                    </td>
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                        @if ($order->items->isNotEmpty())
                                            <img src="{{ asset('storage/' . $order->items->first()->product_image) }}"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 0.375rem;">
                                        @else
                                            <span style="color: #718096;">N/A</span>
                                        @endif
                                    </td>
                                    <td
                                        style="padding: 1rem; border-bottom: 1px solid #e2e8f0; color: #2d3748; font-weight: 600;">
                                        ${{ number_format($order->total_price, 2) }}
                                    </td>
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                        <span
                                            style="background-color: #f0fff4; color: #2f855a; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem;">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                        <div style="display: flex; gap: 0.5rem;">
                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                                style="background-color: #4299e1; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem; transition: background-color 0.2s;">
                                                <i class="fas fa-eye" style="margin-right: 0.5rem;"></i> View
                                            </a>
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    style="background-color: #f56565; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; transition: background-color 0.2s;"
                                                    onclick="return confirm('Are you sure you want to delete this order?')">
                                                    <i class="fas fa-trash-alt" style="margin-right: 0.5rem;"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="padding: 1rem; display: flex; justify-content: center;">
                    {{ $deliveredOrders->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @endpush
@endsection
