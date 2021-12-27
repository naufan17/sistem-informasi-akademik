<?php

namespace App\Http\Controllers\Ustadz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class SantriUstadzController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $santris = User::where('role', 'santri')
                        ->get();

        return view('ustadz.santri', compact('santris'));
    }

    public function filter(Request $request)
    {
        $santris = User::where('role', 'santri')
                        ->where('status', $request->status)
                        ->get();
        
        return view('ustadz.santri', compact('santris'));
    }
}
