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
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $data['user']->name }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <!-- page users view start -->
    <section class="page-users-view">
        <div class="row">
            <!-- account start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Account</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                <table>
                                    <tr>
                                        <td class="font-weight-bold">Name</td>
                                        <td>{{ $data['user']->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Email</td>
                                        <td>{{ $data['user']->email }}</td>
                                    </tr>
                                </table>
                            </div>
                            
                            @can('edit_users')
                                <div class="col-12">
                                    <a href="{{ route('admin.users.edit', $data['user']->id) }}" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <!-- account end -->
           
        </div>

         <!-- alboms start -->
        @can('list_alboms')
            <div class="row">
                @forelse ($data['user']->alboms as $albom)
                    <div class="col-lg-4 col-md-1 col-sm-1 col-xs-1">
                        <div class="card ecommerce-card">
                            <div class="card-content">
                                @can('show_alboms')
                                    <div class="item-img text-center">
                                        <a href="{{ route('admin.view-albom', $albom->id) }}">
                                            <img src="{{ asset('storage/'.$albom->main_image) }}" class="img-fluid" alt="img-placeholder">
                                        </a>
                                    </div>
                                @endcan
                                <div class="card-body">
                                    <div class="item-name">
                                        <a href="{{ route('admin.view-albom', $albom->id) }}" style="display: inline-block">
                                            <h3>{{$albom->title}} - {{ $albom->type }}</h3>
                                        </a>

                                        @can('delete_alboms')
                                            <a href="#" class="remove-table btn btn-danger" data-action="{{ route('admin.delete-albom', $albom->id) }}" style="display: inline-block; float:right">
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
        @endcan
            
        <!-- alboms end -->
    </section>
    <!-- page users view end -->
    
@endsection

@push('js')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard/backend/shared/delete-item.js') }}"></script>
    <!-- END: Page JS-->
@endpush