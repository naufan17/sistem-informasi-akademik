<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ustadz;

class UstadzSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ustadzs = Ustadz::where('status', 'Aktif')
                        ->paginate(50);

        $filter_status = Ustadz::select('status')
                            ->distinct()
                            ->get();

        $status = Ustadz::select('status')
                    ->where('status', 'Aktif')
                    ->distinct()
                    ->get();

        return view('santri.ustadz', compact('ustadzs', 'filter_status', 'status'));
    }

    public function filter(Request $request)
    {
        $ustadzs = Ustadz::where('status', $request->status)
                        ->paginate(50);

        $filter_status = Ustadz::select('status')
                            ->distinct()
                            ->get();

        $status = Ustadz::select('status')
                    ->where('status', $request->status)
                    ->distinct()
                    ->get();

        return view('santri.ustadz', compact('ustadzs', 'filter_status', 'status'));
    }
}
