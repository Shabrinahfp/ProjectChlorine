<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CategoryCreatedNotification;
use App\Notifications\CategoryDeletedNotification;

class CategoryApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->paginate(10)->withQueryString());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_publish' => 'required|boolean',
        ]);

        $category = Category::create($request->all());

        Notification::send(User::all(), new CategoryCreatedNotification($category));

        return response()->json($category, 201);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_publish' => 'required|boolean',
        ]);

        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        Notification::send(User::all(), new CategoryDeletedNotification($category));

        $category->delete();

        return response()->json(['message' => 'Category deleted']);
    }
}
