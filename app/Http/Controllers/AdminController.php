<?php

namespace App\Http\Controllers;

use App\Models\main_kursu;
use App\Models\programs;
use App\Models\students;
use App\Models\teacher;
use App\User;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\Http\sryya\user_kural;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }

    public function home(){

        if (\auth()->user()->yetki != 4){
            alert()->warning('Bu alana giriş yetkini yok');
            return redirect()->route('anasayfa');
        }


        $programs = programs::all();
        $egitimciler= teacher::all();
        $students =students::orderByDesc('id')->get();
        $programs = programs::all();

        return view('admin.home',compact('programs','egitimciler','students','programs'));
    }

    public function blank(){

        return view(('admin.blank'));
    }


}
