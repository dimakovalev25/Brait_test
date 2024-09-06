<?php

namespace App\Http\Controllers;

use App\Models\Loader;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $loaders = Loader::all()->with('users');

        return inertia('Home/Main', compact('loaders'));
    }
}
