<?php

namespace App\Http\Controllers;

use App\Models\Loader;
use App\Models\LoaderBreaking;
use Illuminate\Http\Request;

class LoaderController extends Controller
{
    public function show()
    {
        $loaders = Loader::with('user')->get();
        return inertia('Home/LoaderBreakingPage', compact('loaders'));
    }
    public function search(Request $request)
    {
        $search = $request->input('model');
        $loaders = Loader::query()
            ->where('RegNumber', 'like', "%{$search}%")
            ->with('user')
            ->get();

        $ids = $loaders->pluck('id');
        $loadingsBreaking = LoaderBreaking::whereIn('LoaderId', $ids)->get();

        return inertia('Home/LoaderBreakingPage', compact('loaders','loadingsBreaking'));
    }


}
