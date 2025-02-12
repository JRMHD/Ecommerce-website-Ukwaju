@extends('layouts.admin')

@section('content')
    <div style="padding: 20px; max-width: 1400px; margin: 0 auto;">
        <!-- Success Message -->
        @if (session('success'))
            <div
                style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 style="color: #2d3748; font-size: 1.875rem; font-weight: 600; margin: 0;">
                <i class="fas fa-file-invoice" style="margin-right: 0.5rem;"></i> Order #{{ $order->id }}
            </h2>
            <span
                style="background-color: {{ $order->status === 'pending' ? '#fef3c7' : ($order->status === 'shipped' ? '#e6fffa' : '#f0fff4') }}; 
                         color: {{ $order->status === 'pending' ? '#92400e' : ($order->status === 'shipped' ? '#047481' : '#2f855a') }}; 
                         padding: 0.5rem 1rem; 
                         border-radius: 9999px; 
                         font-size: 0.875rem;
                         font-weight: 600;">
                <i class="fas {{ $order->status === 'pending' ? 'fa-clock' : ($order->status === 'shipped' ? 'fa-shipping-fast' : 'fa-check-circle') }}"
                    style="margin-right: 0.5rem;"></i>
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <!-- Delivery Details Card -->
        <div
            style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
            <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #e2e8f0;">
                <h3 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin: 0;">
                    <i class="fas fa-truck" style="margin-right: 0.5rem;"></i> Delivery Details
                </h3>
            </div>
            <div style="padding: 1.5rem;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                    <div>
                        <p style="margin: 0 0 1rem 0;">
                            <span style="color: #4a5568; font-weight: 600;">Recipient Name:</span><br>
                            {{ $order->shippingDetails->first_name ?? 'N/A' }}
                            {{ $order->shippingDetails->last_name ?? '' }}
                        </p>
                        <p style="margin: 0 0 1rem 0;">
                            <span style="color: #4a5568; font-weight: 600;">Address:</span><br>
                            {{ $order->shippingDetails->address ?? 'N/A' }}, {{ $order->shippingDetails->city ?? '' }},
                            {{ $order->shippingDetails->state ?? '' }}, {{ $order->shippingDetails->country ?? '' }} -
                            {{ $order->shippingDetails->zip_code ?? '' }}
                        </p>
                    </div>
                    <div>
                        <p style="margin: 0 0 1rem 0;">
                            <span style="color: #4a5568; font-weight: 600;">Phone:</span><br>
                            {{ $order->shippingDetails->phone ?? 'N/A' }}
                        </p>
                        <p style="margin: 0 0 1rem 0;">
                            <span style="color: #4a5568; font-weight: 600;">Email:</span><br>
                            {{ $order->shippingDetails->email ?? 'N/A' }}
                        </p>
                    </div>
                </div>
                <div style="margin-top: 1rem;">
                    <p style="margin: 0;">
                        <span style="color: #4a5568; font-weight: 600;">Additional Info/Remarks:</span><br>
                        {{ $order->shippingDetails->additional_info ?? 'N/A' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Order Items Card -->
        <div
            style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
            <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #e2e8f0;">
                <h3 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin: 0;">
                    <i class="fas fa-shopping-basket" style="margin-right: 0.5rem;"></i> Order Items
                </h3>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                    <thead>
                        <tr style="background-color: #f7fafc;">
                            <th
                                style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-box" style="margin-right: 0.5rem;"></i> Product
                            </th>
                            <th
                                style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-image" style="margin-right: 0.5rem;"></i> Image
                            </th>
                            <th
                                style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-dollar-sign" style="margin-right: 0.5rem;"></i> Price
                            </th>
                            <th
                                style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-sort-amount-up" style="margin-right: 0.5rem;"></i> Quantity
                            </th>
                            <th
                                style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-calculator" style="margin-right: 0.5rem;"></i> Subtotal
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr style="transition: background-color 0.2s; hover:background-color: #f7fafc;">
                                <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">{{ $item->product_name }}</td>
                                <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                    <img src="{{ asset('storage/' . $item->product_image) }}"
                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 0.375rem;">
                                </td>
                                <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                    ${{ number_format($item->product_price, 2) }}</td>
                                <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">{{ $item->quantity }}</td>
                                <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                                    ${{ number_format($item->product_price * $item->quantity, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Update Status Card -->
        <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
            <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #e2e8f0;">
                <h3 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin: 0;">
                    <i class="fas fa-edit" style="margin-right: 0.5rem;"></i> Update Status
                </h3>
            </div>
            <div style="padding: 1.5rem;">
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="margin-bottom: 1rem;">
                        <label for="status"
                            style="display: block; color: #4a5568; font-weight: 500; margin-bottom: 0.5rem;">
                            Select Status
                        </label>
                        <select name="status" id="status"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; appearance: none; background: url('data:image/svg+xml;charset=US-ASCII,<svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 10l5 5 5-5z\"/></svg>') no-repeat right 1rem center/1em; background-color: white;">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered
                            </option>
                        </select>
                    </div>
                    <button type="submit"
                        style="background-color: #48bb78; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; border: none; cursor: pointer; font-weight: 500; transition: background-color 0.2s;">
                        <i class="fas fa-save" style="margin-right: 0.5rem;"></i> Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @endpush
@endsection
