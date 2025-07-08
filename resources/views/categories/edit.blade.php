@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label>Publish?</label>
            <select name="is_publish" class="form-control">
                <option value="1" {{ $category->is_publish ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$category->is_publish ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
