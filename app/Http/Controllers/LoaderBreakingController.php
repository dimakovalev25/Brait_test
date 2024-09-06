<?php

namespace App\Http\Controllers;

use App\Models\Loader;
use App\Models\LoaderBreaking;
use App\Models\User;
use Illuminate\Http\Request;

class LoaderBreakingController extends Controller
{
    public function show(Loader $loader)
    {
        $users = User::all();
        $loadingsBreaking = LoaderBreaking::where('LoaderId', '=', $loader->id)->get();
        $loaders = Loader::with('user')->get();

        return inertia('Home/LoaderBreakingPage', compact('loaders', 'loadingsBreaking', 'users'));

    }

    public function search(Request $request)
    {
        $users = User::all();
        $search = $request->input('model');
        $loaders = Loader::query()
            ->where('RegNumber', 'like', "%{$search}%")
            ->with('user')
            ->get();

        $ids = $loaders->pluck('id');
        $loadingsBreaking = LoaderBreaking::whereIn('LoaderId', $ids)->get();

        return inertia('Home/LoaderBreakingPage', compact('loaders', 'loadingsBreaking', 'users' ));
    }

    public function store(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $loader = new Loader($data);
        $loader->save();

        return redirect()->route('loaders.show');

    }
}
