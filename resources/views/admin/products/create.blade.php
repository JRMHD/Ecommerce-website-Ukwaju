@extends('layouts.admin')

@section('content')
    <h2>Add New Product</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" placeholder="Product Name" required>

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
                <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select>

        <textarea name="description" placeholder="Description" required></textarea>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="number" step="0.01" name="slashed_price" placeholder="Slashed Price (Optional)">
        <input type="text" name="weight_quantity" placeholder="Weight/Quantity" required>

        <select name="stock_availability" required>
            <option value="In Stock">In Stock</option>
            <option value="Out of Stock">Out of Stock</option>
        </select>

        <input type="file" name="images[]" multiple required>

        <button type="submit">Add Product</button>
    </form>
@endsection
