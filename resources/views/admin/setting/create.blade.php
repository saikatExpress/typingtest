@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-left text-primary mb-4">Add Setting</h2>
            <form action="{{ url('setting.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label d-block">Test : </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="visibility" id="private" value="private">
                        <label class="form-check-label" for="private">Private</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="visibility" id="public" value="public">
                        <label class="form-check-label" for="public">Public</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Update Setting</button>
            </form>
        </div>
    </div>
@endsection
