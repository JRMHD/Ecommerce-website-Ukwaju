@extends('layouts.admin')

@section('content')
    <!-- Header with Search -->
    <div
        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; padding: 1.5rem; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
        <div>
            <h1 style="font-size: 2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.5rem;">Admin Dashboard</h1>
            <p style="color: #64748b;">Manage your platform efficiently.</p>
        </div>
        {{-- <div style="position: relative;">
            <input type="text" placeholder="Search..."
                style="padding: 0.75rem 1rem 0.75rem 2.5rem; border: 1px solid #e5e7eb; border-radius: 12px; width: 250px; background: white;">
            <i class="fas fa-search"
                style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
        </div> --}}
    </div>

    <!-- Stats Overview Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
        <!-- Total Products -->
        <div style="background: white; padding: 1.25rem; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 1px solid #e5e7eb; transition: all 0.3s;"
            onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="display: flex; justify-content: space-between; align-items: start;">
                <div>
                    <p style="color: #6b7280; font-size: 0.875rem;">Total Products</p>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-top: 0.5rem;">{{ $totalProducts }}</h3>
                </div>
                <div style="background: #eef2ff; padding: 0.75rem; border-radius: 12px;">
                    <i class="fas fa-box" style="color: #4f46e5;"></i>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div style="background: white; padding: 1.25rem; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 1px solid #e5e7eb; transition: all 0.3s;"
            onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="display: flex; justify-content: space-between; align-items: start;">
                <div>
                    <p style="color: #6b7280; font-size: 0.875rem;">Total Orders</p>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-top: 0.5rem;">{{ $totalOrders }}</h3>
                </div>
                <div style="background: #f0fdf4; padding: 0.75rem; border-radius: 12px;">
                    <i class="fas fa-shopping-cart" style="color: #16a34a;"></i>
                </div>
            </div>
        </div>

        <!-- Pending Orders -->
        <div style="background: white; padding: 1.25rem; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 1px solid #e5e7eb; transition: all 0.3s;"
            onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="display: flex; justify-content: space-between; align-items: start;">
                <div>
                    <p style="color: #6b7280; font-size: 0.875rem;">Pending Orders</p>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-top: 0.5rem;">{{ $pendingOrders }}</h3>
                </div>
                <div style="background: #fef3c7; padding: 0.75rem; border-radius: 12px;">
                    <i class="fas fa-clock" style="color: #d97706;"></i>
                </div>
            </div>
        </div>

        <!-- Shipped Orders -->
        <div style="background: white; padding: 1.25rem; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 1px solid #e5e7eb; transition: all 0.3s;"
            onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="display: flex; justify-content: space-between; align-items: start;">
                <div>
                    <p style="color: #6b7280; font-size: 0.875rem;">Shipped Orders</p>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-top: 0.5rem;">{{ $shippedOrders }}</h3>
                </div>
                <div style="background: #f1f5f9; padding: 0.75rem; border-radius: 12px;">
                    <i class="fas fa-shipping-fast" style="color: #475569;"></i>
                </div>
            </div>
        </div>

        <!-- Delivered Orders -->
        <div style="background: white; padding: 1.25rem; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 1px solid #e5e7eb; transition: all 0.3s;"
            onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="display: flex; justify-content: space-between; align-items: start;">
                <div>
                    <p style="color: #6b7280; font-size: 0.875rem;">Delivered Orders</p>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-top: 0.5rem;">{{ $deliveredOrders }}</h3>
                </div>
                <div style="background: #f3e8ff; padding: 0.75rem; border-radius: 12px;">
                    <i class="fas fa-check-circle" style="color: #7e22ce;"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Financial Overview -->
    <div
        style="background: white; padding: 1.5rem; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; font-weight: 600; color: #1a1a1a; margin-bottom: 1.5rem;">Financial Overview</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1rem;">
            <!-- Total Revenue -->
            <div
                style="padding: 1.25rem; background: linear-gradient(135deg, #dcfce7 0%, #f0fdf4 100%); border-radius: 12px;">
                <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                    <i class="fas fa-dollar-sign" style="color: #16a34a; margin-right: 0.5rem;"></i>
                    <span style="color: #166534; font-size: 0.875rem;">Total Revenue</span>
                </div>
                <p style="font-size: 1.5rem; font-weight: 700; color: #166534;">${{ number_format($totalRevenue, 2) }}</p>
            </div>

            <!-- Pending Revenue -->
            <div
                style="padding: 1.25rem; background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%); border-radius: 12px;">
                <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                    <i class="fas fa-hourglass-half" style="color: #c2410c; margin-right: 0.5rem;"></i>
                    <span style="color: #9a3412; font-size: 0.875rem;">Pending Revenue</span>
                </div>
                <p style="font-size: 1.5rem; font-weight: 700; color: #9a3412;">${{ number_format($pendingRevenue, 2) }}</p>
            </div>

            <!-- Shipped Revenue -->
            <div
                style="padding: 1.25rem; background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); border-radius: 12px;">
                <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                    <i class="fas fa-truck" style="color: #1d4ed8; margin-right: 0.5rem;"></i>
                    <span style="color: #1e40af; font-size: 0.875rem;">Shipped Revenue</span>
                </div>
                <p style="font-size: 1.5rem; font-weight: 700; color: #1e40af;">${{ number_format($shippedRevenue, 2) }}</p>
            </div>

            <!-- Average Order Value -->
            <div
                style="padding: 1.25rem; background: linear-gradient(135deg, #f3e8ff 0%, #ede9fe 100%); border-radius: 12px;">
                <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                    <i class="fas fa-chart-line" style="color: #7e22ce; margin-right: 0.5rem;"></i>
                    <span style="color: #6b21a8; font-size: 0.875rem;">Avg Order Value</span>
                </div>
                <p style="font-size: 1.5rem; font-weight: 700; color: #6b21a8;">${{ number_format($averageOrderValue, 2) }}
                </p>
            </div>
        </div>
    </div>

    <!-- Latest Orders -->
    <div
        style="background: white; padding: 1.5rem; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h2 style="font-size: 1.25rem; font-weight: 600; color: #1a1a1a;">Latest Orders</h2>
            <a href="{{ route('admin.orders.index') }}"
                style="display: inline-flex; align-items: center; background: #4f46e5; color: white; padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-size: 0.875rem; transition: all 0.2s;"
                onmouseover="this.style.background='#4338ca'" onmouseout="this.style.background='#4f46e5'">
                View All
                <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
            </a>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0;">
                <thead>
                    <tr>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            #</th>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            Order ID</th>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            Customer</th>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            Total</th>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            Status</th>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestOrders as $order)
                        <tr style="transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'"
                            onmouseout="this.style.background='white'">
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">{{ $loop->iteration }}</td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">#{{ $order->id }}</td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">{{ $order->user->name }}</td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">
                                ${{ number_format($order->total_price, 2) }}</td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">
                                <span
                                    style="padding: 0.375rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 500;
                                    {{ $order->status == 'pending' ? 'background: #fef3c7; color: #92400e;' : '' }}
                                    {{ $order->status == 'shipped' ? 'background: #f1f5f9; color: #475569;' : '' }}
                                    {{ $order->status == 'delivered' ? 'background: #dcfce7; color: #166534;' : '' }}">
                                    <i class="fas {{ $order->status == 'pending' ? 'fa-clock' : ($order->status == 'shipped' ? 'fa-truck' : 'fa-check-circle') }}"
                                        style="margin-right: 0.25rem;"></i>
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">
                                {{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Latest Customers -->
    <div style="background: white; padding: 1.5rem; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h2 style="font-size: 1.25rem; font-weight: 600; color: #1a1a1a;">Latest Customers</h2>
            <a href="{{ route('admin.customers.index') }}"
                style="display: inline-flex; align-items: center; background: #4f46e5; color: white; padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-size: 0.875rem; transition: all 0.2s;"
                onmouseover="this.style.background='#4338ca'" onmouseout="this.style.background='#4f46e5'">
                View All
                <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
            </a>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0;">
                <thead>
                    <tr>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            #</th>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            Customer Name</th>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            Email</th>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            Orders</th>
                        <th
                            style="padding: 1rem; text-align: left; background: #f8fafc; color: #64748b; font-weight: 500; border-bottom: 1px solid #e5e7eb;">
                            Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestCustomers as $customer)
                        <tr style="transition: background 0.2s;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.background='#f8fafc';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.background='white';">
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">{{ $loop->iteration }}</td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">
                                <div style="display: flex; align-items: center;">
                                    <div
                                        style="width: 32px; height: 32px; background: #e0e7ff; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 0.75rem;">
                                        <i class="fas fa-user" style="color: #4f46e5; font-size: 0.875rem;"></i>
                                    </div>
                                    {{ $customer->name }}
                                </div>
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">{{ $customer->email }}</td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">
                                <span
                                    style="background: #f0fdf4; color: #166534; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem;">
                                    {{ $customer->orders->count() }}
                                </span>
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">
                                {{ $customer->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
