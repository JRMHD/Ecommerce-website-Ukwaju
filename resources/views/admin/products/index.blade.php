@extends('layouts.admin')

@section('content')
    <div style="padding: 20px; max-width: 1400px; margin: 0 auto;">
        @if (session('success'))
            <div
                style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message Placeholder -->
        @if ($errors->any())
            <div
                style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Page Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 style="color: #2d3748; font-size: 1.875rem; font-weight: 600; margin: 0;">
                <i class="fas fa-box-open" style="margin-right: 0.5rem;"></i> Product List
            </h2>
            <a href="{{ route('admin.products.create') }}"
                style="background-color: #48bb78; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; display: inline-flex; align-items: center; transition: background-color 0.2s;">
                <i class="fas fa-plus" style="margin-right: 0.5rem;"></i> Add Product
            </a>
        </div>

        <!-- Search & Filter Form -->
        <div
            style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
            <form method="GET" action="{{ route('admin.products.index') }}">
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <div style="flex: 1 1 300px;">
                        <div style="position: relative;">
                            <i class="fas fa-search"
                                style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #718096;"></i>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search products..."
                                style="width: 100%; padding: 0.75rem 1rem 0.75rem 2.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s;">
                        </div>
                    </div>
                    <div style="flex: 1 1 200px;">
                        <select name="category"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; appearance: none; background: url('data:image/svg+xml;charset=US-ASCII,<svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 10l5 5 5-5z\"/></svg>') no-repeat right 1rem center/1em; background-color: white;">
                            <option value="">All Categories</option>
                            @foreach (\App\Models\Product::select('category')->distinct()->pluck('category') as $category)
                                <option value="{{ $category }}"
                                    {{ request('category') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="display: flex; gap: 0.5rem;">
                        <button type="submit"
                            style="background-color: #4299e1; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; border: none; cursor: pointer; transition: background-color 0.2s;">
                            <i class="fas fa-filter" style="margin-right: 0.5rem;"></i> Filter
                        </button>
                        <a href="{{ route('admin.products.index') }}"
                            style="background-color: #718096; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; display: inline-flex; align-items: center; transition: background-color 0.2s;">
                            <i class="fas fa-undo" style="margin-right: 0.5rem;"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Products Table -->
        <div
            style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                <thead>
                    <tr style="background-color: #f7fafc;">
                        <th
                            style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                            <i class="fas fa-image" style="margin-right: 0.5rem;"></i> Image
                        </th>
                        <th
                            style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                            <i class="fas fa-tag" style="margin-right: 0.5rem;"></i> Name
                        </th>
                        <th
                            style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                            <i class="fas fa-folder" style="margin-right: 0.5rem;"></i> Category
                        </th>
                        <th
                            style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                            <i class="fas fa-dollar-sign" style="margin-right: 0.5rem;"></i> Price
                        </th>
                        <th
                            style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                            <i class="fas fa-warehouse" style="margin-right: 0.5rem;"></i> Stock
                        </th>
                        <th
                            style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                            <i class="fas fa-cog" style="margin-right: 0.5rem;"></i> Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr style="transition: background-color 0.2s; hover:background-color: #f7fafc;">
                            <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                @php
                                    $images = json_decode($product->images, true);
                                    $firstImage = $images
                                        ? asset('storage/' . $images[0])
                                        : asset('storage/default.jpg');
                                @endphp
                                <img src="{{ $firstImage }}"
                                    style="width: 80px; height: 80px; object-fit: cover; border-radius: 0.375rem;">
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">{{ $product->name }}</td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                <span
                                    style="background-color: #ebf4ff; color: #4a5568; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem;">
                                    {{ $product->category }}
                                </span>
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0; color: #2d3748; font-weight: 600;">
                                ${{ number_format($product->price, 2) }}
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                <span
                                    style="background-color: {{ $product->stock_availability > 0 ? '#f0fff4' : '#fff5f5' }}; color: {{ $product->stock_availability > 0 ? '#2f855a' : '#c53030' }}; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem;">
                                    {{ $product->stock_availability }}
                                </span>
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        style="background-color: #ecc94b; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem; transition: background-color 0.2s;">
                                        <i class="fas fa-edit" style="margin-right: 0.5rem;"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            style="background-color: #f56565; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; transition: background-color 0.2s;"
                                            onclick="return confirm('Are you sure?')">
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

        <!-- Pagination -->
        <div style="margin-top: 2rem; display: flex; justify-content: center;">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>

    <!-- Add Font Awesome in the head section of your layout -->
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @endpush
@endsection
