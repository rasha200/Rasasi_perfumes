@extends('layouts.user_side_master')

@section('content')

<div class="main-content main-content-404 right-sidebar">
    <div class="container">
        <div class="row">
            <div class="content-area content-404 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <section class="error-404 not-found">
                        <div class="images">
                            <img src="{{asset("landing_page/assets/images/404.avif")}}" alt="img" style="width:600px; height:400px;">
                        </div>
                        <div class="text-404">
                            <h1 class="page-title">
                                Error 404 Not Found
                            </h1>
                            <p class="page-content">
                                We´re sorry but the page you are looking for does nor exist. <br/>
                                You could return to
                                <a href="{{ route('home') }}" class="hightlight"> Home page</a>
                               
                            </p>
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection