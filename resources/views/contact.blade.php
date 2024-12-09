@extends('layouts.user_side_master')

@section('content')

<div class="main-content main-content-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Contact us
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-contact col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">Contact us</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="page-main-content">
        <div class="google-map">
                <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-contact">
                        <div class="col-lg-8 no-padding">
                            <div class="form-message">
                                <h2 class="title">
                                    Send us a Message!
                                </h2>
                                <form action="{{ route('contact.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">First Name *</span>
                                                <input type="text" name="Fname" size="40" class="form-control form-control-name" required>
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Last Name *</span>
                                                <input type="text" name="Lname" size="40" class="form-control form-control-name" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Phone</span>
                                                <input type="text" name="mobile" class="form-control form-control-phone" required>
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Your Email *</span>
                                                <input type="email" name="email" size="40" class="form-control form-control-email" required>
                                            </p>
                                        </div>
                                    </div>
                                    <p>
                                        <span class="form-label">Your Message</span>
                                        <textarea name="message" cols="40" rows="9" class="form-control your-textarea" required></textarea>
                                    </p>
                                    <p>
                                        <span class="form-label">Subject</span>
                                        <input type="text" name="subject" class="form-control" required>
                                    </p>
                                    <p>
                                        <input type="submit" value="SEND MESSAGE" class="form-control-submit button-submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 no-padding">
                            <div class="form-contact-information">
                                <form action="#" class="stelina-contact-info">
                                    <h2 class="title">
                                        Contact information
                                    </h2>
                                    <div class="info">
                                        <div class="item address">
												<span class="icon">

												</span>
                                            <span class="text">
													 Restfield White City London G12 Ariel Way - United Kingdom
												</span>
                                        </div>
                                        <div class="item phone">
												<span class="icon">

												</span>
                                            <span class="text">
													(+800) 123 456 7890
												</span>
                                        </div>
                                        <div class="item email">
												<span class="icon">

												</span>
                                            <span class="text">
													info@stelinaoutfit.co.uk
												</span>
                                        </div>
                                    </div>
                                    <div class="socials">
                                        <a href="#" class="social-item" target="_blank">
												<span class="icon fa fa-facebook">

												</span>
                                        </a>
                                        <a href="#" class="social-item" target="_blank">
												<span class="icon fa fa-twitter-square">

												</span>
                                        </a>
                                        <a href="#" class="social-item" target="_blank">
												<span class="icon fa fa-instagram">

												</span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
