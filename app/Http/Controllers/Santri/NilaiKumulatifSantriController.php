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
            $tahunAkademik = $score->year;
            $semester = $score->semester;
        }

        $totalMataPelajaran = CumulativeStudy::where('id_santri', $id)->count();

        $rataRata = $totalNilai/$totalMataPelajaran;

        $attendances = Attendance::where('id_santri', $id)->get();

        // $keterangan = 'Tidak Naik Kelas';
        foreach(Attendance::where('id_santri', $id)->get() as $score){
            if($score->attendance_mdnu <= 15 && $score->attendance_asrama <= 10){
                $keterangan = 'Naik Kelas';
            }else{
                $keterangan = 'Tidak Naik Kelas';
            } 
        }

        foreach(CumulativeStudy::where('id_santri', $id)->get() as $score){
            if($score->score >= 59 && $keterangan == 'Naik Kelas'){
                $keterangan = 'Naik Kelas';
            }else{
                $keterangan = 'Tidak Naik Kelas';
            } 
        }

        return view('santri.nilai-kumulatif', compact('totalNilai', 'rataRata', 'attendances', 'keterangan', 'tahunAkademik', 'semester'));
    }
}
