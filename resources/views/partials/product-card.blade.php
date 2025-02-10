<div class="container" style="padding: 20px; max-width: 1350px; margin: 0 auto;">
    <div class="row" style="display: flex; flex-wrap: wrap; margin: -10px;">
        @foreach ($products as $product)
            <!-- Changed col-sm-12 to col-6 to show 2 items on mobile -->
            <div class="col-6 col-lg-3" style="padding: 10px; box-sizing: border-box;">
                <a href="{{ route('shop.detail', $product->id) }}"
                    style="text-decoration: none; color: inherit; display: block;">
                    <div style="background: white; border-radius: 16px; box-shadow: 0 2px 15px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%; overflow: hidden; position: relative; transform: translateY(0); cursor: pointer;"
                        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.12)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 15px rgba(0,0,0,0.08)'">
                        <!-- Image Container -->
                        <div
                            style="position: relative; width: 100%; padding-top: 75%; overflow: hidden; background: #f8f9fa; border-radius: 16px 16px 0 0;">
                            @php
                                $images = $product->images ? json_decode($product->images) : [];
                            @endphp
                            <img src="{{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('images/no-image.png') }}"
                                alt="{{ $product->name }}"
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                        </div>

                        <!-- Content Container -->
                        <div style="padding: 14px;">
                            <!-- Product Name -->
                            <h5
                                style="margin: 0 0 8px 0; font-size: 16px; font-weight: 600; color: #2d3436; line-height: 1.4; height: 44px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                {{ $product->name }}
                            </h5>

                            <!-- Star Rating -->
                            <div style="margin-bottom: 8px;">
                                <div style="color: #ffd700;">
                                    ★★★★★
                                    <span style="font-size: 12px; color: #718093; margin-left: 5px;">
                                        (4.8)
                                    </span>
                                </div>
                            </div>

                            <!-- Price Section -->
                            <div style="margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                <span style="font-size: 18px; font-weight: 700; color: #2d3436;">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                                @if ($product->slashed_price)
                                    <span style="font-size: 14px; color: #e74c3c; text-decoration: line-through;">
                                        ${{ number_format($product->slashed_price, 2) }}
                                    </span>
                                @endif
                            </div>

                            <!-- Stock Status -->
                            <div
                                style="font-size: 12px; color: #718093; display: flex; justify-content: space-between; align-items: center;">
                                <span>
                                    <span
                                        style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: {{ $product->stock_availability > 0 ? '#00b894' : '#ff7675' }}; margin-right: 5px;"></span>
                                    {{ $product->stock_availability > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                                <span
                                    style="background-color: #00b894; color: white; padding: 4px 8px; border-radius: 12px; font-size: 11px;">
                                    View Details
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
