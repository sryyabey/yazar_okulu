<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;
use Image;

class GaleriController extends Controller
{
    public function index()
    {
        $resims= galeri::where('cins','like',1)->get();
        $videos=galeri::where('cins','like',0)->get();

        return view('admin.icerik.galeri' ,compact('resims','videos'));
    }

    public function save(Request $request)
    {


        if ($request->has('resim')){
            $file = request()->file('img');
            $name =rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img/galeri',$name);


            $galeri=galeri::create([
                'baslik' => $request->baslik,
                'img'  => $name,
                'cins' =>1,
                'onay' =>0
            ]);
        }elseif ($request->has('video')){
               $galeri=galeri::create([
                    'baslik' => $request->baslik,
                    'video' => $request->youtube,
                    'cins' => 0,
                    'onay' => 0
                ]);

        }

        alert()->success('Galeri ögesi başarılı bir şekilde eklendi');
        return redirect()->back();
    }

    public function update(Request $request)
    {

        $resim= galeri::find($request->id);
        $resim->update([
           'baslik' => $request->baslik
        ]);
        if ($request->hasFile('img')) {
            $file = request()->file('img');
            $name = rand(1111, 9999) . '.' . $file->getClientOriginalExtension();
            request()->file('img')->move('img/galeri', $name);
            $file_path= public_path().'/img/galeri/'.$resim->img;
            unlink($file_path);


            $resim->update([
                'img' => $name
            ]);
        }

        alert()->success('güncelleme başarılı');
        return redirect()->back();

    }

    public function delete($id){

        $resim= galeri::find($id);
        $resim->delete();

        alert()->warning('Galeri Öğesi Silindi');
        return redirect()->back();
    }

    public function video_update(Request $request)
    {
        $video= galeri::find($request->id);

        $video->update([
           'baslik' => $request->baslik,
           'video'  => $request->youtube
        ]);

        alert()->success('Video güncelleme başarılı');
        return redirect()->back();
    }

    public function video_delete($id){

        $video= galeri::find($id);

        $video->delete();

        alert()->warning('Galeri ögesi silindi');
        return redirect()->back();
    }
}
