@extends('web.layouts.app')

@section('title', 'Edit albom')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/validation/form-validation.css') }}">
@endpush

@section('content')
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Edit albom</h3>
        
            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form action="{{ route('web.alboms.update', $data['albom']->id) }}" method="POST" class="submit-form" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')

                            <input type="hidden" id="edit" value="true">

                            <div class="form-group">

                                <label for="title">Albom title</label> 
                                <input type="text" name="title" id="title" class="form-control" required
                                    placeholder="Albom title" value="{{ $data['albom']->title }}"
                                    data-validation-required-message="title field is required">
                                <div class="error error-title invalid-feedback"></div>

                                <label for="price_before">Price before</label> 
                                <input type="number" step="0.1" name="price_before" id="price_before" class="form-control" required
                                    placeholder="Price before" value="{{ $data['albom']->price_before }}"
                                    data-validation-required-message="price_before field is required">
                                <div class="error error-price_before invalid-feedback"></div>

                                <label for="price_after">Price after</label> 
                                <input type="number" step="0.1" name="price_after" id="price_after" class="form-control" required
                                    placeholder="Price after" value="{{ $data['albom']->price_after }}"
                                    data-validation-required-message="price_after field is required">
                                <div class="error error-price_after invalid-feedback"></div>

                                <label for="image">Upload albom image</label> 
                                <input type="file" name="main_image" id="main_image" class="form-control" 
                                    placeholder=" Write Your password"
                                    accept=".png,.jpeg,.jpg,.gif">
                                <div class="error error-main_image invalid-feedback"></div>
                                <img src="{{ asset('storage/'.$data['albom']->main_image) }}" width="100" height="100" alt="main image">
                            </div>

                            <label for="images">Upload albom images</label> 
                                <input type="file" name="images[]" id="images" class="form-control" multiple
                                    placeholder="Upload albom main image"
                                    accept=".png,.jpeg,.jpg,.gif">
                                <div class="error error-images invalid-feedback"></div>

                                <label for="type">Albom type</label> 
                                <input type="radio" name="type" value="public" id="type1" class="form-control" required
                                    @if($data['albom']->type == 'public') checked @endif
                                    data-validation-required-message="type field is required">Public
                                <input type="radio" name="type" value="private" id="type2" class="form-control" required
                                    @if($data['albom']->type == 'private') checked @endif
                                    data-validation-required-message="type field is required">Private
                                <div class="error error-type invalid-feedback"></div>

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