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

    public function update(Request $request)
    {
        // $request->validate([
        //     'name' => 'required', 'string', 'max:255',
        //     'place_born' => 'required', 'string',
        //     'birthday' => 'required', 'date',
        //     'gender' => 'required', 'string',
        //     'id_number' => 'required', 'bigInteger',
        //     'blood' => 'required', 'string',
        //     'phone_number' => 'required', 'bigInteger',
        //     'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
        //     'address' => 'required', 'bigInteger', 'max:255',
        //     'RT' => 'required', 'string',
        //     'RW' => 'required', 'string',
        //     'village' => 'required', 'string',
        //     'districs' => 'required', 'string',
        //     'regency' => 'required', 'string',
        //     'province' => 'required', 'string',
        //     'status' => 'required', 'string',
        // ]);

        User::where('id', $request->id)->update([
            'name' => $request->name,
            'place_born' => $request->place_born, 
            'birthday' => $request->birthday, 
            'gender' => $request->gender,
            'id_number' => $request->id_number, 
            'blood' => $request->blood, 
            'phone_number' => $request->phone_number, 
            'email' => $request->email,
            'address' => $request->address, 
            'RT' => $request->RT, 
            'RW' => $request->RW, 
            'village' => $request->village, 
            'districs' => $request->districs, 
            'regency' => $request->regency, 
            'province' => $request->province, 
            'status' => $request->status, 
        ]);

        return redirect('santri/dashboard/');
    }
}
