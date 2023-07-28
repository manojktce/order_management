<div class="row align-items-center latest_product_inner" id="product_section">
@foreach($result['products'] as $prod)
    <div class="col-lg-4 col-sm-6">
        <div class="single_product_item">
            <a href="{{ url('/products'.'/'.Str::slug($prod->title).'/'.$prod->id) }}">
                <img src="{{ $prod->getFirstMediaUrl('product_cover_image','thumb') }}" alt="{{ $prod->title }}">
            </a>
            <div class="single_product_text">
                <h4>{{ $prod->title }}</h4>
                <h3>${{ $prod->price }}</h3>
                <p>Created by : <b>{{ $prod->users->first_name }}</b></p>
                <a href="{{ route('addToCart',$prod->id) }}" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
            </div>
        </div>
    </div>
@endforeach
</div>