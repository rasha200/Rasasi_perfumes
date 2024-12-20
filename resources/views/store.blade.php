@extends('layouts.user_side_master')

@section('content')

<div class="main-content main-content-product left-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            Home
                        </li>
                        <li class="trail-item trail-end active">
                            Store
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area shop-grid-content no-banner col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">
                        Grid Products
                    </h3>
                    <div class="shop-top-control">
                        <form class="select-item select-form">
                            <span class="title">Sort</span>
                            <select title="sort" data-placeholder="12 Products/Page" class="chosen-select">
                                <option value="1">12 Products/Page</option>
                                <option value="2">9 Products/Page</option>
                                <option value="3">10 Products/Page</option>
                                <option value="4">8 Products/Page</option>
                                <option value="5">6 Products/Page</option>
                            </select>
                        </form>
                        <form class="filter-choice select-form">
                            <span class="title">Sort by</span>
                            <select title="sort-by" data-placeholder="Price: Low to High" class="chosen-select">
                                <option value="1">Price: Low to High</option>
                                <option value="2">Sort by popularity</option>
                                <option value="3">Sort by average rating</option>
                                <option value="4">Sort by newness</option>
                                <option value="5">Sort by price: low to high</option>
                            </select>
                        </form>
                        <div class="grid-view-mode">
                            
                        </div>
                    </div>
                    <ul class="row list-products auto-clear equal-container product-grid">
                        @forelse ($products as $product)
                        <li class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-1">
                            <div class="product-inner equal-element">
                               
                                <div class="product-thumb">
                                    <div class="thumb-inner">
                                        <a href="#">
                                            @if($product->product_images->isNotEmpty())
                                            <img src="{{ asset($product->product_images[0]->image) }}" alt="img" style="height: 250px;">
                                            @else
                                            <span>No image available</span>
                                        @endif
                                        </a>
                                        <div class="thumb-group">
                                          
                                            <a href="#quickviewModal" class="button quick-wiew-button mfp-inline" 
                                                data-image="{{ asset($product->product_images->first()->image ?? '/images/default-product.jpg') }}" 
                                                data-title="{{ $product->name }}" 
                                                data-oldprice="{{ $product->old_price }} JOD"
                                                data-price="{{ $product->price }} JOD"
                                                data-availability="In Stock" 
                                                data-smallDescription="{{ $product->small_description }}" 
                                                data-category="{{$product->subCategory->category->name}}" 
                                                data-subCategory="{{ $product->subCategory->name }} ">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                        </div>
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
                        </li>
                        @empty
                          <p>No products found in this subcategory.</p>
                        @endforelse
                    </ul>
                    <div class="pagination clearfix style3">
                        <div class="nav-link">
                            <a href="#" class="page-numbers"><i class="icon fa fa-angle-left"
                                                                aria-hidden="true"></i></a>
                            <a href="#" class="page-numbers">1</a>
                            <a href="#" class="page-numbers">2</a>
                            <a href="#" class="page-numbers current">3</a>
                            <a href="#" class="page-numbers"><i class="icon fa fa-angle-right"
                                                                aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="wrapper-sidebar shop-sidebar">
                    <div class="widget woof_Widget">
                        <div class="widget widget-categories">
                            <h3 class="widgettitle">Categories</h3>
                            <ul class="list-categories">
                                <li>
                                    <input type="checkbox" id="cb1">
                                    <label for="cb1" class="label-text">
                                        New Arrivals
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb2">
                                    <label for="cb2" class="label-text">
                                        Dining
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb3">
                                    <label for="cb3" class="label-text">
                                        Desks
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb4">
                                    <label for="cb4" class="label-text">
                                        Accents
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb5">
                                    <label for="cb5" class="label-text">
                                        Accessories
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb6">
                                    <label for="cb6" class="label-text">
                                        Tables
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_filter_price">
                            <h4 class="widgettitle">
                                Price
                            </h4>
                            <div class="price-slider-wrapper">
                                <div data-label-reasult="Range:" data-min="0" data-max="3000" data-unit="$"
                                     class="slider-range-price " data-value-min="0" data-value-max="1000">
                                </div>
                                <div class="price-slider-amount">
                                    <span class="from">$45</span>
                                    <span class="to">$215</span>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-brand">
                            <h3 class="widgettitle">Brand</h3>
                            <ul class="list-brand">
                                <li>
                                    <input id="cb7" type="checkbox">
                                    <label for="cb7" class="label-text">New Arrivals</label>
                                </li>
                                <li>
                                    <input id="cb8" type="checkbox">
                                    <label for="cb8" class="label-text">Dining</label>
                                </li>
                                <li>
                                    <input id="cb9" type="checkbox">
                                    <label for="cb9" class="label-text">Desks</label>
                                </li>
                                <li>
                                    <input id="cb10" type="checkbox">
                                    <label for="cb10" class="label-text">Accents</label>
                                </li>
                                <li>
                                    <input id="cb11" type="checkbox">
                                    <label for="cb11" class="label-text">Accessories</label>
                                </li>
                                <li>
                                    <input id="cb12" type="checkbox">
                                    <label for="cb12" class="label-text">Tables</label>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_filter_size">
                            <h4 class="widgettitle">Size</h4>
                            <ul class="list-brand">
                                <li>
                                    <input id="cb13" type="checkbox">
                                    <label for="cb13" class="label-text">14.0 mm</label>
                                </li>
                                <li>
                                    <input id="cb14" type="checkbox">
                                    <label for="cb14" class="label-text">14.4 mm</label>
                                </li>
                                <li>
                                    <input id="cb15" type="checkbox">
                                    <label for="cb15" class="label-text">14.8 mm</label>
                                </li>
                                <li>
                                    <input id="cb16" type="checkbox">
                                    <label for="cb16" class="label-text">15.2 mm</label>
                                </li>
                                <li>
                                    <input id="cb17" type="checkbox">
                                    <label for="cb17" class="label-text">15.6 mm</label>
                                </li>
                                <li>
                                    <input id="cb18" type="checkbox">
                                    <label for="cb18" class="label-text">16.0 mm</label>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget-color">
                            <h4 class="widgettitle">
                                Color
                            </h4>
                            <div class="list-color">
                                <a href="#" class="color1"></a>
                                <a href="#" class="color2 "></a>
                                <a href="#" class="color3 active"></a>
                                <a href="#" class="color4"></a>
                                <a href="#" class="color5"></a>
                                <a href="#" class="color6"></a>
                                <a href="#" class="color7"></a>
                            </div>
                        </div>
                        <div class="widget widget-tags">
                            <h3 class="widgettitle">
                                Popular Tags
                            </h3>
                            <ul class="tagcloud">
                                <li class="tag-cloud-link">
                                    <a href="#">Office</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Accents</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Flowering</a>
                                </li>
                                <li class="tag-cloud-link active">
                                    <a href="#">Accessories</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Hot</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Tables</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Dining</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget newsletter-widget">
                        <div class="newsletter-form-wrap ">
                            <h3 class="title">Subscribe to Our Newsletter</h3>
                            <div class="subtitle">
                                More special Deals, Events & Promotions
                            </div>
                            <input type="email" class="email" placeholder="Your email letter">
                            <button type="submit" class="button submit-newsletter">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--include third_section(filter) start--}}
@include("include/modal/modal")
{{--include third_section(filter) end--}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('quickviewModal');

    // Attach event listeners to all quick-view buttons
    document.querySelectorAll('.quick-wiew-button').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            // Extract data attributes from the button
            const title = this.getAttribute('data-title');
            const oldPrice = this.getAttribute('data-oldprice');
            const price = this.getAttribute('data-price');
            const availability = this.getAttribute('data-availability');
            const smallDescription = this.getAttribute('data-smallDescription');
            const category = this.getAttribute('data-category');
            const subCategory = this.getAttribute('data-subCategory');
            const image = this.getAttribute('data-image'); // Get first image

            // Update modal content
            document.getElementById('modalTitle').textContent = title || 'No Title';
            document.getElementById('modalPrice').textContent = price || 'N/A';
            document.getElementById('modalOldPrice').textContent = oldPrice || '';
            document.getElementById('modalAvailability').textContent = availability || 'N/A';
            document.getElementById('modalSmallDescription').textContent = smallDescription || 'No Description';
            document.getElementById('modalCategory').textContent = category || 'No Category';
            document.getElementById('modalSubCategory').textContent = subCategory || 'No Subcategory';

            // Clear previous images from the modal
            const sliderFor = document.querySelector('.slider-for');
            const sliderNav = document.querySelector('.slider-nav');
            sliderFor.innerHTML = '';
            sliderNav.innerHTML = '';

            // Add the first image (or fallback) to the modal
            const imgSrc = image || '/images/default-product.jpg'; // Fallback image
            const imgFor = document.createElement('div');
            imgFor.classList.add('details-item');
            imgFor.innerHTML = `<img src="${imgSrc}" alt="Product Image">`;
            sliderFor.appendChild(imgFor);

            const imgNav = document.createElement('div');
            imgNav.classList.add('details-item');
            imgNav.innerHTML = `<img src="${imgSrc}" alt="Product Thumbnail">`;
            sliderNav.appendChild(imgNav);
        });
    });

    // Initialize Magnific Popup for inline modal display
    $(".mfp-inline").magnificPopup({
        type: 'inline',
        midClick: true
    });
});

</script>


@endsection