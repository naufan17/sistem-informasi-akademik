<?php

namespace App\Http\Controllers\Ustadz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UstadzUstadzController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ustadzs = User::where('role', 'ustadz')
                        ->where('status', 'Aktif')
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = User::select('status')
                            ->where('role', 'ustadz')
                            ->distinct()
                            ->get();

        $status = User::select('status')
                    ->where('role', 'ustadz')
                    ->where('status', 'Aktif')
                    ->distinct()
                    ->get();


        return view('ustadz.ustadz', compact('ustadzs', 'filter_status', 'status'));
    }

    public function filter(Request $request)
    {
        $ustadzs = User::where('role', 'ustadz')
                        ->where('status', $request->status)
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = User::select('status')
                            ->where('role', 'ustadz')
                            ->distinct()
                            ->get();

        $status = User::select('status')
                    ->where('role', 'ustadz')
                    ->where('status', $request->status)
                    ->distinct()
                    ->get();

        return view('ustadz.ustadz', compact('ustadzs', 'filter_status', 'status'));
    }
}
