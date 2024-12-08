<header class="header style7">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    Welcome to our online store!
                </div>
            </div>
            <div class="top-bar-right">
                <div class="header-language">
                    <div class="stelina-language stelina-dropdown">
                        <a href="#" class="active language-toggle" data-stelina="stelina-dropdown">
									<span>
										English (USD)
									</span>
                        </a>
                        <ul class="stelina-submenu">
                            <li class="switcher-option">
                                <a href="#">
											<span>
												French (EUR)
											</span>
                                </a>
                            </li>
                            <li class="switcher-option">
                                <a href="#">
											<span>
												Japanese (JPY)
											</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="header-user-links">
                    <li>
                        <a href="login.html">Login or Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{asset("assets/img/Pukka nich Perfume logo-1.jpg")}}" alt="img" style="width:60px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form class="form-search form-search-width-category">
                            <div class="form-content">
                                <div class="category">
                                    <select title="cate" data-placeholder="All Categories" class="chosen-select"
                                            tabindex="1">
                                        <option value="United States">Accessories</option>
                                        <option value="United Kingdom">Accents</option>
                                        <option value="Afghanistan">Desks</option>
                                        <option value="Aland Islands">Sofas</option>
                                        <option value="Albania">New Arrivals</option>
                                        <option value="Algeria">Bedroom</option>
                                    </select>
                                </div>
                                <div class="inner">
                                    <input type="text" class="input" name="s" value="" placeholder="Search here">
                                </div>
                                <button class="btn-search" type="submit">
                                    <span class="icon-search"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                    <div class="header-control">
                        <div class="block-minicart stelina-mini-cart block-header stelina-dropdown">
                            <a href="javascript:void(0);" class="shopcart-icon" data-stelina="stelina-dropdown">
                                Cart
                                <span class="count">
										0
										</span>
                            </a>

                            
                        <!-- include side bar start -->
                         @include("include/user_side/cart")
                        <!-- include side bar end -->


                        </div>
                        <div class="block-account block-header stelina-dropdown">
                            <a href="javascript:void(0);" data-stelina="stelina-dropdown">
                                <span class="flaticon-user"></span>
                            </a>
                            <div class="header-account stelina-submenu">
                                <div class="header-user-form-tabs">
                                    <ul class="tab-link">
                                        <li class="active">
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Register</a>
                                        </li>
                                    </ul>
                                    <div class="tab-container">
                                        <div id="header-tab-login" class="tab-panel active">
                                            <form method="post" class="login form-login">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <label class="form-checkbox">
                                                        <input type="checkbox" class="input-checkbox">
                                                        <span>
																	Remember me
																</span>
                                                    </label>
                                                    <input type="submit" class="button" value="Login">
                                                </p>
                                                <p class="lost_password">
                                                    <a href="#">Lost your password?</a>
                                                </p>
                                            </form>
                                        </div>
                                        <div id="header-tab-rigister" class="tab-panel">
                                            <form method="post" class="register form-register">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <input type="submit" class="button" value="Register">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="menu-bar mobile-navigation menu-toggle" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-container rows-space-20">
        <div class="container">
            <div class="header-nav-wapper main-menu-wapper">
                <div class="vertical-wapper block-nav-categori">
                    <div class="block-title">
							<span class="icon-bar">
								<span></span>
								<span></span>
								<span></span>
							</span>
                        <span class="text">All Categories</span>
                    </div>
                    <div class="block-content verticalmenu-content">
                        <ul class="stelina-nav-vertical vertical-menu stelina-clone-mobile-menu">
                            <li class="menu-item">
                                <a href="#" class="stelina-menu-item-title" title="New Arrivals">New Arrivals</a>
                            </li>
                            <li class="menu-item">
                                <a title="Hot Sale" href="#" class="stelina-menu-item-title">Hot Sale</a>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a title="Accessories" href="#" class="stelina-menu-item-title">Accessories</a>
                                <span class="toggle-submenu"></span>
                                <ul role="menu" class=" submenu">
                                    <li class="menu-item">
                                        <a title="Living" href="#" class="stelina-item-title">Living</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Accents" href="#" class="stelina-item-title">Accents</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="New Arrivals" href="#" class="stelina-item-title">New Arrivals</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Accessories" href="#" class="stelina-item-title">Accessories</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Bedroom" href="#" class="stelina-item-title">Bedroom</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a title="Accents" href="#" class="stelina-menu-item-title">Accents</a>
                            </li>
                            <li class="menu-item">
                                <a title="Tables" href="#" class="stelina-menu-item-title">Tables</a>
                            </li>
                            <li class="menu-item">
                                <a title="Dining" href="#" class="stelina-menu-item-title">Dining</a>
                            </li>
                            <li class="menu-item">
                                <a title="Lighting" href="#" class="stelina-menu-item-title">Lighting</a>
                            </li>
                            <li class="menu-item">
                                <a title="Office" href="#" class="stelina-menu-item-title">Office</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-nav">
                    <div class="container-wapper">
                        <ul class="stelina-clone-mobile-menu stelina-nav main-menu " id="menu-main-menu">
                            <li class="menu-item  menu-item">
                                <a href="#" class="stelina-menu-item-title" title="Home">Home</a>
                                <span class="toggle-submenu"></span>
                               
                            </li>


                            @foreach($categories as $category)
                            <li class="menu-item menu-item">
                                <a href="" class="stelina-menu-item-title" title="Shop">{{ $category->name }}</a>
                                <span class="toggle-submenu"></span>
                               
                            </li>
                            @endforeach

                          
                           
                            <li class="menu-item">
                                <a href="#" class="stelina-menu-item-title" title="About">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>