<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CumulativeStudy;
use PDF;

class RiwayatNilaiSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {        
        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', $id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $id)
                                        ->distinct()
                                        ->get();

        // $filters = CumulativeStudy::select('semester', 'year')
        //                             ->where('id_santri', $id)
        //                             ->distinct()
        //                             ->get();

        // foreach($filters as $filter){
        //     $totalMataPelajaran = CumulativeStudy::where('id_santri', $id)
        //                                         ->where('semester', $filter->semester)
        //                                         ->where('year', $filter->year)
        //                                         ->count();

        //     $totalNilai = CumulativeStudy::where('id_santri', $id)
        //                                 ->where('semester', $filter->semester)
        //                                 ->where('year', $filter->year)
        //                                 ->sum('score');
    
        //     $scores = array('total_nilai'=>$totalNilai, 'semester'=>$filter->semester, 'year'=>$filter->year, 'total_mp'=>$totalMataPelajaran);
        // }

        // return view('santri.riwayat-nilai', compact('scores', 'filter_semesters', 'filter_years'));

        return view('santri.riwayat-nilai', compact('filter_semesters', 'filter_years'));

    }

    public function filterRiwayatNilai(Request $request)
    {
        $scores = 0;
        
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
            $totalMataPelajaran = CumulativeStudy::where('id_santri', $request->id)
                                                ->where('semester', $filter->semester)
                                                ->where('year', $filter->year)
                                                ->count();

            $totalNilai = CumulativeStudy::where('id_santri', $request->id)
                                        ->where('semester', $filter->semester)
                                        ->where('year', $filter->year)
                                        ->sum('score');
    
            $scores = array('total_nilai'=>$totalNilai, 'semester'=>$filter->semester, 'year'=>$filter->year, 'total_mp'=>$totalMataPelajaran);
        }

        return view('santri.riwayat-nilai-filter', compact('scores', 'filter_semesters', 'filter_years'));
    }

    public function cetakRiwayatNilai(Request $request)
    {
        $filters = CumulativeStudy::select('semester', 'year')
                                    ->where('id_santri', $request->id)
                                    ->where('semester', $request->semester)
                                    ->where('year', $request->year)
                                    ->distinct()
                                    ->get();

        foreach($filters as $filter){
            $totalMataPelajaran = CumulativeStudy::where('id_santri', $request->id)
                                                ->where('semester', $filter->semester)
                                                ->where('year', $filter->year)
                                                ->count();

            $totalNilai = CumulativeStudy::where('id_santri', $request->id)
                                        ->where('semester', $filter->semester)
                                        ->where('year', $filter->year)
                                        ->sum('score');
    
            $scores = array('total_nilai'=>$totalNilai, 'semester'=>$filter->semester, 'year'=>$filter->year, 'total_mp'=>$totalMataPelajaran);
        }
        
        $pdf = PDF::loadview('santri.cetak-riwayat-nilai', compact('scores'));

        return $pdf->stream();
    }
}
