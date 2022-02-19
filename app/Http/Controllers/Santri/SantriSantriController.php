<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Santri;

class SantriSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $santris = Santri::where('status', 'Aktif')
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = Santri::select('status')
                            ->distinct()
                            ->get();

        $status = Santri::select('status')
                        ->where('status', 'Aktif')
                        ->distinct()
                        ->get();

        return view('santri.santri', compact('santris', 'filter_status', 'status'));
    }

    public function filter(Request $request)
    {
        $santris = Santri::where('status', $request->status)
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = Santri::select('status')
                            ->distinct()
                            ->get();
    
        $status = Santri::select('status')
                    ->where('status', $request->status)
                    ->distinct()
                    ->get();
        
        return view('santri.santri', compact('santris', 'filter_status', 'status'));
    }
}
