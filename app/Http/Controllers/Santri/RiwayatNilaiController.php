<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiwayatNilaiController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('santri.riwayat-nilai');
    }
}