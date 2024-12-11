@extends('layouts.user_side_master')

@section('content')
<div class="main-content main-content-details single no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                           Home
                        </li>
                        <li class="trail-item">
                        {{$product->subCategory->category->name}}
                        </li>

                        <li class="trail-item">
                            {{ $product->subCategory->name }}
                        </li>

                        <li class="trail-item trail-end active">
                            Glorious Eau
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="details-product">
                        <div class="details-thumd">
                            <!-- Main Image Display -->
                            <div class="image-preview-container image-thick-box image_preview_container">
                                <img id="img_zoom" 
                                     data-zoom-image="{{ asset($productImages->first()->image ?? 'default-image.jpg') }}" 
                                     src="{{ asset($productImages->first()->image ?? 'default-image.jpg') }}" 
                                     alt="img" style="height: 500px; width:540px;">
                                <a href="#" class="btn-zoom open_qv">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </a>
                            </div>
                        
                            <!-- Thumbnail Carousel -->
                            <div class="product-preview image-small product_preview">
                                <div id="thumbnails" class="thumbnails_carousel owl-carousel" 
                                     data-nav="true" 
                                     data-autoplay="false" 
                                     data-dots="false" 
                                     data-loop="false" 
                                     data-margin="10"
                                     data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>
                                    @foreach ($productImages as $productImage)
                                        <a href="#" 
                                           data-image="{{ asset($productImage->image) }}" 
                                           data-zoom-image="{{ asset($productImage->image) }}" 
                                           class="{{ $loop->first ? 'active' : '' }}">
                                            <img src="{{ asset($productImage->image) }}" 
                                                 data-large-image="{{ asset($productImage->image) }}" 
                                                 alt="img" style="height: 120px;">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="details-infor">
                            <h1 class="product-title">
                                {{ $product->name }} 
                            </h1>
                            <div class="stars-rating">
                                <div class="star-rating">
                                    <span class="star-5"></span>
                                </div>
                                <div class="count-star">
                                    (7)
                                </div>
                            </div>
                            <div class="availability">
                                availability:
                                <a href="#">in Stock</a>
                            </div>
                            <div class="price">
                                @if($product->old_price)
                                <del class="old-price" style="opacity: 50%;">
                                    <span id="modalOldPrice"> {{ $product->old_price }} JOD</span>
                                </del>
                                @else
                                <span></span>
                              @endif
                                <span>{{ $product->price }} JOD</span>
                            </div>
                            <div class="product-details-description">
                                <ul>
                                    <li>{{ $product->small_description }}</li>
                                    <li>{{$product->subCategory->category->name}}</li>
                                    <li>{{ $product->subCategory->name }}</li>
                                </ul>
                            </div>
                            
                            <div class="group-button">
                               
                                <div class="quantity-add-to-cart">
                                   

                                    <form class="pd-detail__form"  action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">
                                        <div class="pd-detail-inline-2">
    
                                            <div class="u-s-m-b-15">
                                                    @csrf 
                                                    <input type="hidden" name="product_id" value="{{$product->id}}" >
                                                    <input type="hidden" name="name" value="{{$product->name}}">
                                                    <input type="hidden" name="price" value="{{$product->price}}">
                                                    <input type="hidden" name="small_description" value="{{$product->small_description}}">
                                                    <div class="quantity">
                                                        <div class="control">
                                                            <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                            <input type="number" name="quantity" data-step="1" data-min="1" value="1" title="Qty" max="{{$product->quantity}}"
                                                                   class="input-qty qty" size="4">
                                                            <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                                        </div>
                                                    </div>
                                                    
                                                    <button class="single_add_to_cart_button button">Add to cart</button>
                                            </div>
                                        </div>
                                    </form>


                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-details-product">
                        <ul class="tab-link">
                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Descriptions </a>
                            </li>
                        </ul>
                        <div class="tab-container">
                            <div id="product-descriptions" class="tab-panel active">
                                <p>
                                    {{ $product->description }}
                                </p>
                               
                            </div>
                           
                        </div>
                    </div>
                    <div style="clear: left;"></div>
                    <div class="related products product-grid">
                        <h2 class="product-grid-title">You may also like</h2>
                        <div class="owl-products owl-slick equal-container nav-center"  data-slick ='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                            
                            @foreach($relatedProducts as $product)
                            <div class="product-item style-1">
                                <div class="product-inner equal-element">
                                    
                                    <div class="product-thumb">
                                        <div class="thumb-inner">
                                            <a href="{{ route('product_details', $product->id) }}">
                                                @if($product->product_images->isNotEmpty())
                                                <img src="{{ asset($product->product_images[0]->image) }}" alt="img" style="height: 368px; width:368px;">
                                                @else
                                            <span>No image available</span>
                                        @endif
                                            </a>
                                          
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="{{ route('product_details', $product->id) }}">{{ $product->name }} </a>
                                        </h5>
                                        <div class="group-info">
                                            <div class="stars-rating">
                                                <div class="star-rating">
                                                    <span class="star-3"></span>
                                                </div>
                                                <div class="count-star">
                                                    (3)
                                                </div>
                                            </div>
                                            <div class="price">
                                                
                                               @if($product->old_price)
                                                <del>
                                                    {{ $product->old_price }} JOD
                                                </del>
                                                @else
                                                  <span></span>
                                                @endif

                                                <ins>
                                                    {{ $product->price }} JOD 
                                                </ins>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!------------------------- Success & error modal ------------------------------>
  @if (Session::get('success'))

  <div class="swal-overlay swal-overlay--show-modal" tabindex="-1">
      <div class="swal-modal">
          <div class="swal-icon swal-icon--success">
              <span class="swal-icon--success__line swal-icon--success__line--long"></span>
              <span class="swal-icon--success__line swal-icon--success__line--tip"></span>
              <div class="swal-icon--success__ring"></div>
              <div class="swal-icon--success__hide-corners"></div>
          </div>
  
          <div class="swal-title" style="">{{ Session::get('success') }}</div>
  
          <div class="swal-footer">
              <div class="swal-button-container">
                  <a href="{{ route('product_details', ['id' => $product->id]) }}" class="swal-button swal-button--confirm">OK</a>
                  <div class="swal-button__loader">
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                  </div>
              </div>
          </div>
      </div>
  </div>


@elseif (Session::get('error'))
   <div class="swal-overlay swal-overlay--show-modal" tabindex="-1">
      <div class="swal-modal">
          <div class="swal-icon swal-icon--error">
              <div class="swal-icon--error__x-mark">
                  <span class="swal-icon--error__line swal-icon--error__line--left"></span>
                  <span class="swal-icon--error__line swal-icon--error__line--right"></span>
              </div>
          </div>
          
  
          <div class="swal-title" style="">{{ Session::get('error') }}</div>
  
          <div class="swal-footer">
              <div class="swal-button-container">
                  <a href="{{ route('login') }}" class="swal-button swal-button--confirm">Login</a>
                  <div class="swal-button__loader">
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endif   



@endsection