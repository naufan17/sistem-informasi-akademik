<?php

namespace App\Http\Controllers\Ustadz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ustadz;

class UstadzUstadzController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ustadzs = Ustadz::where('role', 'ustadz')
                        ->where('status', 'Aktif')
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = Ustadz::select('status')
                            ->where('role', 'ustadz')
                            ->distinct()
                            ->get();

        $status = Ustadz::select('status')
                    ->where('role', 'ustadz')
                    ->where('status', 'Aktif')
                    ->distinct()
                    ->get();


        return view('ustadz.ustadz', compact('ustadzs', 'filter_status', 'status'));
    }

    public function filter(Request $request)
    {
        $ustadzs = Ustadz::where('role', 'ustadz')
                        ->where('status', $request->status)
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = Ustadz::select('status')
                            ->where('role', 'ustadz')
                            ->distinct()
                            ->get();

        $status = Ustadz::select('status')
                    ->where('role', 'ustadz')
                    ->where('status', $request->status)
                    ->distinct()
                    ->get();

        return view('ustadz.ustadz', compact('ustadzs', 'filter_status', 'status'));
    }
}
