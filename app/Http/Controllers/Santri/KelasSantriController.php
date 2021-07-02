<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
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
        $classroom = Classroom::leftjoin('users', 'classrooms.id_santri', '=', 'users.id')->where('id', $id)->get();

        return view('santri.kelas', compact('classroom'));
    }
}
