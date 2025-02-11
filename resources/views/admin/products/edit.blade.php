@extends('layouts.admin')

@section('content')
    <div style="padding: 20px; max-width: 800px; margin: 0 auto;">
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
        <div style="margin-bottom: 2rem;">
            <h2
                style="color: #2d3748; font-size: 1.875rem; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-edit"></i> Edit Product
            </h2>
        </div>

        <!-- Form Card -->
        <div
            style="background-color: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Grid Layout for Form Fields -->
                <div style="display: grid; gap: 1.5rem;">
                    <!-- Product Name -->
                    <div>
                        <label
                            style="display: block; font-size: 0.875rem; font-weight: 500; color: #4a5568; margin-bottom: 0.5rem;">
                            <i class="fas fa-tag" style="margin-right: 0.5rem;"></i> Product Name
                        </label>
                        <input type="text" name="name" value="{{ $product->name }}" required
                            style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s; font-size: 1rem;">
                    </div>

                    <!-- Category -->
                    <div>
                        <label
                            style="display: block; font-size: 0.875rem; font-weight: 500; color: #4a5568; margin-bottom: 0.5rem;">
                            <i class="fas fa-folder" style="margin-right: 0.5rem;"></i> Category
                        </label>
                        <select name="category" required
                            style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; appearance: none; background: url('data:image/svg+xml;charset=US-ASCII,<svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 10l5 5 5-5z\"/></svg>') no-repeat right 1rem center/1em; background-color: white; font-size: 1rem;">
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
                    </div>

                    <!-- Description -->
                    <div>
                        <label
                            style="display: block; font-size: 0.875rem; font-weight: 500; color: #4a5568; margin-bottom: 0.5rem;">
                            <i class="fas fa-align-left" style="margin-right: 0.5rem;"></i> Description
                        </label>
                        <textarea name="description" required
                            style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s; min-height: 120px; resize: vertical; font-size: 1rem;">{{ $product->description }}</textarea>
                    </div>

                    <!-- Price Fields -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        <div>
                            <label
                                style="display: block; font-size: 0.875rem; font-weight: 500; color: #4a5568; margin-bottom: 0.5rem;">
                                <i class="fas fa-dollar-sign" style="margin-right: 0.5rem;"></i> Price
                            </label>
                            <input type="number" step="0.01" name="price" value="{{ $product->price }}" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s; font-size: 1rem;">
                        </div>
                        <div>
                            <label
                                style="display: block; font-size: 0.875rem; font-weight: 500; color: #4a5568; margin-bottom: 0.5rem;">
                                <i class="fas fa-tags" style="margin-right: 0.5rem;"></i> Slashed Price
                            </label>
                            <input type="number" step="0.01" name="slashed_price" value="{{ $product->slashed_price }}"
                                style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s; font-size: 1rem;">
                        </div>
                    </div>

                    <!-- Weight/Quantity and Stock -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        <div>
                            <label
                                style="display: block; font-size: 0.875rem; font-weight: 500; color: #4a5568; margin-bottom: 0.5rem;">
                                <i class="fas fa-weight" style="margin-right: 0.5rem;"></i> Weight/Quantity
                            </label>
                            <input type="text" name="weight_quantity" value="{{ $product->weight_quantity }}" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; transition: border-color 0.2s; font-size: 1rem;">
                        </div>
                        <div>
                            <label
                                style="display: block; font-size: 0.875rem; font-weight: 500; color: #4a5568; margin-bottom: 0.5rem;">
                                <i class="fas fa-warehouse" style="margin-right: 0.5rem;"></i> Stock Status
                            </label>
                            <select name="stock_availability" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; outline: none; appearance: none; background: url('data:image/svg+xml;charset=US-ASCII,<svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 10l5 5 5-5z\"/></svg>') no-repeat right 1rem center/1em; background-color: white; font-size: 1rem;">
                                <option value="In Stock"
                                    {{ $product->stock_availability == 'In Stock' ? 'selected' : '' }}>
                                    In Stock</option>
                                <option value="Out of Stock"
                                    {{ $product->stock_availability == 'Out of Stock' ? 'selected' : '' }}>Out of Stock
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Current Images -->
                    <div>
                        <label
                            style="display: block; font-size: 0.875rem; font-weight: 500; color: #4a5568; margin-bottom: 0.5rem;">
                            <i class="fas fa-images" style="margin-right: 0.5rem;"></i> Current Images
                        </label>
                        <div
                            style="display: grid; grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); gap: 1rem; margin-bottom: 1rem;">
                            @php
                                $images = json_decode($product->images, true);
                            @endphp
                            @if ($images)
                                @foreach ($images as $image)
                                    <div
                                        style="position: relative; aspect-ratio: 1; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
                                        <img src="{{ asset('storage/' . $image) }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @endforeach
                            @else
                                <p style="color: #718096; font-size: 0.875rem;">No images uploaded.</p>
                            @endif
                        </div>
                    </div>

                    <!-- New Images Upload -->
                    <div>
                        <label
                            style="display: block; font-size: 0.875rem; font-weight: 500; color: #4a5568; margin-bottom: 0.5rem;">
                            <i class="fas fa-cloud-upload-alt" style="margin-right: 0.5rem;"></i> Upload New Images
                        </label>
                        <div
                            style="border: 2px dashed #e2e8f0; border-radius: 0.375rem; padding: 2rem; text-align: center;">
                            <input type="file" name="images[]" multiple style="width: 100%; font-size: 1rem;"
                                accept="image/*">
                            <p style="margin-top: 0.5rem; font-size: 0.875rem; color: #718096;">
                                Upload new images to replace or add to the existing ones
                            </p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div style="margin-top: 1rem;">
                        <button type="submit"
                            style="background-color: #4299e1; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 1rem; font-weight: 500; display: inline-flex; align-items: center; gap: 0.5rem; transition: background-color 0.2s;">
                            <i class="fas fa-save"></i> Update Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Font Awesome in the head section of your layout -->
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @endpush
@endsection
