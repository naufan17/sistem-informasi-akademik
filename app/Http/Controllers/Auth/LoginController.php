<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:santri')->except('logout');
        // $this->middleware('guest:ustadz')->except('logout');
    }

    public function login(Request $request)
    {  
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))){
            if (auth()->user()->role == 'ustadz') {
                return redirect()->route('ustadz.dashboard');
            }else{
                return redirect()->route('login')->with('error', 'You have no permission ');
            }
        }else{
            return redirect()->route('login')->with('error', 'Email & Password are incorrect.');
        }     
    }

    
    // public function showSantriLoginForm()
    // {
    //     return view('auth.login', ['url' => 'santri']);
    // }

    // public function santriLogin(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'   => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);

    //     if (Auth::guard('santri')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         return redirect()->intended('/santri');
    //     }
    //     return back()->withInput($request->only('email', 'remember'));
    // }

    // public function showUstadzLoginForm()
    // {
    //     return view('auth.login', ['url' => 'ustadz']);
    // }

    // public function ustadzLogin(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'   => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);

    //     if (Auth::guard('ustadz')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         return redirect()->intended('/ustadz');
    //     }
    //     return back()->withInput($request->only('email', 'remember'));
    // }
}
