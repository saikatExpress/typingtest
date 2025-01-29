@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>
@endpush
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-left text-primary mb-4">Update Project Settings</h2>

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

            <form action="{{ route('setting.project_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Project Name -->
                <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <input type="text" name="project_name" class="form-control" value="{{ $setting->project_name }}" placeholder="Enter project name">
                    @error('project_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Logo Upload -->
                <div class="mb-3">
                    <label class="form-label">Project Logo</label>
                    <input type="file" name="logo" class="form-control dropify" accept="image/*">
                    @error('logo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Favicon Upload -->
                <div class="mb-3">
                    <label class="form-label">Favicon</label>
                    <input type="file" name="favicon" class="form-control dropify" accept="image/*">
                    @error('favicon')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Facebook Link -->
                <div class="mb-3">
                    <label class="form-label">Facebook Link</label>
                    <input type="url" name="facebook" class="form-control" value="{{ $setting->fb_link }}" placeholder="https://facebook.com/yourpage">
                    @error('facebook')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Instagram Link -->
                <div class="mb-3">
                    <label class="form-label">Instagram Link</label>
                    <input type="url" name="instagram" class="form-control" value="{{ $setting->insta_link }}" placeholder="https://instagram.com/yourprofile">
                    @error('instagram')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- YouTube Link -->
                <div class="mb-3">
                    <label class="form-label">YouTube Link</label>
                    <input type="url" name="youtube" class="form-control" value="{{ $setting->youtube_link }}" placeholder="https://youtube.com/channel/yourchannel">
                    @error('youtube')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Settings</button>
            </form>
        </div>
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
        <script src="{{ asset('assets/js/alert.js') }}"></script>

        <script>
            $('.dropify').dropify();
        </script>
    @endpush
@endsection
