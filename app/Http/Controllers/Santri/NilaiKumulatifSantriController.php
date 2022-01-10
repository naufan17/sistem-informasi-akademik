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
        $totalNilai_1 = 0;
        $totalNilai_2 = 0;
        $tahunAkademik_1 = 0;
        $tahunAkademik_2 = 0;
        $semester_1 = 0;
        $semester_2 = 0;
        $totalMataPelajaran_1 = 0;
        $totalMataPelajaran_2 = 0;
        $rataRata_1 = 0;
        $rataRata_2 = 0;
        $attendance_mdnu_1 = 0;
        $attendance_mdnu_2 = 0;
        $attendance_asrama_1 = 0;
        $attendance_asrama_2 = 0;
        
        foreach(CumulativeStudy::where('id_santri', $id)->where('semester', 'Ganjil')->get() as $score){
            $totalNilai_1 = $totalNilai_1 + $score->score;
            $tahunAkademik_1 = $score->year;
            $semester_1 = $score->semester;
        }

        $totalNilai_2 = 0;
        foreach(CumulativeStudy::where('id_santri', $id)->where('semester', 'Genap')->get() as $score){
            $totalNilai_2 = $totalNilai_2 + $score->score;
            $tahunAkademik_2 = $score->year;
            $semester_2 = $score->semester;
        }

        $totalMataPelajaran_1 = CumulativeStudy::where('id_santri', $id)->where('semester', 'Ganjil')->count();
        $rataRata_1 = $totalNilai_1/$totalMataPelajaran_1;

        $totalMataPelajaran_2 = CumulativeStudy::where('id_santri', $id)->where('semester', 'Genap')->count();
        $rataRata_2 = $totalNilai_2/$totalMataPelajaran_2;

        foreach(Attendance::where('id_santri', $id)->where('semester', 'Ganjil')->get() as $score){
            $attendance_mdnu_1 = $score->attendance_mdnu;
            $attendance_asrama_1 = $score->attendance_asrama;
            if($score->attendance_mdnu <= 15 && $score->attendance_asrama <= 10){
                $keterangan_1 = 'Naik Kelas';
            }else{
                $keterangan_1 = 'Tidak Naik Kelas';
            } 
        }

        foreach(Attendance::where('id_santri', $id)->where('semester', 'Genap')->get() as $score){
            $attendance_mdnu_2 = $score->attendance_mdnu;
            $attendance_asrama_2 = $score->attendance_asrama;
            if($score->attendance_mdnu <= 15 && $score->attendance_asrama <= 10){
                $keterangan_1 = 'Naik Kelas';
            }else{
                $keterangan_1 = 'Tidak Naik Kelas';
            } 
        }

        foreach(CumulativeStudy::where('id_santri', $id)->where('semester', 'Ganjil')->get() as $score){
            if($score->score >= 59 && $keterangan_1 == 'Naik Kelas'){
                $keterangan_2 = 'Naik Kelas';
            }else{
                $keterangan_2 = 'Tidak Naik Kelas';
            } 
        }

        foreach(CumulativeStudy::where('id_santri', $id)->where('semester', 'Genap')->get() as $score){
            if($score->score >= 59 && $keterangan_2 == 'Naik Kelas'){
                $keterangan_2 = 'Naik Kelas';
            }else{
                $keterangan_2 = 'Tidak Naik Kelas';
            } 
        }

        $scores_1 = array('total_nilai'=>$totalNilai_1, 'tahun'=>$tahunAkademik_1, 'semester'=>$semester_1, 'total_mp'=>$totalMataPelajaran_1, 'nilai_rata'=>$rataRata_1, 'attendance_mdnu'=>$attendance_mdnu_1, 'attendance_asrama'=>$attendance_asrama_1, 'keterangan'=>$keterangan_1);
        $scores_2 = array('total_nilai'=>$totalNilai_2, 'tahun'=>$tahunAkademik_2, 'semester'=>$semester_2, 'total_mp'=>$totalMataPelajaran_2, 'nilai_rata'=>$rataRata_2, 'attendance_mdnu'=>$attendance_mdnu_2, 'attendance_asrama'=>$attendance_asrama_2, 'keterangan'=>$keterangan_2);

        return view('santri.nilai-kumulatif', compact('scores_1', 'scores_2'));
    }
}
