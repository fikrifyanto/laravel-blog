<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $topCategories = Category::withCount('post')
            ->with(['post' => function ($query) {
                $query->with('user')->with('media');
            }])
            ->orderByDesc('post_count')
            ->take(3)
            ->get();

        return Inertia::render('Home/Index', ['topCategories' => $topCategories]);
    }

    public function category()
    {
        return Inertia::render('Home/Category');
    }

    public function post(string $slug)
    {
        return Inertia::render('Home/Post');
    }
}
