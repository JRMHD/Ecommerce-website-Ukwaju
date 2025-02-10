@extends('layouts.admin')

@section('content')
    <h2>Product List</h2>

    <!-- Search & Filter Form -->
    <form method="GET" action="{{ route('admin.products.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                class="form-control">
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                @foreach (\App\Models\Product::select('category')->distinct()->pluck('category') as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Add Product</a>

    <table class="table">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>
                    @php
                        $images = json_decode($product->images, true);
                        $firstImage = $images ? asset('storage/' . $images[0]) : asset('storage/default.jpg');
                    @endphp
                    <img src="{{ $firstImage }}" width="80">
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->stock_availability }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $products->appends(request()->query())->links() }}
    </div>
@endsection
