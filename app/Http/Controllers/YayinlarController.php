<?php

namespace App\Http\Controllers;

use App\Models\yayinlar;
use Illuminate\Http\Request;

class YayinlarController extends Controller
{
    public function index(){

        $yayinlar = yayinlar::all();
        return view('admin.icerik.yayinlar',compact('yayinlar'));
    }

    public function save(Request $request)
    {
        $this->validate($request,[
           'baslik' => 'required',
           'icerik' => 'required',
           'tarih'  => 'required',
           'img'    => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        $yayin = yayinlar::create([
           'baslik' => $request->baslik,
           'icerik' => $request->icerik,
           'tarih'  => $request->tarih,
           'aktif'  => 0
        ]);

        if (request()->hasFile('img')){

            $file = request()->file('img');
            $name =rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img/yayinlar',$name);

            $yayin->update([
                'img'  => $name
            ]);

        }

        alert()->success('Yayın ekleme başarılı',$yayin->baslik);
        return redirect()->back();

    }

    public function yayin_update($id)
    {
        $yayin = yayinlar::find($id);

        return view('admin.icerik.yayin_update', compact('yayin'));
    }

    public function update(Request $request)
    {
        $yayin = yayinlar::find($request->id);

        switch ($request) {
            case $request->has('img'):
                $file = request()->file('img');
                $name = rand(1111, 9999) . '.' . $file->getClientOriginalExtension();
                request()->file('img')->move('img/yayinlar', $name);
                if (file_exists(public_path("img/".$yayin->img))){
                    // unlink(public_path("img/".$kursu_sil->img));
                    File::delete(public_path("img/".$yayin->img));
                }

                $yayin->update([
                    'img' => $name
                ]);
                break;

            case $request->has('baslik'):
                $yayin->update([
                    'baslik' => $request->baslik
                ]);
                break;

            case $request->has('tarih'):
                $yayin->update([
                    'tarih' => $request->tarih
                ]);
                break;

            case $request->has('icerik'):
                $yayin->update([
                   'icerik'  => $request->icerik
                ]);
                break;
        }

        alert()->success('Güncelleme Başarılı');
       return redirect()->back();
    }

    public function aktive($id)
    {
        $yayin= yayinlar::find($id);

        if ($yayin->aktif == 0){
            $yayin->update([
               'aktif' => 1
            ]);
        }elseif ($yayin->aktif == 1){
            $yayin->update([
               'aktif' => 0
            ]);
        }


        alert()->success('güncelleme başarılı');
        return redirect()->back();


    }

    public function delete($id){
        $yayin=yayinlar::find($id);
        if (file_exists(public_path("img/".$yayin->img))){
            // unlink(public_path("img/".$kursu_sil->img));
            File::delete(public_path("img/".$yayin->img));
        }
        $yayin->delete();

        alert()->warning('İçerik başarılı bir şekilde silindi');
        return redirect()->route('admin.icerik.yayinlar');

    }
}
