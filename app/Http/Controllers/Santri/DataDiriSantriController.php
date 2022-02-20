<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Santri;

class DataDiriSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $santris = Santri::where('id', $id)->get(); 

        return view('santri.data-diri', compact('santris'));
    }

    public function formUpdate($id)
    {
        $santris = Santri::where('id', $id)->get();
        
        return view('santri.update-data-diri', compact('santris'));
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
        //     'father_name' => 'required', 'string',
        //     'place_born_father' => 'required', 'string',
        //     'birthday_father' => 'required', 'string',
        //     'mother_name' => 'required', 'string',
        //     'place_born_mother' => 'required', 'string',
        //     'birthday_mother' => 'required', 'string',
        //     'parent_address' => 'required', 'string',
        //     'phone_number_parent' => 'required', 'string',
        // ]);

        Santri::where('id', $request->id)->update([
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
            'father_name' => $request->father_name, 
            'place_born_father' => $request->place_born_father, 
            'birthday_father' => $request->birthday_father, 
            'mother_name' => $request->mother_name, 
            'place_born_mother' => $request->place_born_mother, 
            'birthday_mother' => $request->birthday_mother, 
            'parent_address' => $request->parent_address, 
            'phone_number_parent' => $request->phone_number_parent, 
        ]);

        Session::flash('update','Data Berhasil Diperbarui!');

        return redirect()->route('santri.data-diri', [$request->id]);
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $file = $request->file('image');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('foto_santri', $nama_file);

        Santri::where('id', $request->id)->update([
            'photo' => $nama_file,
        ]);

        Session::flash('update','Data Berhasil Diupdate!');

        return redirect()->route('santri.data-diri', [$request->id]);
    }

    public function updatePassword(Request $request)
    {
        Santri::where('id', $request->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        Session::flash('update','Data Berhasil Diupdate!');

        return redirect()->route('santri.data-diri', [$request->id]);
    }
    
}
