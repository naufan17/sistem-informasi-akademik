<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Score;
use App\Models\User;

class RiwayatNilaiSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        // $scores = Score::leftjoin('users', 'scores.id_santri', '=', 'users.id')->where('id', $id)
        //                 ->leftjoin('courses', 'scores.id_course', '=', 'courses.id_course')->where('id', $id)->get();
        
        // $totalNilai = 0;
        // foreach(Score::leftjoin('users', 'scores.id_santri', '=', 'users.id')->where('id', $id) as $courses){
        //     $totaNilai = $totalNilai + $courses->total;
        // }

        // $totalMataPelajaran = Score::where('id_santri', $id)->count();

        return view('santri.riwayat-nilai', compact('totalMataPelajaran'));
    }
}
