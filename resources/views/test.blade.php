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
                    <div class="shop-select">
                            <span class="title">Sort by</span>
                            <select title="by" id="sort-products">
                                <!-- <option value="default">Default</option> -->
                                <option value="name-asc">Name (A to Z)</option>
                                <option value="name-desc">Name (Z to A)</option>
                                <option value="price-asc">Price (Low to High)</option>
                                <option value="price-desc">Price (High to Low )</option>
                                <option value="newness">Sort by newness</option>
                            </select>
                        </div>


                    <ul class="row list-products auto-clear equal-container product-grid" id="product-container">

                        @forelse ($products as $product)

                        <li class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-1"  data-name="{{ $product->name }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        data-discount="{{ $product->discount ?? 0 }}"
                        data-created-at="{{ $product->created_at }}">
                            <div class="product-inner equal-element" >

                                <div class="product-thumb">
                                    @if($product->discount)
                                    <div class="product-top">
                                        <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        {{ $product->discount }}%
                                                    </span>
                                                </span>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="thumb-inner">
                                        <a href="{{ route('product_details', $product->id) }}">
                                            @if($product->product_images->isNotEmpty())
                                            <img src="{{ asset($product->product_images[0]->image) }}" alt="img" style="height: 250px;">
                                            @else
                                            <span>No image available</span>
                                        @endif
                                        </a>
                                        <div class="thumb-group">
                                            {{-- <a href="#quickviewModal" class="button quick-wiew-button mfp-inline"
                                                data-image="{{ asset($product->product_images->first()->image ?? '/images/default-product.jpg') }}"
                                                data-title="{{ $product->name }}"
                                                data-oldprice="{{ $product->old_price }} JOD"
                                                data-price="{{ $product->price }} JOD"
                                                data-availability="In Stock"
                                                data-smallDescription="{{ $product->small_description }}"
                                                data-category="{{$product->subCategory->category->name}}"
                                                data-subCategory="{{ $product->subCategory->name }} ">

                                                </a> --}}
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
                                        @if($product->discount)
                                                <div class="price">
                                                    <del>
                                                        {{ $product->price }} JOD
                                                    </del>
                                                    <ins>
                                                        {{ number_format($product->price * (1 - $product->discount / 100), 2) }} JOD
                                                    </ins>
                                                </div>
                                                @else
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
                                                @endif
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
     
            


        </div>
    </div>
</div>

{{--include third_section(filter) start--}}
{{-- @include("include/modal/modal") --}}
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

<!-- ======================================================store by======================================================================== -->

<script>
        document.addEventListener('DOMContentLoaded', function () {
    // دالة لحساب السعر النهائي (يشمل الخصم)
    function calculateFinalPrice(product) {
        const price = parseFloat(product.dataset.price);
        const discount = parseFloat(product.dataset.discount || 0);
        return discount > 0 ? price - (price * (discount / 100)) : price;
    }

    // ترتيب المنتجات عند تغيير التحديد
    document.getElementById('sort-products').addEventListener('change', function () {
        const sortValue = this.value; // الحصول على قيمة الترتيب المحددة
        const productContainer = document.getElementById('product-container'); // حاوية المنتجات
        const products = Array.from(productContainer.children); // تحويل العقد إلى مصفوفة للترتيب

        // ترتيب المنتجات بناءً على الخيار المحدد
        products.sort((first_product, second_product) => {
            if (sortValue === 'name-asc') {
                return first_product.dataset.name.localeCompare(second_product.dataset.name);
            } else if (sortValue === 'name-desc') {
                return second_product.dataset.name.localeCompare(first_product.dataset.name);
            } else if (sortValue === 'price-asc') {
                return calculateFinalPrice(first_product) - calculateFinalPrice(second_product);
            } else if (sortValue === 'price-desc') {
                return calculateFinalPrice(second_product) - calculateFinalPrice(first_product);
            } else if (sortValue === 'newness') {
                // الترتيب حسب الأحدث
                return new Date(second_product.dataset.createdAt) - new Date(first_product.dataset.createdAt);
            }
            return 0; // الافتراضي: عدم الترتيب
        });

        // إعادة ترتيب العناصر في DOM بناءً على المصفوفة المرتبة
        products.forEach(product => productContainer.appendChild(product));
    });
});

</script>

@endsection
