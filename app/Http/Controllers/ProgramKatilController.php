<?php

namespace App\Http\Controllers;

use App\Models\katilim;
use App\Models\katilim_pivot;
use App\Models\main_kursu;
use App\Models\program_pivot;
use App\Models\programs;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\about_us;

class ProgramKatilController extends Controller
{
    public function index($id){

        if (Auth::user()){
         if (auth()->user()->yetki == 4){
            alert()->warning('Yönetim Panelinden işlem yapınız','Kullanıcılar İçin')->autoclose(30000);
            return redirect()->back();
         }
        }

        $kursus =main_kursu::all();

        $program= programs::find($id);
        $abouts=about_us::all();
        $programs= programs::all();
        $programs->sortByDesc('tarih');


        return view('site.program_katil',compact('kursus','program','saved','abouts','programs'));
    }

    public function katil(){
        foreach (auth()->user()->student->katilim as $katilim){
            if (\request('program_id') == $katilim->programs_id){
                alert()->warning('Bu programa daha önceden katılmıştın');
                return redirect()->back();
            }
        }


        $katil = katilim::create([
           'students_id'      => \request('user_id'),
           'programs_id'   => \request('program_id'),
           'kisi'         => 1
        ]);

        $pivot = katilim_pivot::create([
           'katilim_id'  => $katil->id,
           'students_id' => $katil->students_id,
           'programs_id' => $katil->programs_id
        ]);


        alert()->success('kaydınız başarılı bir şekilde oluşturuldu',auth()->user()->name);
        return redirect()->back();
    }
}
