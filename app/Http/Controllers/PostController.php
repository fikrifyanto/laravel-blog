<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->with('user')->paginate(6);
        return Inertia::render('Admin/Post/Index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return Inertia::render('Admin/Post/Add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->input();
        $post['user_id'] = auth()->user()->id;
        $post['slug'] = Str::slug($post['title'], '-');

        if ($request->file()) {
            $file = $request->file('featured_image');
            $filePath = $file->store('uploads', 'public');

            $media = Media::create([
                'path' => $filePath,
                'url' => url('storage/' . $filePath),
                'name' => $post['title'] . ' Image',
            ]);

            $post['media_id'] = $media->id;
        }

        Post::create($post);

        return redirect()->intended('admin/post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('media')->find($id);
        $categories = Category::all();

        return Inertia::render('Admin/Post/Edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = $request->input();
        $post['user_id'] = auth()->user()->id;
        $post['slug'] = Str::slug($post['title'], '-');

        if ($request->file()) {
            $file = $request->file('featured_image');
            $filePath = $file->store('uploads', 'public');

            $media = Media::create([
                'path' => $filePath,
                'url' => url('storage/' . $filePath),
                'name' => $post['title'] . ' Image',
            ]);

            $post['media_id'] = $media->id;
        }

        Post::find($id)->update($post);

        return redirect()->intended('admin/post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
    }
}
