<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CumulativeStudy;
use App\Models\Score;

class NilaiSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $scores = CumulativeStudy::where('id_santri', $id)
                                ->leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')->where('id', $id)
                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')->where('id_santri', $id)->get();

        return view('santri.nilai', compact('scores'));
    }
}
