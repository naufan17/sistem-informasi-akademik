<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CumulativeStudy;
use App\Models\Course;
use App\Models\User;
use PDF;

class KelasSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $cumulative_studies = CumulativeStudy::leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
                                            ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                            ->where('id_santri', $id)
                                            ->orderBy('semester')
                                            ->get();
        
        $filters = CumulativeStudy::select('semester', 'year')
                                    ->where('id_santri', $id)
                                    ->get();

        return view('santri.kelas', compact('cumulative_studies', 'filters'));
    }

    public function filterKelas(Request $request)
    {
        $cumulative_studies = CumulativeStudy::leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
                                            ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                            ->where('id_santri', $request->id)
                                            ->where('semester', $request->semester)
                                            ->where('year', $request->tahun_ajaran)
                                            ->orderBy('semester')
                                            ->get();
                
        $filters = CumulativeStudy::select('semester', 'year')
                                    ->where('id_santri', $request->id)
                                    ->where('semester', $request->semester)
                                    ->where('year', $request->tahun_ajaran)
                                    ->limit(1)
                                    ->get();

        return view('santri.kelas', compact('cumulative_studies', 'filters'));
}

    public function detail($id)
    {
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('id_course', $id)
                        ->get();

        return view('santri.detail-kelas', compact('courses'));
    }

    public function cetakKelas($id)
    {
        $cumulative_studies = CumulativeStudy::leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
                                            ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                            ->where('id_santri', $id)
                                            ->orderBy('semester')
                                            ->get();

        $pdf = PDF::loadview('santri.cetak-kelas', compact('cumulative_studies'));

        return $pdf->stream();
    }
}
