<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = '/admin/home';

    protected function authenticated(Request $request, $user)
    {
        if ($user->yetki == 4){
            return redirect()->route('admin.home');
        }else{
            if ( $user->student->onay == 0) {// do your margic here
                alert()->info('Kullanıcı Kimliğiniz Onaylandıktan Sonra Hesabınız Açılacaktır',$user->name)->autoclose(15000);
                Auth::logout();
                return redirect()->back();
            }elseif ($user->student->onay == 1){
                return redirect()->back();
            }
        }
     }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('anasayfa');
    }
}
