@extends('web.layouts.auth.app')

@section('title', 'Login')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/validation/form-validation.css') }}">
@endpush

@section('content')
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Login To Join Us</h3>
        
            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form action="{{ route('login') }}" method="POST" class="submit-form" novalidate>
                            @csrf

                            <div class="form-group">
                                <label for="inputEmail">Your Email Addrss</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" required
                                    placeholder="Write Your Email"
                                    data-validation-required-message="Email field is required"
                                    data-validation-email-message="Enter valid email">
                                    <div class="error error-email invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Your Password </label> 
                                <input type="password" name="password" id="inputPassword" class="form-control" required
                                    placeholder=" Write Your password"
                                    data-validation-required-message="Password fiels is required">
                                <div class="error error-password invalid-feedback"></div>
                            </div>
                        

                            <div class="text-center p-2">
                                <button type="submit" class="btn btn-gradiant">login</button>
                            </div>

                            <div >
                            <b> <span>Don't Have An Account ?</span> <a href="{{ route('register') }}" class="main-color ">Sign Up</a></b>
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
    <script src="{{ asset('dashboard/backend/shared/submit-login-form.js') }}"></script>
    <!-- END: Page JS-->
@endpush