@extends('admin.layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/validation/form-validation.css') }}">
@endpush

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
                        <li class="breadcrumb-item active">Edit user data
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
                    <h4 class="card-title">Simple Form Validation</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal submit-form" action="{{ route('admin.users.update', $data['user']->id) }}" method="POST" novalidate>
                            @csrf
                            @method('PUT')

                            <input type="hidden" id="edit" value="true">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="name" name="name" class="form-control" placeholder="Name" value="{{ $data['user']->name }}"
                                            required data-validation-required-message="Name field is required">
                                            <div class="error error-name invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $data['user']->email }}"
                                            required data-validation-required-message="Email field is required"
                                            required data-validation-email-message="Enter valid email">
                                            <div class="error error-email invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Input Validation end -->
@endsection

@push('js')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/js/scripts/forms/validation/form-validation.js') }}"></script>
    <!-- END: Page JS-->
@endpush