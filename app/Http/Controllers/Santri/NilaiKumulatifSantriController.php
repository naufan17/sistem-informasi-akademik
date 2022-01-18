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
        $attendance_mdnu = 0;
        $attendance_asrama = 0;
        $keterangan = '';

        $filter_semesters = CumulativeStudy::select('semester', 'year')
                                            ->where('id_santri', $id)
                                            ->distinct()
                                            ->get();

        foreach($filter_semesters as $filter){
            $totalNilai = CumulativeStudy::where('id_santri', $id)
                                            ->where('semester', $filter->semester)
                                            ->where('year', $filter->year)
                                            ->sum('score');

            $rataNilai = CumulativeStudy::where('id_santri', $id)
                                            ->where('semester', $filter->semester)
                                            ->where('year', $filter->year)
                                            ->avg('score');

            foreach(Attendance::where('id_santri', $id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                $attendance_mdnu = $score->attendance_mdnu;
                $attendance_asrama = $score->attendance_asrama;
                if($score->attendance_mdnu <= 15 && $score->attendance_asrama <= 10){
                    $keterangan = 'Naik Kelas';
                }else{
                    $keterangan = 'Tidak Naik Kelas';
                }
            }

            foreach(CumulativeStudy::where('id_santri', $id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                if($score->score > 59 && $keterangan == 'Naik Kelas'){
                    $keterangan = 'Naik Kelas';
                }else{
                    $keterangan = 'Tidak Naik Kelas';
                } 
            }
    
            $scores_1 = array('total_nilai'=>$totalNilai, 'semester'=>$filter->semester, 'year'=>$filter->year, 'nilai_rata'=>$rataNilai, 'attendance_mdnu'=>$attendance_mdnu, 'attendance_asrama'=>$attendance_asrama, 'keterangan'=>$keterangan);
        }
        
        return view('santri.nilai-kumulatif', compact('scores_1'));
    }
}
