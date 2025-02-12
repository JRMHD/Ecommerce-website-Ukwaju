@extends('layouts.app')

@section('content')
    <div style="background-color: #f8f9fa; min-height: 100vh; padding: 24px 16px;">
        <div class="container" style="max-width: 1200px; margin: 0 auto;">
            <!-- Order Header -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <div>
                    <h2 style="color: #1a202c; font-size: 1.875rem; font-weight: 600; margin-bottom: 8px;">Order
                        #{{ $order->id }}</h2>
                    <div style="display: inline-block; padding: 6px 12px; background-color: #EEF2FF; border-radius: 6px;">
                        <span style="color: #4F46E5; font-weight: 500;">{{ ucfirst($order->status) }}</span>
                    </div>
                </div>
                <a href="{{ route('user.orders.index') }}"
                    style="display: inline-flex; align-items: center; padding: 8px 16px; background-color: white; color: #4B5563; border: 1px solid #E5E7EB; border-radius: 6px; text-decoration: none; font-weight: 500;">
                    ← Back to Orders
                </a>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
                <!-- Delivery Details Card -->
                <div
                    style="background-color: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 24px;">
                    <h4 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin-bottom: 20px;">Delivery Details
                    </h4>
                    <div style="display: grid; gap: 16px;">
                        <div>
                            <div style="font-size: 0.875rem; color: #6B7280; margin-bottom: 4px;">Full Name</div>
                            <div style="color: #1F2937; font-weight: 500;">
                                {{ $order->shippingDetails->first_name ?? 'N/A' }}
                                {{ $order->shippingDetails->last_name ?? '' }}
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 0.875rem; color: #6B7280; margin-bottom: 4px;">Address</div>
                            <div style="color: #1F2937; font-weight: 500;">
                                {{ $order->shippingDetails->address ?? 'N/A' }}, {{ $order->shippingDetails->city ?? '' }}
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 0.875rem; color: #6B7280; margin-bottom: 4px;">Phone</div>
                            <div style="color: #1F2937; font-weight: 500;">{{ $order->shippingDetails->phone ?? 'N/A' }}
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 0.875rem; color: #6B7280; margin-bottom: 4px;">Email</div>
                            <div style="color: #1F2937; font-weight: 500;">{{ $order->shippingDetails->email ?? 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Card -->
                <div
                    style="background-color: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 24px;">
                    <h4 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin-bottom: 20px;">Order Summary
                    </h4>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        @php
                            $subtotal = $order->items->sum(function ($item) {
                                return $item->product_price * $item->quantity;
                            });
                        @endphp
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #6B7280;">Subtotal</span>
                            <span style="color: #1F2937; font-weight: 500;">${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div
                            style="display: flex; justify-content: space-between; padding-top: 12px; border-top: 1px solid #E5E7EB;">
                            <span style="color: #1F2937; font-weight: 600;">Total</span>
                            <span style="color: #1F2937; font-weight: 600; font-size: 1.125rem;">
                                ${{ number_format($subtotal, 2) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div
                style="background-color: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 24px; margin-top: 24px;">
                <h4 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin-bottom: 20px;">Order Items</h4>

                <div style="display: flex; flex-direction: column; gap: 16px;">
                    @foreach ($order->items as $item)
                        <div
                            style="display: grid; grid-template-columns: auto 1fr auto; gap: 16px; padding: 16px; border: 1px solid #E5E7EB; border-radius: 8px;">
                            <img src="{{ asset('storage/' . $item->product_image) }}" alt="{{ $item->product_name }}"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                            <div style="display: flex; flex-direction: column; justify-content: center;">
                                <div style="font-weight: 500; color: #1F2937; margin-bottom: 4px;">
                                    {{ $item->product_name }}</div>
                                <div style="font-size: 0.875rem; color: #6B7280;">
                                    Quantity: {{ $item->quantity }} × ${{ number_format($item->product_price, 2) }}
                                </div>
                            </div>

                            <div style="display: flex; align-items: center; font-weight: 600; color: #1F2937;">
                                ${{ number_format($item->product_price * $item->quantity, 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
