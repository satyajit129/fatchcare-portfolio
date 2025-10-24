@extends('backend.global.master')

@section('title', 'Featured')
@section('heading', 'Featured')

@section('backend_custom_style')
    <style>
        table th,
        table td {
            vertical-align: middle !important;
        }
    </style>
@endsection

@section('backend_content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Featured List</h5>
            <a href="{{ route('adminFeaturedCreateOrEdit') }}" class="btn btn-outline-primary">Add Featured</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($featureds as $index => $featured)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="{{ asset('images/website/' . $featured->image) }}" target="_blank">
                                    <img src="{{ asset('images/website/' . $featured->image) }}" alt="Featured Image"
                                        width="100">
                                </a>
                            </td>
                            <td style="background: #0000ff; text-align:center;">
                                <a href="{{ asset('images/website/' . $featured->icon) }}" target="_blank">
                                    <img src="{{ asset('images/website/' . $featured->icon) }}" alt="Featured Icon"
                                        width="100">
                                </a>
                            </td>
                            <td>{{ $featured->title }}</td>
                            <td>{{ $featured->description }}</td>
                            <td>
                                <a href="{{ route('adminFeaturedCreateOrEdit', $featured->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <a href="javascript:void(0);"
                                    data-url="{{ route('adminFeaturedDelete', ['id' => $featured->id]) }}"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete"
                                    class="btn btn-sm btn-danger delete-btn">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Featured items found. Please add Featured items.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger btn-sm" id="confirmDeleteBtn">Yes, Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('backend_custom_js')
    <script>
        $(document).ready(function() {
            $('.delete-btn').on('click', function() {
                var deleteUrl = $(this).data('url');
                $('#confirmDeleteBtn').attr('href', deleteUrl);
            });
        });
    </script>
@endsection
