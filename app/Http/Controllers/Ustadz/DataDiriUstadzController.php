<?php

namespace App\Http\Controllers\Ustadz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DataDiriUstadzController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $ustadzs = User::where('id', $id)->get();

        return view('ustadz.data-diri', compact('ustadzs'));
    }

    public function formUpdate($id)
    {
        $ustadzs = User::where('id', $id)->get();
        
        return view('ustadz.update-data-diri', compact('ustadzs'));
    }

    public function updateProfile(Request $request)
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

        return redirect()->route('ustadz.data-diri', ['id' => $request->id]);
    }

    public function updatePassword(Request $request)
    {
        User::where('id', $request->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        return redirect()->route('ustadz.data-diri', ['id' => $request->id]);
    }
    
}
