@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <div
        style="padding: 2.5rem 2rem; background: linear-gradient(135deg, #f8faff 0%, #f1f5ff 100%); border-radius: 20px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); margin: 1rem auto; max-width: 1400px;">
        <h1 style="font-size: 2.25rem; font-weight: 800; color: #1a1a1a; margin-bottom: 0.75rem; line-height: 1.2;">My
            Dashboard</h1>
        <p style="color: #64748b; font-size: 1.1rem;">Track your orders and manage your wishlist</p>
    </div>

    <!-- Main Grid Container -->
    <div style="max-width: 1400px; margin: 0 auto; padding: 0 1rem;">
        <!-- Summary Cards Grid -->
        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Shopping Cart Summary -->
            <div style="background: white; padding: 1.75rem; border-radius: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); border: 1px solid #f1f5f9; transition: transform 0.2s, box-shadow 0.2s;"
                onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.04)'">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3 style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Shopping Cart</h3>
                    <div style="background: #eef2ff; padding: 1rem; border-radius: 16px;">
                        <i class="fas fa-shopping-cart" style="color: #4f46e5; font-size: 1.25rem;"></i>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div
                        style="display: flex; justify-content: space-between; padding: 0.75rem; background: #f8fafc; border-radius: 12px;">
                        <span style="color: #64748b;">Total Items</span>
                        <span style="font-weight: 700; color: #1a1a1a;">{{ $cartCount }}</span>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; padding: 0.75rem; background: #f8fafc; border-radius: 12px;">
                        <span style="color: #64748b;">Total Price</span>
                        <span style="font-weight: 700; color: #1a1a1a;">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Cart Items -->
            @if (count($cart) > 0)
                <div
                    style="background: white; padding: 1.75rem; border-radius: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); border: 1px solid #f1f5f9;">
                    <h3 style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a; margin-bottom: 1.25rem;">Cart Items</h3>
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach ($cart as $item)
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; background: #f8fafc; border-radius: 12px; transition: transform 0.2s;"
                                onmouseover="this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.transform='translateY(0)'">
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div
                                        style="background: #e0e7ff; width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-box" style="color: #4f46e5; font-size: 1.25rem;"></i>
                                    </div>
                                    <div>
                                        <p style="font-weight: 600; color: #1a1a1a; margin-bottom: 0.25rem;">
                                            {{ $item['name'] }}</p>
                                        <p style="color: #64748b; font-size: 0.925rem;">Qty: {{ $item['quantity'] }}</p>
                                    </div>
                                </div>
                                <span
                                    style="font-weight: 700; color: #1a1a1a;">${{ number_format($item['price'], 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Orders Section -->
        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Pending Orders -->
            <div
                style="background: white; padding: 1.75rem; border-radius: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); border: 1px solid #f1f5f9;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3 style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Pending Orders</h3>
                    <div style="background: #fff7ed; padding: 1rem; border-radius: 16px;">
                        <i class="fas fa-clock" style="color: #ea580c; font-size: 1.25rem;"></i>
                    </div>
                </div>
                @if (count($pendingOrders) > 0)
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach ($pendingOrders as $order)
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: #f8fafc; border-radius: 12px; transition: all 0.2s;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <div>
                                    <strong style="color: #1a1a1a; font-size: 1.1rem;">Order #{{ $order->id }}</strong>
                                    <span
                                        style="background: #fff7ed; color: #ea580c; padding: 0.35rem 0.85rem; border-radius: 9999px; font-size: 0.875rem; margin-left: 0.75rem; font-weight: 500;">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                <a href="{{ route('user.orders.show', $order->id) }}"
                                    style="background: #4f46e5; color: white; padding: 0.75rem 1.25rem; border-radius: 12px; text-decoration: none; font-size: 0.925rem; font-weight: 500; transition: all 0.2s;"
                                    onmouseover="this.style.background='#4338ca'; this.style.transform='translateY(-2px)'"
                                    onmouseout="this.style.background='#4f46e5'; this.style.transform='translateY(0)'">
                                    View Details
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p
                        style="color: #64748b; text-align: center; padding: 1.5rem; background: #f8fafc; border-radius: 12px;">
                        No pending orders</p>
                @endif
            </div>

            <!-- Delivered Orders -->
            <div
                style="background: white; padding: 1.75rem; border-radius: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); border: 1px solid #f1f5f9;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3 style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a;">Delivered Orders</h3>
                    <div style="background: #f0fdf4; padding: 1rem; border-radius: 16px;">
                        <i class="fas fa-check-circle" style="color: #16a34a; font-size: 1.25rem;"></i>
                    </div>
                </div>
                @if (count($deliveredOrders) > 0)
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach ($deliveredOrders as $order)
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: #f8fafc; border-radius: 12px; transition: all 0.2s;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <div>
                                    <strong style="color: #1a1a1a; font-size: 1.1rem;">Order #{{ $order->id }}</strong>
                                    <span
                                        style="background: #f0fdf4; color: #16a34a; padding: 0.35rem 0.85rem; border-radius: 9999px; font-size: 0.875rem; margin-left: 0.75rem; font-weight: 500;">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                <a href="{{ route('user.orders.show', $order->id) }}"
                                    style="background: #4f46e5; color: white; padding: 0.75rem 1.25rem; border-radius: 12px; text-decoration: none; font-size: 0.925rem; font-weight: 500; transition: all 0.2s;"
                                    onmouseover="this.style.background='#4338ca'; this.style.transform='translateY(-2px)'"
                                    onmouseout="this.style.background='#4f46e5'; this.style.transform='translateY(0)'">
                                    View Details
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p
                        style="color: #64748b; text-align: center; padding: 1.5rem; background: #f8fafc; border-radius: 12px;">
                        No delivered orders yet</p>
                @endif
            </div>
        </div>

        <!-- Wishlist Section -->
        <div
            style="background: white; padding: 1.75rem; border-radius: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); border: 1px solid #f1f5f9; margin-bottom: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <div>
                    <h3 style="font-size: 1.4rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.5rem;">Wishlist</h3>
                    <p style="color: #64748b; font-size: 0.925rem;">Total Items: {{ $wishlistCount }}</p>
                </div>
                <div style="background: #fff1f2; padding: 1rem; border-radius: 16px;">
                    <i class="fas fa-heart" style="color: #e11d48; font-size: 1.25rem;"></i>
                </div>
            </div>
            @if (count($wishlist) > 0)
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem;">
                    @foreach ($wishlist as $id => $item)
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: #f8fafc; border-radius: 12px; transition: all 0.2s;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <div
                                    style="background: #fff1f2; width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-gift" style="color: #e11d48; font-size: 1.25rem;"></i>
                                </div>
                                <div>
                                    <p style="font-weight: 600; color: #1a1a1a; margin-bottom: 0.25rem;">
                                        {{ $item['name'] }}</p>
                                    <p style="color: #64748b; font-size: 0.925rem;">${{ number_format($item['price'], 2) }}
                                    </p>
                                </div>
                            </div>
                            <a href="/cart"
                                style="background: #16a34a; color: white; padding: 0.75rem 1.25rem; border-radius: 12px; text-decoration: none; font-size: 0.925rem; font-weight: 500; display: flex; align-items: center; gap: 0.5rem; transition: all 0.2s;"
                                onmouseover="this.style.background='#15803d'; this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.background='#16a34a'; this.style.transform='translateY(0)'">
                                <i class="fas fa-shopping-cart"></i>
                                Move to Cart
                            </a>
                        </div>
                    @endforeach
                </div>
                <div style="text-align: center; margin-top: 2rem;">
                    <a href="{{ route('wishlist.index') }}"
                        style="display: inline-flex; align-items: center; background: #4f46e5; color: white; padding: 1rem 2rem; border-radius: 12px; text-decoration: none; font-size: 1rem; font-weight: 500; transition: all 0.2s; gap: 0.75rem;"
                        onmouseover="this.style.background='#4338ca'; this.style.transform='translateY(-2px)'"
                        onmouseout="this.style.background='#4f46e5'; this.style.transform='translateY(0)'">
                        <i class="fas fa-heart" style="font-size: 1.1rem;"></i>
                        View Full Wishlist
                    </a>
                </div>
            @else
                <div style="background: #f8fafc; padding: 2rem; border-radius: 12px; text-align: center;">
                    <div
                        style="background: #fff1f2; width: 64px; height: 64px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <i class="fas fa-heart" style="color: #e11d48; font-size: 1.5rem;"></i>
                    </div>
                    <p style="color: #64748b; font-size: 1.1rem; margin-bottom: 1.5rem;">Your wishlist is empty</p>
                    <a href="{{ url('/shop') }}"
                        style="display: inline-flex; align-items: center; background: #4f46e5; color: white; padding: 0.75rem 1.5rem; border-radius: 12px; text-decoration: none; font-size: 0.925rem; font-weight: 500; transition: all 0.2s;"
                        onmouseover="this.style.background='#4338ca'; this.style.transform='translateY(-2px)'"
                        onmouseout="this.style.background='#4f46e5'; this.style.transform='translateY(0)'">
                        Browse Products
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
