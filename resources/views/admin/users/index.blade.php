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
                        <li class="breadcrumb-item active">All Users
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <!-- Data list view starts -->
    <section id="data-list-view" class="data-list-view-header">

        <!-- DataTable starts -->
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                    <tr>
                        <th></th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['users'] as $user)
                        <tr>
                            <td></td>
                            <td class="product-name">{{ $user->name }}</td>
                            <td class="product-category">{{ $user->email }}</td>
                            <td class="product-action">
                                @can('edit users')
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    </a>
                                @endcan
                                @can('show users')
                                    <a href="{{ route('admin.users.show', $user->id) }}">
                                        <span class="action-show"><i class="feather icon-eye"></i></span>
                                    </a>    
                                @endcan
                                @can('delete users')
                                    <a href="#" class="remove-table" data-action="{{ route('admin.users.destroy', $user->id) }}">
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </a>    
                                @endcan
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td></td>
                            <td>No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $data['users']->links() }}
        </div>
        <!-- DataTable ends -->

    </section>
    <!-- Data list view end -->
@endsection

@push('js')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard/backend/shared/delete-item.js') }}"></script>
    <!-- END: Page JS-->
@endpush