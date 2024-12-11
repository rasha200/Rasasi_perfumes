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
                                    <div class="quantity">
                                        <div class="control">
                                            <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                            <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                   class="input-qty qty" size="4">
                                            <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                        </div>
                                    </div>
                                    <button class="single_add_to_cart_button button">Add to cart</button>
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
@endsection