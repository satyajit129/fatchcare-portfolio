@extends('backend.global.master')

@section('title', 'Silder')
@section('heading', 'Silder')

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
            <h5>Silder List</h5>
            <a href="{{ route('adminSilderCreateOrEdit') }}" class="btn btn-outline-primary">Add Silder</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($silders as $index => $silder)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="{{ asset('images/website/' . $silder->image) }}" target="_blank">
                                    <img src="{{ asset('images/website/' . $silder->image) }}" alt="Slider Image"
                                        width="100">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('adminSilderCreateOrEdit', $silder->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <a href="javascript:void(0);"
                                    data-url="{{ route('adminSilderDelete', ['id' => $silder->id]) }}"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete"
                                    class="btn btn-sm btn-danger delete-btn">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No Silders found. Please add slider images.</td>
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
