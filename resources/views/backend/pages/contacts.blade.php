@extends('backend.global.master')

@section('title', 'Contact Requests')
@section('heading', 'Contact Requests')

@section('backend_custom_style')
    <style>
        table th,
        table td {
            vertical-align: middle;
        }
    </style>
@endsection

@section('backend_content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Contact Requests</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Clinic Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Submitted At</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->full_name }}</td>
                            <td>{{ $contact->clinic_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ Str::limit($contact->message, 80) }}</td>
                            <td>{{ $contact->created_at->format('d M, Y h:i A') }}</td>
                            <td>
                                <button type="button" 
                                        class="btn btn-sm btn-danger delete-btn" 
                                        data-url="{{ route('adminContactDelete', $contact->id) }}" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No contact requests found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this contact request?
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
