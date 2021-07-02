<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class SantriSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $santris = User::where('role', 'santri')->get();

        return view('santri.santri', compact('santris'));
    }

    public function filter(Request $request)
    {
        $santris = User::where('role', 'santri')->where('status', $request->status)->get();
        
        return view('santri.santri', compact('santris'));
    }
}
