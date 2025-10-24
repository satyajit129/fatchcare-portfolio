@extends('backend.global.master')

@section('title', $featured ? 'Edit Featured' : 'Create Featured')
@section('heading', $featured ? 'Edit Featured' : 'Create Featured')

@section('backend_content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('adminFeaturedSave', $featured->id ?? null) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Title <span class="text-danger">*</span> </label>
                    <input type="text" name="title" class="form-control" value="{{ $featured->title ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4" required>{{ $featured->description ?? '' }}</textarea>

                </div>

                <div class="mb-3">
                    <label for="">Icon @if (isset($featured->id) && isset($featured->icon))
                            <span class="text-danger"></span>
                        @else
                            <span class="text-danger">*</span>
                        @endif </label>
                    <input type="file" name="icon" class="form-control" {{ $featured ? '' : 'required' }}>
                </div>
                @if (isset($featured->id) && isset($featured->icon))
                    <div class="mb-3">
                        <label>Current Icon</label><br>

                        <a href="{{ asset('images/website/' . $featured->icon) }}" target="_blank">
                            <img style="background: blue;" src="{{ asset('images/website/' . $featured->icon) }}" alt="Featured Icon" width="150"
                                style="cursor:pointer;">
                        </a>

                    </div>
                @endif
                <div class="mb-3">
                    <label>Image @if (isset($featured->id) && isset($featured->image))
                            <span class="text-danger"></span>
                        @else
                            <span class="text-danger">*</span>
                        @endif </label>
                    <input type="file" name="image" class="form-control" {{ $featured ? '' : 'required' }}>
                </div>
                @if (isset($featured->id) && isset($featured->image))
                    <div class="mb-3">
                        <label>Current Image</label><br>

                        <a href="{{ asset('images/website/' . $featured->image) }}" target="_blank">
                            <img src="{{ asset('images/website/' . $featured->image) }}" alt="Featured Image" width="250"
                                style="cursor:pointer;">
                        </a>

                    </div>
                @endif

                <button type="submit" class="btn btn-outline-primary">{{ $featured ? 'Update' : 'Create' }} Featured
                </button>
            </form>
        </div>
    </div>
@endsection
