<div class="card card-default mt-2 mb-4">
    <div class="card-header"><button class="btn btn-sm btn-success">Order #{{ $result->id }}</button></div>
        <div class="row">    
            @foreach ($result->orders_detail as $res)
            <div class="col-sm-4">
                <div class="card-body">
                    @php $img = $res->products->getFirstMediaUrl('product_cover_image','thumb') @endphp
                    <h5>{{ $res->products->title }}</h5>
                    <img src="{{ $img }}" width="100%" height="250px" class="mb-4">
                    <h6>Price   : {{ $res->price }}</h6>
                    <h6>Qty     : {{ $res->qty }}</h6>
                    <h5 align="right">Amount : {{ $res->amount }}</h5>
                </div>
            </div>
            @endforeach
        </div>
</div>