@extends('web.layouts.app')

@section('title', 'View albom')

@section('content')

    <section class="check_demo_movie">
        <div class="container">
            <h2 class=" wow fadeInDown">{{ $data['albom']->title }}</h2>
            @if(auth()->check() && auth()->user()->hasRole('user') && $image->albom->user_id == auth()->user()->id)
                <p><a href="{{ route('web.alboms.edit', $data['albom']->id) }}"><i class="fa fa-plus"></i>Edit albom</a></p>
            @endif
            <div class="row">

                @foreach ($data['albom']->images as $image)

                    <div class="col-md-4">
                        <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="card-header">
                                <img src="{{ asset('storage/'.$image->path) }}" src="{{ asset('storage/'.$image->path) }}" class="lazyload">
                            </div>
                            @if(auth()->check() && auth()->user()->hasRole('user') && $image->albom->user_id == auth()->user()->id)
                                <div class="card-body">
                                    <div class="rating">
                                        <ul class="d-flex justify-content-center rating_stars">
                                            <li><a href="#" class="remove-table" data-action="{{ route('web.images.destroy', $image->id) }}"><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
@endsection

@push('js')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard/backend/shared/delete-item.js') }}"></script>
    <!-- END: Page JS-->
@endpush