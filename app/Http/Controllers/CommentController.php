<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('post')->paginate(6);

        return Inertia::render('Admin/Comment/Index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Comment/Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Comment::create($request->input());

        return redirect()->intended('admin/comment');
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
        $comment = Comment::find($id);

        return Inertia::render('Admin/Comment/Edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Comment::find($id)->update($request->input());

        return redirect()->intended('admin/comment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Comment::destroy($id);
    }
}
