@extends('web.layouts.app')

@section('title', 'Add albom')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/validation/form-validation.css') }}">
@endpush

@section('content')
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Add albom</h3>
        
            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form action="{{ route('web.alboms.store') }}" method="POST" class="submit-form" enctype="multipart/form-data" novalidate>
                            @csrf

                            <div class="form-group">

                                <label for="title">Albom title</label> 
                                <input type="text" name="title" id="title" class="form-control" required
                                    placeholder="Albom title"
                                    data-validation-required-message="title field is required">
                                <div class="error error-title invalid-feedback"></div>

                                <label for="price_before">Price before</label> 
                                <input type="number" step="0.1" name="price_before" id="price_before" class="form-control" required
                                    placeholder="Price before"
                                    data-validation-required-message="price_before field is required">
                                <div class="error error-price_before invalid-feedback"></div>

                                <label for="price_after">Price after</label> 
                                <input type="number" step="0.1" name="price_after" id="price_after" class="form-control" required
                                    placeholder="Price after"
                                    data-validation-required-message="price_after field is required">
                                <div class="error error-price_after invalid-feedback"></div>

                                <label for="image">Upload albom main image</label> 
                                <input type="file" name="main_image" id="main_image" class="form-control" required 
                                    placeholder="Upload albom main image"
                                    accept=".png,.jpeg,.jpg,.gif"
                                    data-validation-required-message="main_image field is required">
                                <div class="error error-main_image invalid-feedback"></div>

                                <label for="images">Upload albom images</label> 
                                <input type="file" name="images[]" id="images" class="form-control" required multiple
                                    placeholder="Upload albom main image"
                                    accept=".png,.jpeg,.jpg,.gif"
                                    data-validation-required-message="images field is required">
                                <div class="error error-images invalid-feedback"></div>

                                <label for="type">Albom type</label> 
                                <input type="radio" name="type" value="public" id="type1" class="form-control" required
                                    data-validation-required-message="type field is required">Public
                                <input type="radio" name="type" value="private" id="type2" class="form-control" required
                                    data-validation-required-message="type field is required">Private
                                <div class="error error-type invalid-feedback"></div>
                            </div>

                            <div class="text-center p-2">
                                <button type="submit" class="btn btn-gradiant">Save</button>
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