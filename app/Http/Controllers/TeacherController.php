<?php

namespace App\Http\Controllers;

use App\Models\alt_kursu;
use App\Models\main_kursu;
use App\Models\teacher;
use Illuminate\Http\Request;
use File;
use Image;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new_teacher(){
        if (\auth()->user()->yetki != 4){
            alert()->warning('Bu alana giriş yetkini yok');
            return redirect()->route('anasayfa');
        }

        $kursus= main_kursu::all();
        $alt_kursus= alt_kursu::all();


        return view('admin.teacher.new_teacher',compact('kursus','alt_kursus'));
    }

    public function save_teacher(){

        $kayit= teacher::create([
           'alt_kursu_id'    => request('alt_kursu_id'),
           'ad'              => request('ad'),
           'soyad'           => request('soyad'),
           'brans'           => request('brans'),
           'sosyal_medya'    => request('sosyal_medya'),
           'telefon'         => request('telefon'),
           'email'           => request('email'),
           'icerik'          => request('icerik'),
           'onay'            => 0
        ]);

        if (request()->hasFile('img')){

            $file = request()->file('img');
            $name =rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img',$name);

            $update= teacher::find($kayit->id);
            $update->update([
                'img'  => $name
            ]);

        }




        alert()->success('Kayıt başarılı bir şekilde alındı',$kayit->ad." ".$kayit->soyad);
        return redirect()->route('admin.teacher.new_teacher',compact('kayit'));
    }

    public function teachers(){
        if (\auth()->user()->yetki != 4){
            alert()->warning('Bu alana giriş yetkini yok');
            return redirect()->route('anasayfa');
        }

        $teachers= teacher::all();

        return view('admin.teacher.teachers', compact('teachers'));
    }

    public function update($id){

        $teacher = teacher::find($id);
        $alt_kursu=alt_kursu::find($teacher->alt_kursu_id);

        $kursus=main_kursu::all();
        $alt_kursus = alt_kursu::all();


        return view('admin.teacher.update', compact('teacher','alt_kursu','kursus','alt_kursus'));
    }

    public function guncelle(){
        $teacher = teacher::find(request('id'));

        $teacher->update([
           'ad'            => request('ad'),
           'soyad'         => request('soyad'),
           'brans'         => request('brans'),
           'sosyal_medya'  => request('sosyal_medya'),
           'telefon'       => request('telefon'),
           'email'         => request('email'),
           'icerik'        => request('icerik')
        ]);


        $alt_kursu=alt_kursu::find($teacher->alt_kursu_id);

        $kursus=main_kursu::all();
        $alt_kursus = alt_kursu::all();

        alert()->success('Kayıt başarılı bir şekilde güncellendi',$teacher->ad." ".$teacher->soyad);
        return redirect()->route('admin.teacher.update', compact('teacher','alt_kursu','kursus','alt_kursus'));
    }

    public function delete($id){

        $delete = teacher::find($id);
        $teacher= $delete->ad." ". $delete->soyad;

        $delete->delete();

        $teachers= teacher::all();

        alert()->success('Kayıt başarılı bir şekilde güncellendi',$teacher);
        return redirect()->route('admin.teacher.teachers', compact('teacher','alt_kursu','kursus','alt_kursus'));

 }

    public function image_update(){

        if (request()->hasFile('img')){

            $file = request()->file('img');
            $name =rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img',$name);

            $update= teacher::find(request('id'));
            if (file_exists(public_path("img/".$update->img))){
                // unlink(public_path("img/".$kursu_sil->img));
                File::delete(public_path("img/".$update->img));
            }


            $update->update([
                'img'  => $name
            ]);

        }


        $teachers= teacher::all();


        alert()->success('Kayıt başarılı bir şekilde alındı',$update->ad." ".$update->soyad);
        return redirect()->route('admin.teacher.teachers',compact('teachers'));

    }

    public function onay($id)
    {
        $onay= teacher::find($id);

        if ($onay->onay == 0){
            $onay->update([
               'onay' => 1
            ]);
            $onayli='Kullanıcı Onaylandı';
        }elseif ($onay->onay == 1){
            $onay->update([
               'onay'=> 0
            ]);
            $onayli='Kullanıcı Onayı kaldırıldı';
        }


     alert()->success($onayli,'Güncelleme Başarılı');
     return redirect()->back();
    }
}
