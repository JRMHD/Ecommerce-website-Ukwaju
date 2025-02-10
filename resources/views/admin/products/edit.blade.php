@extends('layouts.admin')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $product->name }}" required>

        <!-- Category Dropdown -->
        <select name="category" required>
            @php
                $categories = [
                    'Cereals',
                    'Flour',
                    'Maize Flour',
                    'Batter',
                    'Vegetables',
                    'Fruits',
                    'Meat',
                    'Fish',
                    'Dairy',
                    'Beverages',
                    'Snacks',
                    'Spices',
                    'Grains',
                    'Legumes',
                    'Bakery',
                    'Oils',
                    'Sauces',
                    'Frozen Foods',
                    'Canned Goods',
                    'Dried Foods',
                    'Herbs',
                    'Nuts',
                    'Confectionery',
                    'Personal Care',
                    'Cleaning Supplies',
                    'Kitchen Essentials',
                    'Clothing',
                    'Handicrafts',
                    'Books',
                    'Electronics',
                    'Others',
                ];
            @endphp

            @foreach ($categories as $category)
                <option value="{{ $category }}" {{ $product->category == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>

        <textarea name="description" required>{{ $product->description }}</textarea>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
        <input type="number" step="0.01" name="slashed_price" value="{{ $product->slashed_price }}">
        <input type="text" name="weight_quantity" value="{{ $product->weight_quantity }}" required>

        <select name="stock_availability" required>
            <option value="In Stock" {{ $product->stock_availability == 'In Stock' ? 'selected' : '' }}>In Stock</option>
            <option value="Out of Stock" {{ $product->stock_availability == 'Out of Stock' ? 'selected' : '' }}>Out of
                Stock</option>
        </select>

        <input type="file" name="images[]" multiple>

        <div>
            @php
                $images = json_decode($product->images, true);
            @endphp

            @if ($images)
                @foreach ($images as $image)
                    <img src="{{ asset('storage/' . $image) }}" width="100">
                @endforeach
            @else
                <p>No images uploaded.</p>
            @endif
        </div>

        <button type="submit">Update Product</button>
    </form>
@endsection
