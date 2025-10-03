@extends('backend.global.master')

@section('title', 'Settings')
@section('heading', 'Website Settings')


@section('backend_custom_style')
@endsection


@section('backend_content')
    <div class="card mb-4 card-default">
        <div class="card-header">
            <h2>Website Settings</h2>
        </div>
        <form action="{{ route('storeWebsiteSettings') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="mb-3">
                        <label for="website_name" class="form-label">Website Name</label>
                        <input type="text" class="form-control" name="website_name" id="website_name"
                            value="{{ $setting->website_name ?? '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="website_email" class="form-label">Official Email</label>
                        <input type="email" class="form-control" name="website_email" id="website_email"
                            value="{{ $setting->website_email ?? '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="website_contact" class="form-label">Website Contact</label>
                        <input type="text" class="form-control" name="website_contact" id="website_contact"
                            value="{{ $setting->website_contact ?? '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="website_address" class="form-label">Website Address</label>
                        <input type="text" class="form-control" name="website_address" id="website_address"
                            value="{{ $setting->website_address ?? '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="website_copy_right_text" class="form-label">Copyright Text</label>
                        <textarea type="text" class="form-control" name="website_copy_right_text" id="website_copy_right_text" cols="50"
                            rows="4">{{ $setting->website_copy_right_text ?? '' }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="hero_text_one" class="form-label">Hero Section Text(One)</label>
                        <textarea type="text" class="form-control" name="hero_text_one" id="hero_text_one" cols="50"
                            rows="4">{{ $setting->hero_text_one ?? '' }}</textarea>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <div class="mb-3">
                        <label for="hero_text_two" class="form-label">Hero Section Text(Two)</label>
                        <textarea type="text" class="form-control" name="hero_text_two" id="hero_text_two" cols="50"
                            rows="4">{{ $setting->hero_text_two ?? '' }}</textarea>
                    </div>
                </div> --}}

                <div class="form-group d-flex">
                    <div class="mt-4 mb-3">
                        <label for="phone" class="form-label">Official Logo</label>
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <input type="file" name="website_logo" id="website_logo"
                                    accept="image/png, image/jpeg, image/jpg" />
                            </div>
                        </div>
                    </div>
                    @if (isset($setting->website_logo))
                        <div style="width:350px; margin-top:30px">
                            @php
                                $imagePath = \App\UtilityFunction::globalImagePath('website', $setting->website_logo);
                            @endphp
                            <img src="{{ $imagePath }}" alt="image not found" class="img-fluid">
                        </div>
                    @endif
                </div>
                <div class="form-group d-flex">
                    <div class="mt-4 mb-3">
                        <label for="phone" class="form-label">Official Favicon</label>
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <input type="file" name="website_favicon" id="website_favicon"
                                    accept="image/png, image/jpeg, image/jpg" />
                            </div>
                        </div>
                    </div>
                    @if (isset($setting->website_favicon))
                        <div style="width:350px; margin-top:30px">
                            @php
                                $imagePath = \App\UtilityFunction::globalImagePath(
                                    'website',
                                    $setting->website_favicon,
                                );
                            @endphp
                            <img src="{{ $imagePath }}" alt="image not found" class="img-fluid">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-outline-success text-center" >Update Settings</button>
            </div>
                
        </form>
    </div>
@endsection

@section('backend_custom_js')
@endsection
