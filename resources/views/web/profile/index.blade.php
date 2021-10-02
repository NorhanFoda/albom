@extends('web.layouts.app')

@section('title', 'Packages')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/validation/form-validation.css') }}">
@endpush

@section('content')
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Update Peronal Info</h3>
        
            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form action="{{ route('web.update-profile') }}" method="POST" class="submit-form" novalidate>
                            @csrf
                            @method('PUT')

                            <input type="hidden" id="edit" value="true">

                            <div class="form-group ">
                                <label for="inputName">Write Your Name</label>
                                <input type="text" id="inputName" class="form-control" name="name" value="{{ auth()->user()->name }}" required
                                    placeholder="Write Your Name"
                                    data-validation-required-message="Name field is required">
                                <div class="error error-name invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Your Email Addrss</label>
                                <input type="email" id="inputEmail" class="form-control" name="email" value="{{ auth()->user()->email }}" required
                                    placeholder="Write Your Email"
                                    data-validation-required-message="Email field is required"
                                    data-validation-email-message="Enter valid email">
                                <div class="error error-email invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Enter Password </label>
                                <input type="password" id="inputPassword" class="form-control" minlength="6" name="password"
                                    placeholder=" Write Your password"
                                    data-validation-minlength-message="Password must be at least 6 characters">
                                <div class="error error-password invalid-feedback"></div>
                            </div>
                        
                            <div class="form-group">
                                <label for="inputConfirmPassword">Confirm Password </label>
                                <input type="password" id="inputConfirmPassword" class="form-control" name="password_confirmation"
                                placeholder="Confirm Your password">
                            <div class="error error-password_confirmation invalid-feedback"></div>
                            </div>

                            <div class="text-center p-2">
                                <button type="submit" class="btn btn-gradiant">Save changes</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/js/scripts/forms/validation/form-validation.js') }}"></script>
    <script src="{{ asset('dashboard/backend/shared/submit-form.js') }}"></script>
    <!-- END: Page JS-->
@endpush