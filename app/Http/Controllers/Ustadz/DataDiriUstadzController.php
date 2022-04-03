<?php

namespace App\Http\Controllers\Ustadz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Ustadz;

class DataDiriUstadzController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ustadzs = Ustadz::where('id', Auth::guard('ustadz')->user()->id)->get();

        return view('ustadz.data-diri', compact('ustadzs'));
    }

    public function formUpdate()
    {
        $ustadzs = Ustadz::where('id', Auth::guard('ustadz')->user()->id)->get();
        
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
        // ]);

        Ustadz::where('id', Auth::guard('ustadz')->user()->id)->update([
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
        ]);

        Session::flash('update','Data Berhasil Diperbarui!');

        return redirect()->route('ustadz.data-diri', [Auth::guard('ustadz')->user()->id]);
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $file = $request->file('image');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('foto_ustadz', $nama_file);

        Ustadz::where('id', Auth::guard('ustadz')->user()->id)->update([
            'photo' => $nama_file,
        ]);

        Session::flash('update','Data Berhasil Diupdate!');

        return redirect()->route('ustadz.data-diri', [Auth::guard('ustadz')->user()->id]);
    }

    public function updatePassword(Request $request)
    {
        Ustadz::where('id', Auth::guard('ustadz')->user()->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        Session::flash('update','Data Berhasil Diupdate!');

        return redirect()->route('ustadz.data-diri', [Auth::guard('ustadz')->user()->id]);
    }
    
}
