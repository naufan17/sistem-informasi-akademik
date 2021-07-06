<?php

namespace App\Http\Controllers\Ustadz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\User;

class MataPelajaranUstadzController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')->where('id', $id)
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')->get();

        return view('ustadz.mata-pelajaran', compact('courses'));
    }

    public function detailSantri($id)
    {
        $santris = CumulativeStudy::where('id_course', $id)->leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')->get();

        return view('ustadz.santri-mata-pelajaran', compact('santris'));
    }
}
