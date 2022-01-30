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
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('id', $id)
                        ->orderBy('sem')
                        ->get();

        return view('ustadz.kelas', compact('courses'));
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

    public function cetakKelas($id)
    {
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('id', $id)
                        ->get();

        $pdf = PDF::loadview('ustadz.cetak-kelas', compact('courses'));

        return $pdf->stream();
    }
}
