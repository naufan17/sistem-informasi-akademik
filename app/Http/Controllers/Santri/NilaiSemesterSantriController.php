<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CumulativeStudy;
use PDF;

class NilaiSemesterSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        if(date('m') <= 06 ){
            $scores = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                    ->where('id_santri', $id)
                                    ->where('semester', 'Genap')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->orderBy('sem')
                                    ->get();
    
        }elseif(date('m') > 06 ){
            $scores = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                    ->where('id_santri', $id)
                                    ->where('semester', 'Ganjil')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->orderBy('sem')
                                    ->get();
        }
    
        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', $id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $id)
                                        ->distinct()
                                        ->get();

        return view('santri.nilai-semester', compact('scores', 'filter_semesters', 'filter_years'));
    }

    public function filterNilaiSemester(Request $request)
    {
        $scores = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                ->where('id_santri', $request->id)
                                ->where('semester', $request->semester)
                                ->where('year', $request->year)
                                ->orderBy('sem')
                                ->get();

        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', $request->id)
                                            ->where('semester', $request->semester)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $request->id)
                                        ->where('year', $request->year)
                                        ->distinct()
                                        ->get();

        return view('santri.nilai-semester', compact('scores', 'filter_semesters', 'filter_years'));
    }

    public function cetakNilaiSemester($id)
    {
        $scores = CumulativeStudy::leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                ->where('id_santri', $id)
                                ->orderBy('semester')
                                ->get();

        $pdf = PDF::loadview('santri.cetak-nilai-semester', compact('scores'));

        return $pdf->stream();
    }
}
