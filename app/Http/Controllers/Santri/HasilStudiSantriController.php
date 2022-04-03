<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CumulativeStudy;
use App\Models\Attendance;
use PDF;

class HasilStudiSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $attendance_mdnu = 0;
        $attendance_asrama = 0;
        $keterangan = '';
        $scores = 0;

        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', Auth::guard('santri')->user()->id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', Auth::guard('santri')->user()->id)
                                        ->distinct()
                                        ->get();

        if(date('m') <= 06 ){
            $filters = CumulativeStudy::select('semester', 'year')
                                        ->where('id_santri', Auth::guard('santri')->user()->id)
                                        ->where('semester', 'Genap')
                                        ->where('year', date('Y')-1 . '/' . date('Y'))
                                        ->distinct()
                                        ->get();

            foreach($filters as $filter){
                $totalNilai = CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)
                                            ->where('semester', 'Genap')
                                            ->where('year', date('Y')-1 . '/' . date('Y'))
                                            ->sum('score');

                $rataNilai = CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)
                                            ->where('semester', 'Genap')
                                            ->where('year', date('Y')-1 . '/' . date('Y'))
                                            ->avg('score');

                foreach(Attendance::where('id_santri', Auth::guard('santri')->user()->id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                    $attendance_mdnu = $score->attendance_mdnu;
                    $attendance_asrama = $score->attendance_asrama;
                    if($score->attendance_mdnu <= 15 && $score->attendance_asrama <= 10){
                        $keterangan = 'Naik Kelas';
                    }else{
                        $keterangan = 'Tidak Naik Kelas';
                    }
                }

                foreach(CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                    if($score->score > 59 && $keterangan == 'Naik Kelas'){
                        $keterangan = 'Naik Kelas';
                    }else{
                        $keterangan = 'Tidak Naik Kelas';
                    } 
                }

                $scores = array('total_nilai'=>$totalNilai, 'semester'=>$filter->semester, 'year'=>$filter->year, 'nilai_rata'=>$rataNilai, 'attendance_mdnu'=>$attendance_mdnu, 'attendance_asrama'=>$attendance_asrama, 'keterangan'=>$keterangan);
            }

        }elseif(date('m') > 06 ){
            $filters = CumulativeStudy::select('semester', 'year')
                                    ->where('id_santri', Auth::guard('santri')->user()->id)
                                    ->where('semester', 'Ganjil')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->distinct()
                                    ->get();

            foreach($filters as $filter){
                $totalNilai = CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)
                                            ->where('semester', 'Ganjil')
                                            ->where('year', date('Y') . '/' . date('Y')+1)
                                            ->sum('score');

                $rataNilai = CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)
                                            ->where('semester', 'Ganjil')
                                            ->where('year', date('Y') . '/' . date('Y')+1)
                                            ->avg('score');

                foreach(Attendance::where('id_santri', Auth::guard('santri')->user()->id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                    $attendance_mdnu = $score->attendance_mdnu;
                    $attendance_asrama = $score->attendance_asrama;
                    if($score->attendance_mdnu <= 15 && $score->attendance_asrama <= 10){
                        $keterangan = 'Naik Kelas';
                    }else{
                        $keterangan = 'Tidak Naik Kelas';
                    }
                }

                foreach(CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                    if($score->score > 59 && $keterangan == 'Naik Kelas'){
                        $keterangan = 'Naik Kelas';
                    }else{
                        $keterangan = 'Tidak Naik Kelas';
                    } 
                }

                $scores = array('total_nilai'=>$totalNilai, 'semester'=>$filter->semester, 'year'=>$filter->year, 'nilai_rata'=>$rataNilai, 'attendance_mdnu'=>$attendance_mdnu, 'attendance_asrama'=>$attendance_asrama, 'keterangan'=>$keterangan);
            }
        }

        return view('santri.hasil-studi', compact('scores', 'filter_semesters', 'filter_years'));
    }

    public function filterHasilStudi(Request $request)
    {
        $attendance_mdnu = 0;
        $attendance_asrama = 0;
        $keterangan = '';
        $scores = 0;

        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_santri', Auth::guard('santri')->user()->id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', Auth::guard('santri')->user()->id)
                                        ->distinct()
                                        ->get();

        $filters = CumulativeStudy::select('semester', 'year')
                                    ->where('semester', $request->semester)
                                    ->where('year', $request->year)
                                    ->where('id_santri', Auth::guard('santri')->user()->id)
                                    ->distinct()
                                    ->get();

        foreach($filters as $filter){
            $totalNilai = CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)
                                        ->where('semester', $filter->semester)
                                        ->where('year', $filter->year)
                                        ->sum('score');

            $rataNilai = CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)
                                        ->where('semester', $filter->semester)
                                        ->where('year', $filter->year)
                                        ->avg('score');

            foreach(Attendance::where('id_santri', Auth::guard('santri')->user()->id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                $attendance_mdnu = $score->attendance_mdnu;
                $attendance_asrama = $score->attendance_asrama;
                if($score->attendance_mdnu <= 15 && $score->attendance_asrama <= 10){
                    $keterangan = 'Naik Kelas';
                }else{
                    $keterangan = 'Tidak Naik Kelas';
                }
            }

            foreach(CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                if($score->score > 59 && $keterangan == 'Naik Kelas'){
                    $keterangan = 'Naik Kelas';
                }else{
                    $keterangan = 'Tidak Naik Kelas';
                } 
            }
    
            $scores = array('total_nilai'=>$totalNilai, 'semester'=>$filter->semester, 'year'=>$filter->year, 'nilai_rata'=>$rataNilai, 'attendance_mdnu'=>$attendance_mdnu, 'attendance_asrama'=>$attendance_asrama, 'keterangan'=>$keterangan);
        }
        
        return view('santri.hasil-studi', compact('scores', 'filter_semesters', 'filter_years'));
    }

    public function cetakHasilStudi(Request $request)
    {
        $attendance_mdnu = 0;
        $attendance_asrama = 0;
        $keterangan = '';
        $scores = 0;

        $filters = CumulativeStudy::select('semester', 'year')
                                    ->where('semester', $request->semester)
                                    ->where('year', $request->year)
                                    ->where('id_santri', Auth::guard('santri')->user()->id)
                                    ->distinct()
                                    ->get();

        foreach($filters as $filter){
            $totalNilai = CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)
                                        ->where('semester', $filter->semester)
                                        ->where('year', $filter->year)
                                        ->sum('score');

            $rataNilai = CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)
                                        ->where('semester', $filter->semester)
                                        ->where('year', $filter->year)
                                        ->avg('score');

            foreach(Attendance::where('id_santri', Auth::guard('santri')->user()->id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                $attendance_mdnu = $score->attendance_mdnu;
                $attendance_asrama = $score->attendance_asrama;
                if($score->attendance_mdnu <= 15 && $score->attendance_asrama <= 10){
                    $keterangan = 'Naik Kelas';
                }else{
                    $keterangan = 'Tidak Naik Kelas';
                }
            }

            foreach(CumulativeStudy::where('id_santri', Auth::guard('santri')->user()->id)->where('semester', $filter->semester)->where('year', $filter->year)->get() as $score){
                if($score->score > 59 && $keterangan == 'Naik Kelas'){
                    $keterangan = 'Naik Kelas';
                }else{
                    $keterangan = 'Tidak Naik Kelas';
                } 
            }
    
            $scores = array('total_nilai'=>$totalNilai, 'semester'=>$filter->semester, 'year'=>$filter->year, 'nilai_rata'=>$rataNilai, 'attendance_mdnu'=>$attendance_mdnu, 'attendance_asrama'=>$attendance_asrama, 'keterangan'=>$keterangan);
        }

        $pdf = PDF::loadview('santri.cetak-hasil-studi', compact('scores'));

        return $pdf->stream();
    }
}
