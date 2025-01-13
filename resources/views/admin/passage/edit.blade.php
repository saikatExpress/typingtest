@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-center text-primary mb-4">Update Passage</h2>

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

            <form method="POST" action="{{ route('passage.update') }}">
                @csrf
                <input type="hidden" value="{{ $passage->id }}" name="passage_id">

                <!-- Language Type -->
                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Language Type:</label>
                    <select id="language_type" name="language_type" class="form-control custom-select">
                        <option value="" disabled selected>Select type</option>
                        <option value="bangla" {{ $passage->language_type === 'bangla' ? 'selected' : '' }}>Bangla</option>
                        <option value="english" {{ $passage->language_type === 'english' ? 'selected' : '' }}>English</option>
                    </select>
                    @if($errors->has('language_type'))
                        <span class="text-danger">{{ $errors->first('language_type') }}</span>
                    @endif
                </div>

                <!-- Word Count -->
                <div class="form-group">
                    <label for="word-count" class="font-weight-bold text-secondary">Choose Word Count:</label>
                    <select id="word-count" name="word-count" class="form-control custom-select">
                        <option value="" disabled selected>Select word count</option>
                        <option value="200" {{ $passage->total_word === 200 ? 'selected' : '' }}>200 words</option>
                        <option value="300" {{ $passage->total_word === 300 ? 'selected' : '' }}>300 words</option>
                        <option value="500" {{ $passage->total_word === 500 ? 'selected' : '' }}>500 words</option>
                    </select>
                    @if($errors->has('word-count'))
                        <span class="text-danger">{{ $errors->first('word-count') }}</span>
                    @endif
                </div>

                <!-- Passage Text -->
                <div id="text-area-container" class="form-group">
                    <label for="passage-text" class="font-weight-bold text-secondary">Write your passage:</label>
                    <textarea id="passage-text" name="passage-text" class="form-control" rows="6" placeholder="Start writing here..." style="border-radius: 8px;">{{ $passage->passage }}</textarea>
                    @if($errors->has('passage-text'))
                        <span class="text-danger">{{ $errors->first('passage-text') }}</span>
                    @endif
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status" class="font-weight-bold text-secondary">Status:</label>
                    <select id="status" name="status" class="form-control custom-select">
                        <option value="" disabled selected>Select Status</option>
                        <option value="active" {{ $passage->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $passage->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @if($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-primary btn-lg px-5 mt-4 shadow-sm">Update Passage</button>
                </div>
            </form>

        </div>
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/alert.js') }}"></script>
    @endpush
@endsection

