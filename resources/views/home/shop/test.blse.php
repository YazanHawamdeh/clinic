@forelse ($favorites as $favorite)
    <div class="col-lg-3 col-md-6 mb-4">
        <a class="product-card">
            <div class="product-image" href="{{ route('product', ['id' => $favorite->id]) }}">
                <span class="product-points">{{ $favorite->item->points }} Points</span>
                @if($favorite->item->images->isNotEmpty())
                    <img src="{{ asset( $favorite->item->images->first()->image_url) }}" alt="{{ $favorite->item->name }}" class="img-fluid">
                @else
                    <p>No image available</p>
                @endif
                <hr>
            </div>
            <div class="product-details ms-3">
                <p class="product-name fw-bold">{{ $favorite->item->name }}</p>
                <p class="product-price mt-1">{{ $favorite->item->price }} SAR</p>
                <div class="product-actions">
                    <a href="javascript:void(0)" class="me-2" onclick="removeFromFavorite({{ $favorite->item->id }})">
                        <img src="{{ asset('assets/imgshome/removeFav.svg') }}" alt="Remove from favorite" class='addToCardBtn'>
                    </a>
                    <form action="{{ route('add_cart', ['id' => $favorite->item->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" style="border: none; background: none; padding: 0;" class="icon-card-home">
                            <img src="{{ asset('assets/imgshome/Group 1274.svg') }}" alt="Add to Cart" class='addToCardBtn'>
                        </button>
                    </form>
                </div>
            </div>
</a>
    </div>
@empty
    <p>No favorite items found.</p>
@endforelse