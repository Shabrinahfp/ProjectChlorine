@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Add Category</a>

    <form method="GET" class="mb-3">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control w-50 d-inline-block" placeholder="Search category...">
        <button class="btn btn-secondary">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->is_publish ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">No categories found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
