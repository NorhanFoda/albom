@extends('admin.layouts.app')

@section('content-header')

    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Users</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.show', $data['albom']->user_id) }}">Alboms</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $data['albom']->title }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section id="wishlist" class="grid-view wishlist-items">
        <div class="row">
            @forelse ($data['albom']->images as $image)
                <div class="col-lg-4 col-md-1 col-sm-1 col-xs-1">
                    <div class="card ecommerce-card">
                        <div class="card-content">
                            @can('show_alboms')
                                <div class="item-img text-center">
                                    <img src="{{ asset('storage/'.$image->path) }}" class="img-fluid" alt="img-placeholder">
                                </div>
                            @endcan
                            <div class="card-body">
                                <div class="item-name">
                                    @can('delete_images')
                                        <a href="#" class="remove-table btn btn-danger" data-action="{{ route('admin.delete-image', $image->id) }}" style="display: inline-block; float:right">
                                            <span class="action-delete"><i class="feather icon-trash"></i></span>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="card ecommerce-card">
                    <div class="card-content">
                        <div class="item-img text-center">
                            No Data
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </section>
@endsection

@push('js')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard/backend/shared/delete-item.js') }}"></script>
    <!-- END: Page JS-->
@endpush