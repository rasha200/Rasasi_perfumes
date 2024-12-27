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
            <div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">

                    <div class="filter-container">
                        <h3 class="custom_blog_title">
                            Products
                        </h3>

                        {{-- <div class="widget widget_filter_price">
                            <h4 class="widgettitle" style="font-size: 12px; margin: 0;">Price</h4>
                            <form action="{{ url()->current() }}" method="GET">
                                <div class="price-slider-wrapper" style="width: 150px;">
                                    <label for="min_price">Min Price:</label>
                                    <input 
                                        type="number" 
                                        name="min_price" 
                                        id="min_price" 
                                        value="{{ request('min_price', 0) }}" 
                                        min="0"
                                        style="width: 100%; margin-bottom: 10px;"
                                    />
                                    <label for="max_price">Max Price:</label>
                                    <input 
                                        type="number" 
                                        name="max_price" 
                                        id="max_price" 
                                        value="{{ request('max_price', $maxPrice) }}" 
                                        min="0"
                                        style="width: 100%;"
                                    />
                                </div>
                                <button type="submit" style="margin-top: 10px;">Apply Filter</button>
                            </form>
                        </div>
                        
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const slider = document.querySelector('.slider-range-price');
                                const fromPrice = document.querySelector('.price-slider-amount .from');
                                const toPrice = document.querySelector('.price-slider-amount .to');
                            
                                slider.addEventListener('change', function () {
                                    const minPrice = slider.dataset.valueMin;
                                    const maxPrice = slider.dataset.valueMax;
                            
                                    // Get the current URL and append price filter
                                    const currentUrl = new URL(window.location.href);
                                    currentUrl.searchParams.set('min_price', minPrice);
                                    currentUrl.searchParams.set('max_price', maxPrice);
                            
                                    // Redirect to the updated URL
                                    window.location.href = currentUrl.toString();
                                });
                            });
                            
                            </script> --}}
                    </div>
                 
                    
                    <div class="filter-choice select-form">
                        <div class="shop-top-control">
                            <!-- Group "Sort by" and select dropdown together -->
                            <div class="sort-by-select-container">
                                <span class="title" style="margin:13px;">Sort by</span>
                                <select title="by" id="sort-products" style="background-color: #FFFFFF; padding:3px 7px; font-size:13px;">
                                    <option value="name-asc">Name: (A to Z)</option>
                                    <option value="name-desc">Name: (Z to A)</option>
                                    <option value="price-asc">Price: (Low to High)</option>
                                    <option value="price-desc">Price: (High to Low)</option>
                                    <option value="newness">Sort by newness</option>
                                </select>
                            </div>
                    
                            <!-- Price filter aligned to the right -->

                            <div class="filter-button">
                                <button type="button" id="openFilterModal">Filter by price</button>
                            </div>
                       
                        </div>
                    </div>

                    <!-- Modal Structure -->
                    <div id="customModal" class="custom-modal-overlay" style="display:none;">
                        <div class="custom-modal">
                            <div class="modal-header">
                                <div class="icon-container">
                                    <i class="fa fa-filter filter-icon"></i> <!-- Filter icon -->
                                </div>
                            </div>
                            <div class="modal-body">
                                <h2>Filter by Price</h2>
                                <div class="widget widget_filter_price">
                                    <form id="price-filter-form" action="{{ url()->current() }}" method="GET">
                                        <div class="price-slider-wrapper" style="width: 400px; margin-top:50px;">
                                            <!-- Slider -->
                                            <div id="slider-range-price" data-label-result="Range:" data-min="0" data-max="{{ $maxPrice }}" data-unit="$" class="slider-range-price" data-value-min="{{ request('min_price', 0) }}" data-value-max="{{ request('max_price', $maxPrice) }}"></div>
                                            <div class="price-slider-amount" style="font-size: 12px;">
                                                <span class="from">{{ request('min_price', 0) }} JOD</span>
                                                <span class="to">{{ request('max_price', $maxPrice) }} JOD</span>
                                            </div>
                                        </div>
                    
                                        <!-- Hidden inputs for min_price and max_price -->
                                        <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
                                        <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', $maxPrice) }}">
                    
                                        <!-- Button to trigger the filter application -->
                                        <button class="close-modal-btn cancel-button">Cancel</button>
                                        <button type="button" id="apply-filter" class="filter-button">Apply Filter</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    
  <!---------------------- Filter price -------------------------------------->                   
<script>
    $(document).ready(function() {
// Open modal when "Filter by price" button is clicked
$('#openFilterModal').click(function() {
$('#customModal').fadeIn();  // Show the modal
});

// Close the modal when the user clicks "OK"
$('.close-modal-btn').click(function() {
$('#customModal').fadeOut();  // Hide the modal
});

// Slider functionality
const slider = $('#slider-range-price');
const fromPrice = $('.price-slider-amount .from');
const toPrice = $('.price-slider-amount .to');
const minPriceInput = $('#min_price');
const maxPriceInput = $('#max_price');
const applyFilterButton = $('#apply-filter');
const form = $('#price-filter-form');

// Initialize slider with initial values from data attributes
const minPrice = parseInt(slider.data('value-min'));
const maxPrice = parseInt(slider.data('value-max'));

// Initialize the slider (using jQuery UI slider)
slider.slider({
range: true,
min: 0,
max: maxPrice,
values: [minPrice, maxPrice],
slide: function (event, ui) {
// Update displayed price range
fromPrice.text(ui.values[0] + ' JOD');
toPrice.text(ui.values[1] + ' JOD');

// Update hidden inputs on slider change
minPriceInput.val(ui.values[0]);
maxPriceInput.val(ui.values[1]);
}
});

// Update price labels based on initial values from hidden inputs
const currentMinPrice = "{{ request('min_price', 0) }}";
const currentMaxPrice = "{{ request('max_price', $maxPrice) }}";
fromPrice.text(currentMinPrice + ' JOD');
toPrice.text(currentMaxPrice + ' JOD');

// Add form submission event on Apply Filter button
applyFilterButton.on('click', function () {
// Make sure the hidden input values are always up-to-date before submitting the form
minPriceInput.val(fromPrice.text().replace(' JOD', ''));
maxPriceInput.val(toPrice.text().replace(' JOD', ''));

console.log('Form Submitted with data:', minPriceInput.val(), maxPriceInput.val());

// Submit the form manually
form.submit();
});
});

 </script>


                    <ul class="row list-products auto-clear equal-container product-grid" id="product-container">

                        @forelse ($products as $product)

                        <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1"
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
                                                (4)
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

                     <!------ pagination -------->
                    <div class="pagination clearfix style2">
                        <div class="nav-link">
                            <!-- Previous Page -->
                            @if ($products->onFirstPage())
                                <span class="page-numbers disabled"><i class="icon fa fa-angle-left" aria-hidden="true"></i></span>
                            @else
                                <a href="{{ $products->previousPageUrl() }}" class="page-numbers"><i class="icon fa fa-angle-left" aria-hidden="true"></i></a>
                            @endif
                    
                            <!-- Page Numbers -->
                            @foreach ($products->links()->elements[0] as $page => $url)
                                <a href="{{ $url }}" class="page-numbers @if ($products->currentPage() == $page) current @endif">{{ $page }}</a>
                            @endforeach
                    
                            <!-- Next Page -->
                            @if ($products->hasMorePages())
                                <a href="{{ $products->nextPageUrl() }}" class="page-numbers"><i class="icon fa fa-angle-right" aria-hidden="true"></i></a>
                            @else
                                <span class="page-numbers disabled"><i class="icon fa fa-angle-right" aria-hidden="true"></i></span>
                            @endif
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


 <!---- JS for the modal ---->
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




<style>
    .shop-top-control {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .sort-by-select-container {
        display: flex;
        align-items: center;
    }
    
    .filter-button {
        margin-left: auto; /* Pushes the button to the right */
        margin-right: 10px;
    }
    
    
    
    </style>


@endsection
