<?php

namespace App\Http\Controllers\Ustadz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function index($id)
    {
        if(date('m') <= 06 ){
            $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('id', $id)
                            ->whereIn('sem', [2, 4, 6, 8, 10, 12, 14, 16])
                            ->where('status_course', 'Aktif')
                            ->orderBy('sem')
                            ->get();
                            
            $semester = "Genap";

        }elseif(date('m') > 06 ){
            $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('id', $id)
                            ->where('status_course', 'Aktif')
                            ->whereIn('sem', [1, 3, 5, 7, 9, 11, 13, 15])
                            ->orderBy('sem')
                            ->get();

            $semester = "Ganjil";
        }

        return view('ustadz.kelas', compact('courses', 'semester'));
    }

    public function filter(Request $request)
    {
        if($request->semester == 'Genap'){
            $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('id', $request->id_santri)
                            ->where('status_course', 'Aktif')
                            ->whereIn('sem', [2, 4, 6, 8, 10, 12, 14, 16])
                            ->orderBy('sem')
                            ->get();
                            
            $semester = "Genap";

        }elseif($request->semester == 'Ganjil'){
            $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('id', $request->id_santri)
                            ->where('status_course', 'Aktif')
                            ->whereIn('sem', [1, 3, 5, 7, 9, 11, 13, 15])
                            ->orderBy('sem')
                            ->get();

            $semester = "Ganjil";
        }

        return view('ustadz.kelas', compact('courses', 'semester'));
    }

    public function detailSantri($id)
    {
        if(date('m') <= 06 ){
            $santris = CumulativeStudy::where('id_course', $id)
                                    ->leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->where('semester', 'Genap')
                                    ->get();
        }elseif(date('m') > 06 ){
            $santris = CumulativeStudy::where('id_course', $id)
                                    ->leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
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

        return redirect()->route('ustadz.kelas.detail-santri', [$request->id_course]);
    }

    public function cetakKelas(Request $request)
    {
        if($request->semester == 'Genap'){
            $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('id', $request->id_ustadz)
                            ->where('status_course', 'Aktif')
                            ->whereIn('sem', [2, 4, 6, 8, 10, 12, 14, 16])
                            ->orderBy('sem')
                            ->get();

        }elseif($request->semester == 'Ganjil'){
            $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('id', $request->id_ustadz)
                            ->where('status_course', 'Aktif')
                            ->whereIn('sem', [1, 3, 5, 7, 9, 11, 13, 15])
                            ->orderBy('sem')
                            ->get();

        }

        $pdf = PDF::loadview('ustadz.cetak-kelas', compact('courses'));

        return $pdf->stream();
    }
}
