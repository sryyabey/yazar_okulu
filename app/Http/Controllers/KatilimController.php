<?php

namespace App\Http\Controllers;

use App\Models\katilim;
use App\Models\katilim_pivot;
use App\Models\programs;
use App\Models\students;
use Illuminate\Http\Request;

class KatilimController extends Controller
{
    public function katilim()
    {
        $katilims=katilim::select('programs_id')->distinct()->get();
        $programs= programs::all();



        return view('admin.programs.katilim', compact('katilims','programs'));
    }

    public function onizle($id){

        $program=programs::find($id);

        return view('admin.programs.katilim_onizle',compact('program'));
    }

    public function print($id)
    {
        $print=programs::find($id);
        return view('admin.programs.print',compact('print'));
    }

    public function ekle($id){

        $program=programs::find($id);
        $students = students::all();

        $katilim= $program->student->pluck('id')->toArray();
        $ogrenci= students::pluck('id')->toArray();
        $katilma=array_diff($ogrenci,$katilim);

        $ogrenciler= students::find($katilma);



        return view('admin.programs.ekle',compact('program','students','ogrenciler'));
    }

    public function add_katilim(Request $request){



        foreach ($request->katilimcilar as $katilimci){
            $katilim=katilim::create([
               'students_id'  => $katilimci,
               'programs_id'  => $request->program_id,
               'kisi'         => 1
            ]);

            $pivot= katilim_pivot::create([
               'katilim_id'  => $katilim->id,
               'students_id' => $katilim->students_id,
               'programs_id' => $katilim->programs_id
            ]);
        }



        alert()->success('Yani katılımcı kayıtları başarılı');
        return redirect()->back();
    }

    public function delete_katilimci($id){

        $katilim=katilim::where('students_id','like',$id)->delete();
        $katilim_pivot=katilim_pivot::where('students_id','like',$id)->delete();


        alert()->warning('Katilimci başarılı bir şekilde programdan çıkarıldı');
        return redirect()->back();
    }
}
