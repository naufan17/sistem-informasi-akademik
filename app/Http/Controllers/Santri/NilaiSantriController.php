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
        $scores = Score::leftjoin('cumulative_studies', 'scores.id_cumulative_study', '=', 'cumulative_studies.id_cumulative_study')->get();

        return view('santri.nilai', compact('scores'));
    }
}
