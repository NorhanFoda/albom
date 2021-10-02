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
                        <li class="breadcrumb-item active">View Employee
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<!-- Simple Validation start -->
<section class="simple-validation">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">View employees</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="name" name="name" class="form-control" placeholder="Name" value="{{ $data['emp']->name }}"
                                            required data-validation-required-message="Name field is required" disabled>
                                            <div class="error error-name invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" placeholder="email" value="{{  $data['emp']->email }}"
                                            required data-validation-required-message="Email field is required"
                                            data-validation-email-message="Please enter a valid email" disabled>
                                            <div class="error error-email invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                             
                                <!-- permissions start -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header border-bottom mx-2 px-0">
                                            <h6 class="border-bottom py-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Roles
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive users-view-permission">
                                                <div class="row">
                                                    @forelse ($data['roles'] as $role)
                                                        <div class="col-md-4">
                                                            <div class="custom-control custom-checkbox ml-50">
                                                                <input type="checkbox" id="users-checkbox{{ $role->id }}" class="custom-control-input" 
                                                                    value="{{ $role->id }}" name="roles[]" required disabled
                                                                    @if( $data['emp']->roles->contains($role->id)) checked @endif
                                                                    data-validation-required-message="Permissions are required">
                                                                <label class="custom-control-label" for="users-checkbox{{ $role->id }}">{{ $role->name }}</label>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="col-md-4">
                                                            No Data
                                                        </div>
                                                    @endforelse
                                                    <div class="error error-permissions invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- permissions end -->

                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Input Validation end -->
@endsection
