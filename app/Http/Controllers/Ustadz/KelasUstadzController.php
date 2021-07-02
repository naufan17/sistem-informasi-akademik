<?php

namespace App\Http\Controllers\Ustadz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;

class KelasUstadzController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')->where('id', $id)->get();

        return view('ustadz.kelas', compact('courses'));
    }
}
