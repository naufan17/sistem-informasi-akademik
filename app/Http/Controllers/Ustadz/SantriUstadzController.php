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
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = User::select('status')
                        ->where('role', 'santri')
                        ->distinct()
                        ->get();

        return view('ustadz.santri', compact('santris', 'filter_status'));
    }

    public function filter(Request $request)
    {
        $santris = User::where('role', 'santri')
                        ->where('status', $request->status)
                        ->orderBy('id')
                        ->paginate(50);
        
        $filter_status = User::select('status')
                        ->where('role', 'santri')
                        ->where('status', $request->status)
                        ->distinct()
                        ->get();
        
        return view('ustadz.santri', compact('santris', 'filter_status'));
    }
}
