<?php

namespace App\Http\Controllers\Ustadz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Course;
use App\Models\CumulativeStudy;
use PDF;

class KelasUstadzController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('id', Auth::guard('ustadz')->user()->id)
                        ->where('status_course', 'Aktif')
                        ->orderBy('grade_name')
                        ->orderBy('grade_number')
                        ->get();

        return view('ustadz.kelas', compact('courses'));
    }

    public function detailSantri(Request $request)
    {
        if(date('m') <= 06 ){
            $santris = CumulativeStudy::where('id_course', $request->id_course)
                                    ->leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->where('semester', 'Genap')
                                    ->get();
        }elseif(date('m') > 06 ){
            $santris = CumulativeStudy::where('id_course', $request->id_course)
                                    ->leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->where('semester', 'Ganjil')
                                    ->get();
        }

        return view('ustadz.santri-kelas', compact('santris'));
    }

    public function createNilai(Request $request)
    {
        $request->validate([
            'id_cumulative_study' => 'required', 'number',
            'score' => 'required', 'number',
        ]);
        
        for($x = 1; $x <= count($request->id_cumulative_study); $x++){
            CumulativeStudy::where('id_cumulative_study', $request->id_cumulative_study[$x])->update([
                'minimum_score' => 60,
                'score' => $request->score[$x],
            ]);
        }

        return redirect()->route('ustadz.kelas.detail-santri', [$request->id_course])->with('tambah','Nilai Berhasil Ditambahkan!');
    }

    public function cetakKelas(Request $request)
    {
        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('id', Auth::guard('ustadz')->user()->id)
                        ->where('status_course', 'Aktif')
                        ->get();

        $pdf = PDF::loadview('ustadz.cetak-kelas', compact('courses'));

        return $pdf->stream();
    }
}
