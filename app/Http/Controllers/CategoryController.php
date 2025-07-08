<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CategoryCreatedNotification;
use App\Notifications\CategoryUpdatedNotification;
use App\Notifications\CategoryDeletedNotification;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->paginate(10)->withQueryString();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'is_publish' => 'required|boolean',
        ]);

        $category = Category::create($validated);

        $users = User::all();
        Notification::send($users, new CategoryCreatedNotification($category));

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'is_publish' => 'required|boolean',
        ]);

        $category->update($validated);

        $users = User::all();
        Notification::send($users, new CategoryUpdatedNotification($category));

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        $users = User::all();
        Notification::send($users, new CategoryDeletedNotification($category));

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
