<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CumulativeStudy;
use App\Models\Score;
use PDF;

class NilaiSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $scores = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                ->where('id_santri', $id)
                                ->orderBy('semester')
                                ->get();

        return view('santri.nilai', compact('scores'));
    }

    public function filterNilai(Request $request)
    {
        $scores = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                ->where('id_santri', $request->id)
                                ->where('semester', $request->semester)
                                ->where('year', $request->tahun_ajaran)
                                ->orderBy('semester')
                                ->get();

        return view('santri.nilai', compact('scores'));
    }

    public function cetakNilai($id)
    {
        $scores = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                ->where('id_santri', $id)
                                ->orderBy('semester')
                                ->get();

        $pdf = PDF::loadview('santri.cetak-nilai', compact('scores'));

        return $pdf->stream();
    }
}
