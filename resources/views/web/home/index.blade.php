@extends('web.layouts.app')

@section('title', 'Packages')

@section('content')
<section class="check_demo_movie">
    <div class="container">
        <h2 class=" wow fadeInDown">Check Our <span class="main-color"> Packages</span></h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="card-header">
                        <img src="{{ asset('web/images/demo1.png') }}" src="{{ asset('web/images/demo1.png') }}" class="lazyload">
                    </div>
                    <div class="card-body">
                        <h4> <a href="#"> Sciences</a></h4>
                        <div class="rating">
                            <ul class="d-flex justify-content-center rating_stars">
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                            </ul>
                        </div>
                        <p class="package-price">
                            <span>3393$ </span>
                            <span><del class="text-danger">4545$</del></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.6s">
                    <div class="card-header">
                        <img src="{{ asset('web/images/demo2.png') }}" src="{{ asset('web/images/demo2.png') }}" class="lazyload">
                    </div>
                    <div class="card-body">
                        <h4><a href="#">Geographically</a> </h4>
                        <div class="rating">
                            <ul class="d-flex justify-content-center rating_stars">
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                            </ul>
                        </div>
                        <p class="package-price">
                            <span>3393$ </span>
                            <span><del class="text-danger">4545$</del></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.7s">
                    <div class="card-header">
                        <img src="{{ asset('web/images/demo3.png') }}" src="{{ asset('web/images/demo3.png') }}" class="lazyload">
                    </div>
                    <div class="card-body">
                        <h4><a href="#"> Islamic History</a></h4>
                        <div class="rating">
                            <ul class="d-flex justify-content-center rating_stars">
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                            </ul>
                        </div>
                        <p class="package-price">
                            <span>3393$ </span>
                            <span><del class="text-danger">4545$</del></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection