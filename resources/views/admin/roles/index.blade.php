@extends('admin.layouts.app')

@section('content-header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Roles</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a>
                        </li>
                        <li class="breadcrumb-item active">All Roles
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
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Add role</a>
            <table class="table data-list-view">
                <thead>
                    <tr>
                        <th></th>
                        <th>NAME</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['roles'] as $role)

                        <tr>
                            <td></td>
                            <td class="product-name">{{ $role->name }}</td>
                            <td class="product-action">
                                <a href="{{ route('admin.roles.edit', $role->id) }}">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                </a>
                                <a href="{{ route('admin.roles.show', $role->id) }}">
                                    <span class="action-show"><i class="feather icon-eye"></i></span>
                                </a>
                                <a href="#" class="remove-table" data-action="{{ route('admin.roles.destroy', $role->id) }}">
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </a>
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
            {{ $data['roles']->links() }}
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