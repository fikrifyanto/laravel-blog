<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(8);

        return Inertia::render('Admin/User/Index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return Inertia::render('Admin/User/Add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->input();

        if ($request->file()) {
            $file = $request->file('profile');
            $filePath = $file->store('uploads', 'public');

            $user['image_path'] = $filePath;
            $user['image_url'] = url('storage/' . $filePath);
        }

        User::create($user);

        return redirect()->intended('admin/user');
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
        $user = User::find($id);

        return Inertia::render('Admin/User/Edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->input();

        if ($request->file()) {
            $file = $request->file('profile');
            $filePath = $file->store('uploads', 'public');

            $user['image_path'] = $filePath;
            $user['image_url'] = url('storage/' . $filePath);
        }

        if (!$user['password']) $user['password'] = User::find($id)->password;

        User::find($id)->update($user);

        return redirect()->intended('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
    }
}
