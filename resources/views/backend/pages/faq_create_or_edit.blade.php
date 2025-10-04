@extends('backend.global.master')

@section('title', $faq ? 'Edit FAQ' : 'Create FAQ')
@section('heading', $faq ? 'Edit FAQ' : 'Create FAQ')

@section('backend_content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('adminFAQSave', $faq->id ?? null) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Question</label>
                    <input type="text" name="question" class="form-control" value="{{ $faq->question ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label>Answer</label>
                    <textarea name="answer" class="form-control" rows="4" required>{{ $faq->answer ?? '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">{{ $faq ? 'Update' : 'Create' }} FAQ </button>
            </form>
        </div>
    </div>
@endsection
