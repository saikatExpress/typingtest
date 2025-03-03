@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-left text-primary mb-4">Create Banner</h2>

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
                <a href="{{ route('banner.list') }}" class="btn btn-sm btn-success mb-2">
                    All Banner
                </a>
            </h2>

            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="banner" class="font-weight-bold text-secondary">Banners :</label>
                    <input type="file" name="banners[]" class="form-control" id="banner" multiple required>
                    @if($errors->has('banners'))
                        <span class="text-danger">{{ $errors->first('banners') }}</span>
                    @endif
                </div>

                <div class="preview-container d-flex flex-wrap mt-3"></div>

                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-primary btn-lg px-5 mt-4 shadow-sm">Save Banner</button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/alert.js') }}"></script>

        <script>
            $(document).ready(function () {
                let selectedFiles = [];

                $('#banner').on('change', function (event) {
                    let newFiles = Array.from(event.target.files);
                    selectedFiles = selectedFiles.concat(newFiles);
                    updatePreview();
                });

                function updatePreview() {
                    $('.preview-container').empty();

                    $.each(selectedFiles, function (index, file) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            let preview = `
                                                        <div class="preview-item m-2 position-relative">
                                                            <img src="${e.target.result}" class="img-thumbnail" width="100">
                                                            <button type="button" class="btn btn-danger btn-sm remove-btn position-absolute top-0 end-0" data-index="${index}">X</button>
                                                        </div>
                                                    `;
                            $('.preview-container').append(preview);
                        };
                        reader.readAsDataURL(file);
                    });

                    updateFileInput();
                }

                $(document).on('click', '.remove-btn', function () {
                    let index = $(this).data('index');
                    selectedFiles.splice(index, 1);
                    updatePreview();
                });

                function updateFileInput() {
                    let dataTransfer = new DataTransfer();
                    selectedFiles.forEach(file => dataTransfer.items.add(file));
                    $('#banner')[0].files = dataTransfer.files;
                }
            });
        </script>
    @endpush
@endsection
