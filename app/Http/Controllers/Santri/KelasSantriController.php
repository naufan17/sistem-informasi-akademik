<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
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
        $classrooms = Classroom::leftjoin('users', 'classrooms.id_santri', '=', 'users.id')->where('id', $id)
                                ->leftjoin('courses', 'classrooms.id_course', '=', 'courses.id_course')->where('id', $id)->get();

        return view('santri.kelas', compact('classrooms'));
    }
}
