@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
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
                <div class="card shadow-lg p-4">
                    <h3 class="mb-4 text-primary">Update Project Settings</h3>

                    <!-- Project Name -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Project Name</label>
                        <input type="text" name="project_name" class="form-control" value="{{ $setting->project_name }}"
                            placeholder="Enter project name">
                        @error('project_name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Logo Upload -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Project Logo</label>
                        <input type="file" name="logo" class="form-control dropify"
                            data-default-file="{{ $setting->project_logo ? asset('uploads/' . $setting->project_logo) : '' }}"
                            accept="image/*">
                        @error('logo')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Favicon Upload -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Favicon</label>
                        <input type="file" name="favicon" class="form-control dropify"
                            data-default-file="{{ $setting->favicon ? asset('uploads/' . $setting->favicon) : '' }}"
                            accept="image/*">
                        @error('favicon')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- President Section -->
                    <div class="mb-4">
                        <h5 class="text-secondary mb-3">President Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-secondary">President Name</label>
                                <input type="text" name="president_name" class="form-control"
                                    value="{{ $setting->president_name }}" placeholder="Enter president name">
                                @error('president_name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-secondary">President Designation</label>
                                <input type="text" name="president_designation" class="form-control"
                                    value="{{ $setting->president_designation }}" placeholder="Enter president designation">
                                @error('president_designation')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">President Image</label>
                            <input type="file" name="president_image" class="form-control dropify"
                                data-default-file="{{ $setting->president_image ? asset('uploads/' . $setting->president_image) : '' }}"
                                accept="image/*">
                            @error('president_image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Trainer Section -->
                    <div class="mb-4">
                        <h5 class="text-secondary mb-3">Trainer Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-secondary">Trainer Name</label>
                                <input type="text" name="trainer_name" class="form-control"
                                    value="{{ $setting->trainer_name }}" placeholder="Enter trainer name">
                                @error('trainer_name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-secondary">Trainer Designation</label>
                                <input type="text" name="trainer_designation" class="form-control"
                                    value="{{ $setting->trainer_designation }}" placeholder="Enter trainer designation">
                                @error('trainer_designation')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Trainer Image</label>
                            <input type="file" name="trainer_image" class="form-control dropify"
                                data-default-file="{{ $setting->trainer_image ? asset('uploads/' . $setting->trainer_image) : '' }}"
                                accept="image/*">
                            @error('trainer_image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="mb-4">
                        <h5 class="text-secondary mb-3">Social Media Links</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold text-secondary">Facebook Link</label>
                                <input type="url" name="facebook" class="form-control" value="{{ $setting->fb_link }}"
                                    placeholder="https://facebook.com/yourpage">
                                @error('facebook')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold text-secondary">Instagram Link</label>
                                <input type="url" name="instagram" class="form-control" value="{{ $setting->insta_link }}"
                                    placeholder="https://instagram.com/yourprofile">
                                @error('instagram')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold text-secondary">YouTube Link</label>
                                <input type="url" name="youtube" class="form-control" value="{{ $setting->youtube_link }}"
                                    placeholder="https://youtube.com/channel/yourchannel">
                                @error('youtube')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm">Update Settings</button>
                    </div>
                </div>
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
