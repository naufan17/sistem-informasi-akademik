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
        $santris = User::where('role', 'santri')
                        ->where('status', 'Aktif')
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = User::select('status')
                            ->where('role', 'santri')
                            ->distinct()
                            ->get();

        $status = User::select('status')
                        ->where('role', 'santri')
                        ->where('status', 'Aktif')
                        ->distinct()
                        ->get();

        return view('santri.santri', compact('santris', 'filter_status', 'status'));
    }

    public function filter(Request $request)
    {
        $santris = User::where('role', 'santri')
                        ->where('status', $request->status)
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = User::select('status')
                            ->where('role', 'santri')
                            ->distinct()
                            ->get();
    
        $status = User::select('status')
                    ->where('role', 'santri')
                    ->where('status', $request->status)
                    ->distinct()
                    ->get();
        
        return view('santri.santri', compact('santris', 'filter_status', 'status'));
    }
}
