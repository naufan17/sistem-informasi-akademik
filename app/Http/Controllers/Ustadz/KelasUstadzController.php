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

    public function detailSantri($id)
    {
        if(date('m') <= 06 ){
            $santris = CumulativeStudy::where('id_course', $id)
                                    ->leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->where('semester', 'Genap')
                                    ->get();
        }elseif(date('m') > 06 ){
            $santris = CumulativeStudy::where('id_course', $id)
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
        
        CumulativeStudy::where('id_cumulative_study', $request->id_cumulative_study)->update([
            'minimum_score' => '60',
            'score' => $request->score,
        ]);

        // CumulativeStudy::upsert([
        //     'id_cumulative_study' => $request->id_cumulative_study,
        //     'year' => $request->year,
        //     'semester' => $request->semester,
        //     'minimum_score' => '75',
        //     'score' => $request->score,
        //     'id_santri' => $request->id_santri,
        //     'id_course' => $request->id_course,
        // ],['id_cumulative_study', 'year', 'semester', 'id_santri', 'id_course'],['minimum_score', 'score']);

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect()->route('ustadz.kelas.detail-santri', [$request->id_course]);
    }

    public function cetakKelas(Request $request)
    {
        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('id', $request->id_ustadz)
                        ->where('status_course', 'Aktif')
                        ->get();

        $pdf = PDF::loadview('ustadz.cetak-kelas', compact('courses'));

        return $pdf->stream();
    }
}
