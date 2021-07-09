<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;

class UstadzSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ustadzs = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')->where('role', 'ustadz')->get();

        return view('santri.ustadz', compact('ustadzs'));
    }

    public function filter(Request $request)
    {
        $courses = Course::all();
        $ustadzs = Course::where('course', $request->course)->leftjoin('users', 'courses.id_ustadz', '=', 'users.id')->where('role', 'ustadz')->where('status', $request->status)->get();

        return view('santri.filter-ustadz', compact('courses', 'ustadzs'));
    }
}
