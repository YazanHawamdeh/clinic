<ul class="list-group">
    @foreach (json_decode($order->items) as $item)
        <li class="list-group-item d-flex align-items-center">
            <img src="{{ asset($item->image) }}" alt="Item Image" class="img-thumbnail me-3" width="80">
            <div class="flex-grow-1">
                <span class='fw-bolder'>{{ $item->item_title }}</span> - 
                <span>{{ $item->quantity }} x ${{ $item->price }}</span>
            </div>
        </li>
    @endforeach
</ul>
