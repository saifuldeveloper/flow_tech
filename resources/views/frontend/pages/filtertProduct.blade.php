@foreach ($products as $item)
<div class="p-item">
    <div class="p-item-inner">
        {{-- <div class="p-item-img"><a href="{{ url('product/details/' . $item->id . '/' . $item->product_name) }}"><img --}}
        <div class="p-item-img"><a href="{{ url('product/' . $item->product_slug) }}"><img
                    src="{{ asset($item->image_one) }}" alt="{{ $item->product_name }}" width="228"
                    height="228"></a></div>
        <div class="p-item-details">
            <h4 class="p-item-name"> <a
                    href="{{ url('product/' . $item->product_slug) }}">{{ $item->product_name }}</a>
            </h4>
            <div class="p-item-price">
                <span>{{ $item->selling_price - $item->discount_price }}৳</span>
                <span class="price-old">{{ $item->selling_price }}৳</span>
            </div>
            <div class="actions">
                <a href="" data-id="{{ $item->id }}" class="btn submit-btn addcart"
                    id="button-cart"
                    style="width: 100%; margin:  0px 10px 5px 0px; background-color: crimson; border: none;">Add
                    To Cart</a>
                <a href="{{ route('user.checkout') }}" data-id="{{ $item->id }}"
                    class="buynow btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
            </div>
        </div>
    </div>
</div>
@endforeach

