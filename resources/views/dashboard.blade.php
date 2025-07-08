@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Kategori Terdaftar</h5>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Add Category</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Publish</th>
            </tr>
        </thead>
        <tbody>
            @foreach(\App\Models\Category::latest()->take(10)->get() as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->is_publish)
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
