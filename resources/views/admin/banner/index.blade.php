@extends('layouts.app')
@section('content')

    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-left text-primary mb-4">All Banner</h2>

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

            <h2 class="text-primary mb-4" style="text-align: right;">
                <a href="{{ route('banner.create') }}" class="btn btn-sm btn-success mb-2">
                    Create Banner
                </a>
            </h2>

            <table class="table table-hover" id="data-table">

                @if (count($banners) == 0)
                    <div class="alert alert-danger">
                        No banner found.
                    </div>
                @else
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Banner</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 1;
                                @endphp
                                @foreach ($banners as $banner)
                                    <tr data-id="{{ $banner->id }}">
                                        <td>{{ $sl++ }}</td>
                                        <td>
                                            <img src="{{ asset($banner->image_url) }}" alt="banner"
                                                style="width: 100px; height: 100px; border-radius: 50%;">
                                        </td>
                                        <td>
                                            <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-sm btn-warning"
                                                style="color: #fff;">Edit</a>
                                            <button class="btn btn-sm btn-danger deletebannerBtn" data-id="{{ $banner->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                @endif
            </table>
        </div>
    </div>


    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('assets/js/alert.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function () {
                $('.deletebannerBtn').on('click', function () {
                    var id = $(this).data('id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, keep it'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/banner/delete/' + id,
                                type: 'DELETE',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function (response) {
                                    Swal.fire(
                                        'Deleted!',
                                        'The banner has been deleted.',
                                        'success'
                                    );
                                    $('tr[data-id="' + id + '"]').remove();
                                },
                                error: function (xhr, status, error) {
                                    Swal.fire(
                                        'Error!',
                                        'There was an error deleting the banner.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
