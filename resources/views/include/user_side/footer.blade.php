<footer class="footer style7">
    <div class="container">
        <div class="container-wapper">
            <div class="row">
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-sm hidden-md hidden-lg">
                    <div class="stelina-newsletter style1">
                        <div class="newsletter-head">
                            <h3 class="title">Newsletter</h3>
                        </div>
                        <div class="newsletter-form-wrap">
                            <div class="list">
                                Sign up for our free video course and <br/> urban garden inspiration
                            </div>
                            <input type="email" class="input-text email email-newsletter"
                                   placeholder="Your email letter">
                            <button class="button btn-submit submit-newsletter">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="stelina-custommenu default">
                        <h2 class="widgettitle">Quick Menu</h2>
                        <ul class="menu">
                            @foreach($categories as $category)
                            <li class="menu-item">
                                <a href="{{ route('products.byCategory', $category->id) }}">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="stelina-custommenu default">
                        <h2 class="widgettitle">Information</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="#" >Name: Pukka nich</a>
                            </li>
                            <li class="menu-item">
                                <a href="tel:+962797282485" target="_blank"><i class="icon fa fa-phone"></i> +962797282485</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://wa.me/962797282485" target="_blank"><i class="icon fa fa-whatsapp"></i> +962797282485</a>
                            </li>
                            <li class="menu-item">
                                <a href="#"><i class="icon fa fa-map-marker"></i> Jordan - Aqaba</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=Mohammad.morad1990@gmail.com&su=Hello+Mohammad&body=I+would+like+to+connect+with+you." target="_blank"><i class="icon fa fa-envelope"></i> Email</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>

                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="stelina-custommenu default">
                        <h2 class="widgettitle"> My Information</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="{{ route('profile') }}"><i class="icon fa fa-user"></i> My account</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('profile') }}" ><i class="icon fa fa-history"></i> Orders history</a>
                            </li>

                            <h2 class="widgettitle"> Contact us:</h2>
                            <li class="menu-item">
                                <a href="/contact"><i class="icon fa fa-comment"></i> Contact</a>
                            </li>
                           
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-end">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="stelina-socials">
                            <ul class="socials">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100063661684576&mibextid=ZbWKwL" class="social-item" target="_blank">
                                        <i class="icon fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/962797282485" class="social-item" target="_blank">
                                        <i class="icon fa fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/pukkajo/profilecard/?igsh=MXFyZzZjdmpseTF5bQ==" class="social-item" target="_blank">
                                        <i class="icon fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="coppyright">
                            Copyright © 2024
                            <a href="#">Pukka nich</a>
                            . All rights reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer-device-mobile">
    <div class="wapper">
        <div class="footer-device-mobile-item device-home">
            <a href="index.html">
					<span class="icon">
						<i class="fa fa-home" aria-hidden="true"></i>
					</span>
                Home
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-wishlist">
            <a href="#">
					<span class="icon">
						<i class="fa fa-heart" aria-hidden="true"></i>
					</span>
                Wishlist
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-cart">
            <a href="#">
					<span class="icon">
						<i class="fa fa-shopping-basket" aria-hidden="true"></i>
						<span class="count-icon">
							0
						</span>
					</span>
                <span class="text">Cart</span>
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-user">
            <a href="login.html">
					<span class="icon">
						<i class="fa fa-user" aria-hidden="true"></i>
					</span>
                Account
            </a>
        </div>
    </div>
</div>

<a href="https://wa.me/962797282485" class="whatsapp" target="_blank">
    <i class="fa fa-whatsapp"></i>
</a>

<style>
/*whatsapp*/
.whatsapp {
	width: 50px;
	height: 50px;
	font-size: 24px;
	font-weight: 600;
	background: #900A07;
	color: #fff;
	border-radius: 50%;
	position: fixed;
	bottom: 50px;
	right: 25px;
	text-align: center;
	line-height: 50px;
	z-index: 999;
}
/* Prevent color change on visit */
.whatsapp:visited {
    color: #fff; /* Keep the icon color consistent */
}

/* Optional hover style to keep consistent */
.whatsapp:hover {
    color: #fff; /* Ensure no color change on hover */
    text-decoration: none; /* Prevent text underlining */
}
</style>

<script>
    // Example: Show WhatsApp button when the user scrolls down
    window.addEventListener('scroll', function () {
        const whatsappButton = document.querySelector('.whatsapp');
        if (window.scrollY > 200) {
            whatsappButton.classList.add('show');
        } else {
            whatsappButton.classList.remove('show');
        }
    });
</script>

<a href="#" class="backtotop">
    <i class="fa fa-angle-double-up"></i>
</a>

<script src="{{asset("https://code.jquery.com/jquery-3.6.0.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/jquery-1.12.4.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/jquery.plugin-countdown.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/jquery-countdown.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/owl.carousel.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/magnific-popup.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/isotope.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/jquery.scrollbar.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/jquery-ui.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/mobile-menu.js")}}"></script>
<script src="{{asset("landing_page/assets/js/chosen.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/slick.js")}}"></script>
<script src="{{asset("landing_page/assets/js/jquery.elevateZoom.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/jquery.actual.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/fancybox/source/jquery.fancybox.js")}}"></script>
<script src="{{asset("landing_page/assets/js/lightbox.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/owl.thumbs.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/jquery.scrollbar.min.js")}}"></script>
<script src="{{asset("landing_page/assets/js/frontend-plugin.js")}}"></script>
<!-- jQuery -->
<script src="{{asset("https://code.jquery.com/jquery-3.6.0.min.js")}}"></script>

<!-- Slick JS -->
<script type="text/javascript" src="{{asset("https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js")}}"></script>

</body>
</html>