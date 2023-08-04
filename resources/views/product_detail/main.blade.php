@include('includes.header')

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>{{ $result['products']->title }}</h2>
              <p>Home <span>-></span>{{ $result['products']->title }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->
  <!--================End Home Banner Area =================-->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
        <div class="col-lg-7 col-xl-7">
          <div class="product_slider_img">
            <div id="vertical">
              @foreach ($result['products']->getMedia('product_images') as $image)
                <div data-thumb="{{ $image->getUrl() }}">
                    <img src="{{ $image->getUrl() }}" />
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
          <div class="s_product_text">
            <h3>{{ $result['products']->title }}</h3>
            <h2>${{ $result['products']->price }}</h2>
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Category</span> : {{ $result['products']->category->title }}</a>
              </li>
              <li>
                
                  <a href="#"> <span>Availibility</span> : {{($result['products']->qty > 0) ? 'In Stock'  : 'Stock Not Available' }}</a>                    
              </li>
            </ul>
            <p>
              {{ substr(strip_tags($result['products']->description),0,125)."........." }}
            </p>


            @if($result['products']->qty > 0)
              <div class="card_area d-flex justify-content-between align-items-center">
                <div class="product_count">
                  <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                  <input class="input-number" type="text" value="1" min="0" max="{{ ($result['products']->qty > 5) ? '5' : $result['products']->qty }}">
                  <span class="number-increment"> <i class="ti-plus"></i></span>
                </div>
                <a href="{{ route('addToCart',$result['products']->id) }}" class="btn_3">add to cart</a>
                <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
            aria-selected="false">Reviews</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          {!! $result['products']->description !!}
        </div>
        
        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
          @include('product_detail.include.review_main')
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->
  @include('includes.footer')