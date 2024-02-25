<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $topCategories = Category::withCount('post')
            ->with(['post' => function ($query) {
                $query->with('user')->with('media')->with('category');
            }])
            ->orderByDesc('post_count')
            ->take(3)
            ->get();

        return Inertia::render('Home/Index', ['topCategories' => $topCategories]);
    }

    public function category(Category $category)
    {
        $topCategories = Category::withCount('post')
            ->with(['post' => function ($query) {
                $query->with('user')->with('media')->with('category');
            }])
            ->orderByDesc('post_count')
            ->take(3)
            ->get();

        $posts = Post::where('category_id', $category->id)
            ->with('user')
            ->paginate(9);

        return Inertia::render('Home/Category', [
            'posts' => $posts,
            'category' => $category,
            'topCategories' => $topCategories
        ]);
    }

    public function post(string $slug)
    {
        $post = Post::whereSlug($slug)->with('media')->with('category')->first();

        $related = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->with('category')
            ->with('media')
            ->with('user')
            ->take(3)
            ->get();

        $topCategories = Category::withCount('post')
            ->with(['post' => function ($query) {
                $query->with('user')->with('media')->with('category');
            }])
            ->orderByDesc('post_count')
            ->take(3)
            ->get();

        return Inertia::render('Home/Post', [
            'topCategories' => $topCategories,
            'post' => $post,
            'related' => $related
        ]);
    }
}
