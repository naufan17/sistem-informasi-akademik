<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CumulativeStudy;
use App\Models\Course;
use App\Models\User;

class KelasSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $cumulative_studies = CumulativeStudy::leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')->where('id', $id)
                                            ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')->where('id_santri', $id)->get();

        return view('santri.kelas', compact('cumulative_studies'));
    }

    public function detail($id)
    {
        $courses = Course::where('id_course', $id)
                        ->leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')->get();

        return view('santri.detail-kelas', compact('courses'));
    }
}
