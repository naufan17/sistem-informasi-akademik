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
        $totalNilai_1 = 0;
        
        foreach(CumulativeStudy::where('id_santri', $id)->where('semester', 'Ganjil')->get() as $score){
            $totalMataPelajaran_1 = CumulativeStudy::where('id_santri', $id)->where('semester', 'Ganjil')->count();
            $totalNilai_1 = $totalNilai_1 + $score->score;

            $scores_1 = array('total_nilai'=>$totalNilai_1, 'tahun'=>$score->year, 'semester'=>$score->semester, 'total_mp'=>$totalMataPelajaran_1);
        }

        $totalNilai_2 = 0;
        foreach(CumulativeStudy::where('id_santri', $id)->where('semester', 'Genap')->get() as $score){
            $totalMataPelajaran_2 = CumulativeStudy::where('id_santri', $id)->where('semester', 'Genap')->count();
            $totalNilai_2 = $totalNilai_2 + $score->score;

            $scores_2 = array('total_nilai'=>$totalNilai_2, 'tahun'=>$score->year, 'semester'=>$score->semester, 'total_mp'=>$totalMataPelajaran_2);
        }

        return view('santri.riwayat-nilai', compact('scores_1', 'scores_2'));
    }
}
