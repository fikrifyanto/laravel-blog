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

        $latestPost = Post::latest('date')->first();

        return Inertia::render('Home/Index', ['topCategories' => $topCategories, 'latestPost' => $latestPost]);
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

        if (!$post) {
            abort(404);
        }

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

    public function all()
    {
        $topCategories = Category::withCount('post')
            ->with(['post' => function ($query) {
                $query->with('user')->with('media')->with('category');
            }])
            ->orderByDesc('post_count')
            ->take(3)
            ->get();

        $posts = Post::with('user')->with('category')->paginate(9);

        return Inertia::render('Home/All', [
            'topCategories' => $topCategories,
            'posts' => $posts,
        ]);
    }
}
