<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    public function index()
    {
        $santris = Santri::where('id', Auth::guard('santri')->user()->id)->get(); 

        return view('santri.data-diri', compact('santris'));
    }

    public function formUpdate()
    {
        $santris = Santri::where('id', Auth::guard('santri')->user()->id)->get();
        
        return view('santri.update-data-diri', compact('santris'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'place_born' => 'required|string',
            'birthday' => 'required|date',
            'gender' => 'required|string',
            'id_number' => 'required',
            'blood' => 'required|string',
            'phone_number' => 'required',
            'email' => 'required|string|email|max:255|unique:santris',
            'address' => 'required|max:255',
            'RT' => 'required|max:10',
            'RW' => 'required|max:10',
            'village' => 'required|string',
            'districs' => 'required|string',
            'regency' => 'required|string',
            'province' => 'required|string',
            'father_name' => 'required|string',
            'place_born_father' => 'required|string',
            'birthday_father' => 'required|date',
            'mother_name' => 'required|string',
            'place_born_mother' => 'required|string',
            'birthday_mother' => 'required|date',
            'parent_address' => 'required|string',
            'phone_number_parent' => 'required',
        ]);

        Santri::where('id', Auth::guard('santri')->user()->id)->update([
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

        return redirect()->route('santri.data-diri', [Auth::guard('santri')->user()->id])->with('update','Data Diri Berhasil Diperbarui!');
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $file = $request->file('image');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('foto_santri', $nama_file);

        Santri::where('id', Auth::guard('santri')->user()->id)->update([
            'photo' => $nama_file,
        ]);

        return redirect()->route('santri.data-diri', [Auth::guard('santri')->user()->id])->with('update','Foto Berhasil Upload!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        
        Santri::where('id', Auth::guard('santri')->user()->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        return redirect()->route('santri.data-diri', [Auth::guard('santri')->user()->id])->with('update','Password Berhasil Diupdate!');
    }
    
}
