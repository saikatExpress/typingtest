@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-left text-primary mb-4">Create Passage</h2>

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
                <a href="{{ route('passage.list') }}" class="btn btn-sm btn-success mb-2">
                    All Passage
                </a>
            </h2>

            <form action="{{ route('passage.store') }}" method="post">
                @csrf

                <!-- Word Count Selection -->

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Language Type:</label>
                    <select id="language_type" name="language_type" class="form-control custom-select">
                        <option value="" disabled selected>Select type</option>
                        <option value="bangla">Bangla</option>
                        <option value="english">English</option>
                    </select>
                    @if($errors->has('language_type'))
                        <span class="text-danger">{{ $errors->first('language_type') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="word-count" class="font-weight-bold text-secondary">Choose Word Count:</label>
                    <select id="word-count" name="word-count" class="form-control custom-select">
                        <option value="" disabled selected>Select word count</option>
                        <option value="200">200 words</option>
                        <option value="300">300 words</option>
                        <option value="500">500 words</option>
                    </select>
                    @if($errors->has('word-count'))
                        <span class="text-danger">{{ $errors->first('word-count') }}</span>
                    @endif
                </div>

                <!-- Textarea -->
                <div id="text-area-container" class="form-group" style="display: none;">
                    <label for="passage-text" class="font-weight-bold text-secondary">Write your passage:</label>
                    <textarea id="passage-text" name="passage-text" class="form-control" rows="6" placeholder="Start writing here..." style="border-radius: 8px;"></textarea>
                    @if($errors->has('passage-text'))
                        <span class="text-danger">{{ $errors->first('passage-text') }}</span>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-primary btn-lg px-5 mt-4 shadow-sm">Save Passage</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include jQuery for dynamic behavior -->
    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/alert.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#word-count').change(function() {
                    if ($(this).val()) {
                        $('#text-area-container').fadeIn();  // Show the textarea with fade-in effect
                    } else {
                        $('#text-area-container').fadeOut();  // Hide the textarea with fade-out effect
                    }
                });
            });
        </script>
    @endpush
@endsection

