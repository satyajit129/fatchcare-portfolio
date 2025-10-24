@extends('backend.global.master')

@section('title', $silder ? 'Edit Silder' : 'Create Silder')
@section('heading', $silder ? 'Edit Silder' : 'Create Silder')

@section('backend_content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('adminSilderSave', $silder->id ?? null) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" {{ $silder ? '' : 'required' }}>
                </div>
                @if (isset($silder->id) && isset($silder->image))
                    <div class="mb-3">
                        <label>Current Image</label><br>

                        <a href="{{ asset('images/website/' . $silder->image) }}" target="_blank">
                            <img src="{{ asset('images/website/' . $silder->image) }}" alt="Silder Image" width="250" style="cursor:pointer;">
                        </a>

                    </div>
                @endif

                <button type="submit" class="btn btn-outline-primary">{{ $silder ? 'Update' : 'Create' }} Silder </button>
            </form>
        </div>
    </div>
@endsection
