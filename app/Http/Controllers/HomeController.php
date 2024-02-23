<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Index');
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
