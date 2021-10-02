@extends('web.layouts.app')

@section('title', 'Packages')

@section('loading')
    <div class="preloader">
        <div class="preloader-loading">
            <img src="{{ asset('web/images/logo-m.png') }}" data-src="{{ asset('web/images/logo-m.png') }}" class="lazyload">
        </div>
    </div>
@endsection

@section('content')

    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">Check Our <span class="main-color"> Packages</span></h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.</p>
            <div class="row">
                
                @forelse ($data['alboms'] as $albom)

                    <div class="col-md-4">
                        <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="card-header">
                                <img src="{{ asset('storage/'.$albom->main_image) }}" src="{{ asset('storage/'.$albom->main_image) }}" class="lazyload">
                            </div>
                            <div class="card-body">
                                <h4> <a href="{{ route('web.alboms.show', $albom->id) }}">{{ $albom->title }}</a></h4>
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
                                    <span>{{$albom->price_after}}$ </span>
                                    <span><del class="text-danger">{{ $albom->price_before }}$</del></span>
                                </p>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-md-4">
                        <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="card-header">
                                No alboms
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>

            {{ $data['alboms']->links() }}
        </div>
    </section>

@endsection