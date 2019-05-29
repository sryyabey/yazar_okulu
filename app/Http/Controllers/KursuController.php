<?php

namespace App\Http\Controllers;

use App\Models\program;
use App\Models\programs;
use App\Models\teacher;

use function Sodium\compare;
use Illuminate\Http\Request;
use App\Models\main_kursu;
use App\Models\alt_kursu;
use File;
use Image;




class KursuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new_kursu(){

        $kursus = main_kursu::all();


        return view('admin.kursu.new_kursu',compact('kursus'));

    }

    public function kursu_kayit(Request $request){

        $this->validate($request,[
            'kursu_adi'  => 'required',
            'slug'       => 'required',
            'icerik'     => 'required',
            'keywords'   => 'required',
            'img'        => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $kursus = main_kursu::all();





        $kayit= main_kursu::create([
            'kursu_adi' => request('kursu_adi'),
            'slug'      => request('slug'),
            'icerik'    => request('icerik'),
            'keywords'  => request('keywords')
        ]);

        if (request()->hasFile('img')){

            $originalImage= $request->file('img');
            //$thumbnailImage = Image::make($originalImage);
            $thumbnailImage= Image::make($originalImage);
            $thumbnailPath = public_path().'/img/';


            $thumbnailImage->resize(200,115);
            $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

            $kayit->update([
               'img' =>  time().$originalImage->getClientOriginalName()
            ]);

        }
        alert()->success('Kayıt Başarılı', $kayit->kursu_adi);

        $lastid= $kayit->kursu_adi." kürsüsü başarılı bir şekilde açılmıştır";


        return redirect()->route('admin.kursu.new_kursu',compact('kursus'));
    }

    public function kursu_sil($id){

        $kursu_sil=main_kursu::find($id);
        $sil=$kursu_sil->kursu_adi;
        if (file_exists(public_path("img/".$kursu_sil->img))){
           // unlink(public_path("img/".$kursu_sil->img));
            File::delete(public_path("img/".$kursu_sil->img));
        }
        $kursu_sil->delete();


        alert()->warning('Kayıt Silindi', $sil);

        return redirect()->route('admin.kursu.new_kursu');
    }

    public function kursu_duzenle($id){

        $kursu = main_kursu::find($id);

        return view('admin.kursu.kursu_duzenle',compact('kursu'));
    }

    public function kursu_update(){

        $kursus = main_kursu::all();

        $update=main_kursu::find(request('id'));

        $update->update([
           'kursu_adi'   => request('kursu_adi'),
           'icerik'      => request('icerik'),
           'slug'        => request('slug'),
           'keywords'    => request('keywords')
        ]);

        if (request()->hasFile('img')){

            $file = request()->file('img');
            $name =rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img',$name);

            $update= main_kursu::find($update->id);
            if (file_exists(public_path("img/".$update->img))){
                // unlink(public_path("img/".$kursu_sil->img));
                File::delete(public_path("img/".$update->img));
            }

            $update->update([
                'img'  => $name
            ]);

        }
        alert()->success('Güncelleme Başarılı');





        return redirect()->route('admin.kursu.new_kursu',compact('kursus'));
    }

    public function alt_kursu(){



        $kursus =main_kursu::all();
        $alt_kursus= alt_kursu::all();

        return view('admin.kursu.alt_kursu', compact('kursus','alt_kursus'));
    }

    public function alt_kursu_kayit(Request $request){

        $this->validate($request,[
            'baslik'   => 'required',
            'kursu_id' => 'required',
            'icerik'   => 'required',
            'slug'     => 'required',
            'keywords' => 'required'
        ]);

        $kayit=alt_kursu::create([
            'main_kursu_id'    => request('kursu_id'),
            'baslik'      => request('baslik'),
            'icerik'      => request('icerik'),
            'slug'        => request('slug'),
            'keywords'    => request('keywords'),
            'onay'        => 0
        ]);

        if (request()->hasFile('img')){

            $originalImage= $request->file('img');
            //$thumbnailImage = Image::make($originalImage);
            $thumbnailImage= Image::make($originalImage);
            $thumbnailPath = public_path().'/img/';


            $thumbnailImage->resize(200,115);
            $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

            $kayit->update([
                'img'  => time().$originalImage->getClientOriginalName()
            ]);

        }



        $kursus =main_kursu::all();
        $alt_kursus= alt_kursu::all();
        alert()->success('Kayıt başarılı bir şekilde alındı', $kayit->baslik);

        return redirect()->route('admin.kursu.alt_kursu');
    }

    public function alt_kursu_duzenle($id){

        $alt_kursu = alt_kursu::find($id);

        return view('admin.kursu.alt_kursu_duzenle',compact('alt_kursu'));
    }
    public function alt_kursu_sil($id){

        $sil=alt_kursu:: find($id);

        if (file_exists(public_path("img/".$sil->img))){
            // unlink(public_path("img/".$kursu_sil->img));
            File::delete(public_path("img/".$sil->img));
        }


        $sil->delete();




        alert()->warning('Kayıt başarılı bir şekilde silindi');
        return redirect()->route('admin.kursu.alt_kursu');
    }

    public function alt_kursu_update(Request $request){

        $this->validate($request,[
            'baslik' => 'required',
            'icerik'   => 'required',
            'slug'     => 'required',
            'keywords' => 'required'
        ]);

        $kayit=alt_kursu::find(request('id'));

        $kayit->update([
           'baslik'    => request('baslik'),
           'icerik'    => request('icerik'),
           'slug'      => request('slug'),
           'keywords'  => request('keywords')
        ]);

        $kursus =main_kursu::all();
        $alt_kursus= alt_kursu::all();
        alert()->warning('Kayıt başarılı bir şekilde silindi', $kayit->baslik);
        return redirect()->route('admin.kursu.alt_kursu',compact('kursus','alt_kursus'));
    }

    public function add_program(){

        $kursus= main_kursu::all();
        $alt_kursus = alt_kursu::all();
        $teachers = teacher::all();
        return view('admin.kursu.add_program', compact('kursus','alt_kursus','teachers'));
    }

    public function save_program(){

        $kayit= programs::create([
           'user_id'     => request('user_id'),
           'alt_kursu'   => request('alt_kursu'),
           'egitimci_id' => request('egitimci'),
           'start_date'  => request('start_date'),
           'end_date'    => request('end_date'),
           'tarih'       => request('tarih'),
           'kontenjan'   => request('kontenjan'),
           'konu'        => request('icerik'),
           'slug'        => request('slug'),
           'keywords'    => request('keywords'),
           'onay'        => 0

        ]);

        if (request()->hasFile('img')){

            $file = request()->file('img');
            $name =rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img',$name);

            $update= programs::find($kayit->id);

            $update->update([
                'img'  => $name
            ]);

        }

        $kursus= main_kursu::all();
        $alt_kursus = alt_kursu::all();
        $teachers = teacher::all();

        alert()->success('Program başarılı bir şekilde oluşturuldu', $kayit->slug);
        return redirect()->route('admin.kursu.add_program',compact('kursus','alt_kursus','teachers'));

    }

    public function programs(){

        $programs =programs::all();

        return view('admin.kursu.programs', compact('programs'));
    }

    public function program_onizle($id){

        $program = programs::find($id);
        $kursus = main_kursu::all();
        $alt_kursus = alt_kursu::all();
        $teachers= teacher::all();


        return view('admin.kursu.program_onizle', compact('program','kursus','alt_kursus','teachers'));
    }

    public function program_del($id){

        $delete= programs::find($id);
        $delete->delete();

        alert()->warning('Program kaydı başarılı bir şekilde kaldırıldı');
        return redirect()->route('admin.kursu.programs');



    }



}
