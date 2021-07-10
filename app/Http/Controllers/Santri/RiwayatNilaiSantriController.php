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
        $totalNilai = 0;
        foreach(CumulativeStudy::where('id_santri', $id)->get() as $score){
            $totalNilai = $totalNilai + $score->score;
            $tahunAkademik = $score->year;
            $semester = $score->semester;
        }

        $totalMataPelajaran = CumulativeStudy::where('id_santri', $id)->count();

        return view('santri.riwayat-nilai', compact('totalNilai', 'totalMataPelajaran', 'tahunAkademik', 'semester'));
    }
}
