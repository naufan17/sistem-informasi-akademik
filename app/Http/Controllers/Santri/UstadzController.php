<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UstadzController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ustadzs = User::where('role', 'ustadz')->get();

        return view('santri.ustadz', compact('ustadzs'));
    }

    public function filter(Request $request)
    {
        $ustadzs = User::where('role', 'ustadz')->where('status', $request->status)->get();

        return view('santri.ustadz', compact('ustadzs'));
    }
}
