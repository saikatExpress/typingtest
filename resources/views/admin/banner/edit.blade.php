@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-left text-primary mb-4">Update Banner</h2>

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

            <form action="{{ route('banner.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $banner->id }}">
                <div class="form-group">
                    <label for="banner" class="font-weight-bold text-secondary">Banners :</label>
                    <input type="file" name="banner" class="form-control dropify"
                        data-default-file="{{ $banner->image_url ? asset($banner->image_url) : '' }}" accept="image/*">
                    @if($errors->has('banner'))
                        <span class="text-danger">{{ $errors->first('banner') }}</span>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-primary btn-lg px-5 mt-4 shadow-sm">Update Banner</button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/alert.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

        <script>
            $('.dropify').dropify();
        </script>
    @endpush
@endsection
