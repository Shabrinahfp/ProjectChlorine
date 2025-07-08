@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Publish?</label>
            <select name="is_publish" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
@endsection
