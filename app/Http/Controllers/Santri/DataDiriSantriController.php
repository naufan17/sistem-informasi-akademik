<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DataDiriSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $santris = User::where('id', $id)->get(); 

        return view('santri.data-diri', compact('santris'));
    }

    public function formUpdate($id)
    {
        $santris = User::where('id', $id)->get();
        
        return view('santri.update-data-diri', compact('santris'));
    }

    public function updateProfile(Request $request)
    {
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
            // 'father_name' => $request->father_name, 
            // 'place_born_father' => $request->place_born_father, 
            // 'birthday_father' => $request->birthday_father, 
            // 'mother_name' => $request->mother_name, 
            // 'place_born_mother' => $request->place_born_mother, 
            // 'birthday_mother' => $request->birthday_mother, 
            // 'parent_address' => $request->parent_address, 
            // 'phone_number_parent' => $request->phone_number_parent, 
            'status' => $request->status,
        ]);

        return redirect()->route('santri.data-diri', ['id' => $request->id]);
    }

    public function updatePassword(Request $request)
    {
        User::where('id', $request->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        return redirect()->route('santri.data-diri', ['id' => $request->id]);
    }
    
}
