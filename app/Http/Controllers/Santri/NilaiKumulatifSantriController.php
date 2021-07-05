<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CumulativeStudy;
use App\Models\Attendance;

class NilaiKumulatifSantriController extends Controller
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
        }

        $totalMataPelajaran = CumulativeStudy::where('id_santri', $id)->count();

        $rataRata = $totalNilai/$totalMataPelajaran;

        $attendances = Attendance::where('id_santri', $id)->get();

        return view('santri.nilai-kumulatif', compact('totalNilai', 'rataRata', 'attendances'));
    }
}
