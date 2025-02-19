@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/datatable/css/datatables.min.css') }}">
@endpush
@section('content')

    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-left text-primary mb-4">All User</h2>
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Add New User</a>
            </div>

            @if(session('message'))
                <div class="alert alert-success" id="success-message">
                    {{ session('message') }}
                </div>
            @endif

            @if(session('failed'))
                <div class="alert alert-danger" id="error-message">
                    {{ session('failed') }}
                </div>
            @endif

            <table class="table table-hover" id="data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Student ID</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>


    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('assets/datatable/js/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/alert.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function () {
                var searchable = [];
                var selectable = [];
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    }
                });
                if (!$.fn.DataTable.isDataTable('#data-table')) {
                    let dTable = $('#data-table').DataTable({
                        order: [],
                        lengthMenu: [
                            [25, 50, 100, 200, 500, -1],
                            [25, 50, 100, 200, 500, "All"]
                        ],
                        processing: true,
                        responsive: true,
                        serverSide: true,

                        language: {
                            processing: `<div class="text-center">
                                                        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                        </div>`
                        },

                        scroller: {
                            loadingIndicator: false
                        },
                        pagingType: "full_numbers",
                        dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr",
                        ajax: {
                            url: "{{ route('user.list') }}",
                            type: "get",
                        },

                        columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'name',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'std_id',
                            name: 'std_id',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'email',
                            name: 'email',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                        ],
                    });

                    new DataTable('#example', {
                        responsive: true
                    });
                }
            });

            function showDeleteConfirm(id, deleteUrl) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteArticle(id, deleteUrl);
                    }
                });
            }

            function deleteArticle(id, deleteUrl) {
                fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Deleted!',
                                'Your article has been deleted.',
                                'success'
                            );

                            var table = $('#data-table').DataTable();

                            table.row('#article-' + id).remove().draw();
                        } else {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the article.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire(
                            'Error!',
                            'An unexpected error occurred.',
                            'error'
                        );
                    });
            }
        </script>
    @endpush

@endsection
