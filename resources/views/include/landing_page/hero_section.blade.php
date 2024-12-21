<div class="home-slider-banner">
    <div class="container">
        <div class="row10">
            <div class="col-lg-8 silider-wrapp">
                <div class="home-slider">
                    <div class="slider-owl owl-slick equal-container nav-center"
     data-slick='{"autoplay":true, "autoplaySpeed":4000, "arrows":false, "dots":true, "infinite":true, "speed":1000, "rows":1}'
     data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
    
    @foreach($discountedSubCategories as $subcategory)
        <div class="slider-item style7">
            <div class="slider-inner equal-element" style="background-image: url({{ asset('uploads/subcategory/' . $subcategory->image) }});   ">
                <div class="slider-infor" style="height:625px !important;">
                    <h5 class="title-small">
                        Sale up to {{ $subcategory->discount }}% off!
                    </h5>
                    <h3 class="title-big">
                        {{ $subcategory->name }} Collection
                    </h3>
                    <a href="{{ route('products.bySubCategory', $subcategory->id) }}" class="button btn-shop-the-look bgroud-style" >Shop now</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

                </div>
            </div>


            <div class="col-lg-4 banner-wrapp">
                
                <div class="banner">

                    <div class="item-banner style7">
                        <div class="inner">
                            @foreach($categories->slice(0, 1) as $category)
                            <div class="banner-content" style="background-image: url({{ asset('uploads/category/' . $category->image) }}) !important">
                                <h3 class="title">Pick Your <br/>Items</h3>
                                <div class="description">
                                    Discover the special collection of {{ $category->name }}
                                </div>
                                <a href="{{ route('products.byCategory', $category->id) }}" class="button btn-lets-do-it">Shop now</a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>


                <div class="banner">
                    <div class="item-banner style8">
                        <div class="inner">
                            @foreach ($products->slice(25, 1) as $product)
                            <div class="banner-content" style="background-image: url('{{ asset($product->product_images[0]->image) }}') !important;">                                <h3 class="title">Best Of<br/>Products</h3>
                                <div class="description">
                                    Cras pulvinar loresum dolor conse
                                </div>
                                <span class="price">$379.00</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>