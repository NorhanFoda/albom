@extends('admin.layouts.app')

@section('content-header')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Employees</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.employees.index') }}">Employees</a>
                        </li>
                        <li class="breadcrumb-item active">All Employees
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
            @can('create employees')
                <a href="{{ route('admin.employees.create') }}" class="btn btn-primary">Add employee</a>
            @endcan
            <table class="table data-list-view">
                <thead>
                    <tr>
                        <th></th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD - just for test</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['emps'] as $emp)
                        <tr>
                            <td></td>
                            <td class="product-name">{{ $emp->name }}</td>
                            <td class="product-category">{{ $emp->email }}</td>
                            <td class="product-category">{{ $emp->password }}</td>
                            <td class="product-action">
                                @can('edit employees')
                                    <a href="{{ route('admin.employees.edit', $emp->id) }}">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    </a>
                                @endcan
                                @can('show employees')
                                    <a href="{{ route('admin.employees.show', $emp->id) }}">
                                        <span class="action-show"><i class="feather icon-eye"></i></span>
                                    </a>    
                                @endcan
                                @can('delete employees')
                                    <a href="#" class="remove-table" data-action="{{ route('admin.employees.destroy', $emp->id) }}">
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
            {{ $data['emps']->links() }}
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