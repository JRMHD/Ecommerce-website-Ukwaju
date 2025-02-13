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
        <div
            style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 style="color: #2d3748; font-size: 1.5rem; font-weight: 600; margin: 0;">
                <i class="fas fa-users" style="margin-right: 0.5rem;"></i> Customers Who Placed Orders
            </h2>
            <a href="{{ route('admin.customers.export') }}"
                style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; display: inline-flex; align-items: center; transition: background-color 0.2s; font-size: 0.875rem;">
                <i class="fas fa-file-export" style="margin-right: 0.5rem;"></i> Export as CSV
            </a>
        </div>

        <!-- Search Form -->
        <div
            style="background-color: white; padding: 1rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
            <form method="GET" action="{{ route('admin.customers.index') }}">
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="width: 100%;">
                        <div style="position: relative;">
                            <i class="fas fa-search"
                                style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #718096;"></i>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search by Name or Email..."
                                style="width: 100%; padding: 0.75rem 1rem 0.75rem 2.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s; font-size: 0.875rem;">
                        </div>
                    </div>
                    <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                        <button type="submit"
                            style="flex: 1; background-color: #4299e1; color: white; padding: 0.75rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer; transition: background-color 0.2s; font-size: 0.875rem; min-width: 120px;">
                            <i class="fas fa-search" style="margin-right: 0.5rem;"></i> Search
                        </button>
                        <a href="{{ route('admin.customers.index') }}"
                            style="flex: 1; background-color: #718096; color: white; padding: 0.75rem 1rem; border-radius: 0.375rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; transition: background-color 0.2s; font-size: 0.875rem; min-width: 120px;">
                            <i class="fas fa-undo" style="margin-right: 0.5rem;"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Customers List (Card View for Mobile) -->
        <div style="display: grid; gap: 1rem; grid-template-columns: 1fr;">
            @forelse($customers as $customer)
                <div
                    style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); padding: 1rem;">
                    <div style="margin-bottom: 0.5rem;">
                        <div style="color: #718096; font-size: 0.875rem; margin-bottom: 0.25rem;">
                            <i class="fas fa-user" style="margin-right: 0.5rem;"></i> Name
                        </div>
                        <div style="color: #2d3748; font-weight: 500;">{{ $customer->name }}</div>
                    </div>
                    <div>
                        <div style="color: #718096; font-size: 0.875rem; margin-bottom: 0.25rem;">
                            <i class="fas fa-envelope" style="margin-right: 0.5rem;"></i> Email
                        </div>
                        <div style="color: #2d3748; word-break: break-all;">{{ $customer->email }}</div>
                    </div>
                </div>
            @empty
                <div
                    style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); padding: 2rem; text-align: center; color: #718096;">
                    <i class="fas fa-info-circle" style="margin-right: 0.5rem;"></i> No customers found.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div style="margin-top: 2rem; display: flex; justify-content: center;">
            {{ $customers->appends(request()->query())->links() }}
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            /* Additional responsive styles */
            @media (max-width: 640px) {
                .pagination {
                    font-size: 0.875rem;
                }
            }
        </style>
    @endpush
@endsection
