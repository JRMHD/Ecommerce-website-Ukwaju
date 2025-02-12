@extends('layouts.app')

@section('content')
    <div
        style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa; padding: 20px;">
        <div
            style="max-width: 600px; width: 100%; text-align: center; background-color: white; border-radius: 16px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 40px 20px;">
            <!-- Success Icon -->
            <div style="margin-bottom: 24px;">
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="40" cy="40" r="38" stroke="#10B981" stroke-width="4" />
                    <path d="M25 40L35 50L55 30" stroke="#10B981" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>

            <!-- Success Message -->
            <h2 style="color: #1F2937; font-size: 2rem; margin-bottom: 16px; font-weight: 600;">Thank You!</h2>
            <p style="color: #4B5563; font-size: 1.1rem; margin-bottom: 32px; line-height: 1.6;">
                Your order has been placed successfully. We'll send you an email with the order details shortly.
            </p>


            <!-- Navigation Buttons -->
            <div style="display: flex; flex-direction: column; gap: 12px; max-width: 300px; margin: 0 auto;">
                <a href="{{ url('my-orders') }}"
                    style="background-color: #4F46E5; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 500; transition: background-color 0.2s;">
                    View My Orders
                </a>

                <a href="{{ url('shop') }}"
                    style="background-color: #10B981; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 500; transition: background-color 0.2s;">
                    Continue Shopping
                </a>

                <a href="{{ url('/') }}"
                    style="background-color: white; color: #4B5563; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 500; border: 1px solid #E5E7EB; transition: background-color 0.2s;">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
@endsection
