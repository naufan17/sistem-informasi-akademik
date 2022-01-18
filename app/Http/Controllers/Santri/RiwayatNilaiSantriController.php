<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CumulativeStudy;

class RiwayatNilaiSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {        
        // $totalNilai_1 = 0;
        
        // foreach(CumulativeStudy::where('id_santri', $id)->where('semester', 'Ganjil')->get() as $score){
        //     $totalMataPelajaran_1 = CumulativeStudy::where('id_santri', $id)->where('semester', 'Ganjil')->count();
        //     $totalNilai_1 = $totalNilai_1 + $score->score;

        //     $scores_1 = array('total_nilai'=>$totalNilai_1, 'tahun'=>$score->year, 'semester'=>$score->semester, 'total_mp'=>$totalMataPelajaran_1);
        // }

        // $totalNilai_2 = 0;
        // foreach(CumulativeStudy::where('id_santri', $id)->where('semester', 'Genap')->get() as $score){
        //     $totalMataPelajaran_2 = CumulativeStudy::where('id_santri', $id)->where('semester', 'Genap')->count();
        //     $totalNilai_2 = $totalNilai_2 + $score->score;

        //     $scores_2 = array('total_nilai'=>$totalNilai_2, 'tahun'=>$score->year, 'semester'=>$score->semester, 'total_mp'=>$totalMataPelajaran_2);
        // }

        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', $id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $id)
                                        ->distinct()
                                        ->get();

        $filters = CumulativeStudy::select('semester', 'year')
                                            ->where('id_santri', $id)
                                            ->distinct()
                                            ->get();

        foreach($filters as $filter){
            $totalMataPelajaran_1 = CumulativeStudy::where('id_santri', $id)
                                                    ->where('semester', $filter->semester)
                                                    ->where('year', $filter->year)
                                                    ->count();

            $totalNilai_1 = CumulativeStudy::where('id_santri', $id)
                                            ->where('semester', $filter->semester)
                                            ->where('year', $filter->year)
                                            ->sum('score');
    
            $scores_1 = array('total_nilai'=>$totalNilai_1, 'semester'=>$filter->semester, 'year'=>$filter->year, 'total_mp'=>$totalMataPelajaran_1);
        }

        return view('santri.riwayat-nilai', compact('scores_1', 'filter_semesters', 'filter_years'));
    }

    public function filterRiwayatNilai(Request $request)
    {
        $scores_1 = 0;
        
        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', $request->id)
                                            ->where('semester', $request->semester)
                                            ->where('year', $request->year)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $request->id)
                                        ->where('semester', $request->semester)
                                        ->where('year', $request->year)
                                        ->distinct()
                                        ->get();

        $filters = CumulativeStudy::select('semester', 'year')
                                    ->where('id_santri', $request->id)
                                    ->where('semester', $request->semester)
                                    ->where('year', $request->year)
                                    ->distinct()
                                    ->get();

        foreach($filters as $filter){
            $totalMataPelajaran_1 = CumulativeStudy::where('id_santri', $request->id)
                                                    ->where('semester', $filter->semester)
                                                    ->where('year', $filter->year)
                                                    ->count();

            $totalNilai_1 = CumulativeStudy::where('id_santri', $request->id)
                                            ->where('semester', $filter->semester)
                                            ->where('year', $filter->year)
                                            ->sum('score');
    
            $scores_1 = array('total_nilai'=>$totalNilai_1, 'semester'=>$filter->semester, 'year'=>$filter->year, 'total_mp'=>$totalMataPelajaran_1);
        }

        return view('santri.riwayat-nilai', compact('scores_1', 'filter_semesters', 'filter_years'));
    }
}
