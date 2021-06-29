<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DataDiriController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($name)
    {
        $users = User::where('name', $name)->get();

        return view('santri.data-diri', compact('users'));
    }

    public function formUpdate($name)
    {
        $users = User::where('name', $name)->get();
        
        return view('santri.update-data-diri', compact('users'));
    }

    public function Update($name)
    {
    }
}
