@extends('web.layouts.app')

@section('title', 'Albom')

@section('content')

    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">Your Alboms</h2>
            <p><a href="{{ route('web.alboms.create') }}"><i class="fa fa-plus"></i>Add new albom</a></p>
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
                                        <li><a href="{{ route('web.alboms.edit', $albom->id) }}"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="#" class="remove-table" data-action="{{ route('web.alboms.destroy', $albom->id) }}"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </div>
                                <p class="package-price">
                                    <span>{{$albom->price_before}}$ </span>
                                    <span><del class="text-danger">{{ $albom->price_after }}$</del></span>
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

@push('js')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard/backend/shared/delete-item.js') }}"></script>
    <!-- END: Page JS-->
@endpush