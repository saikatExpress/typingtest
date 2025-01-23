@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-left text-primary mb-4">Update Project Setting</h2>

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

            <form action="{{ route('setting.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label d-block">Test : </label>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="visibility"
                            id="private"
                            value="private"
                            {{ $setting->visibility === 'private' ? 'checked' : '' }}>
                        <label class="form-check-label" for="private">Private</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="visibility"
                            id="public"
                            value="public"
                            {{ $setting->visibility === 'public' ? 'checked' : '' }}>
                        <label class="form-check-label" for="public">Public</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Update Setting</button>
            </form>
        </div>
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/alert.js') }}"></script>
    @endpush

@endsection
