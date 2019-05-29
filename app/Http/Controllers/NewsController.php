<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Image;

class NewsController extends Controller
{
    public function index(){

        $newses = news::all();

        return view('admin.icerik.news' , compact('newses'));
    }

    public function save(Request $request)
    {
        $news= news::create([
           'baslik' => $request->baslik,
           'icerik' => $request->icerik,
           'tarih'  => $request->tarih,
           'start_time' => $request->start_time,
           'end_time'   => $request->end_time,
           'aktif'   => 0
        ]);

        if (request()->hasFile('img')){

            $originalImage= $request->file('img');

            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/img/news/thumb/';
            $originalPath = public_path().'/img/news/';
            $name=time().$originalImage->getClientOriginalName();
            $thumbnailImage->save($originalPath.$name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$name);



            $news->update([
                'img' => $name
            ]);

        }

        alert()->success('kayıt başarılı bir şekilde alındı');
        return redirect()->back();

    }

    public function aktive($id){

        $news= news::find($id);
        if ($news->aktif == 0){
            $news->update([
               'aktif' => 1
            ]);
        }elseif ($news->aktif == 1){
            $news->update([
               'aktif' => 0
            ]);
        }

        alert()->success('Güncelleme başarılı');
        return redirect()->back();
    }

    public function news_update($id){

        $news = news::find($id);

        return view('admin.icerik.news_update',compact('news'));
    }

    public function tahdis(Request $request)
    {
        $news= news::find($request->id);

        switch ($request){
            case $request->has('img'):
                $originalImage= $request->file('img');
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = public_path().'/img/news/thumb/';
                $originalPath = public_path().'/img/news/';
                $name=time().$originalImage->getClientOriginalName();
                $thumbnailImage->save($originalPath.$name);
                $thumbnailImage->resize(150,150);
                $thumbnailImage->save($thumbnailPath.$name);

                $file_path= public_path().'/img/news/'.$news->img;
                $file_path_thumb= public_path().'/img/news/thumb/'.$news->img;
                unlink($file_path);
                unlink($file_path_thumb);

                $news->update([
                    'img' => $name
                ]);
                break;

            case $request->has('baslik'):
                $news->update([
                   'baslik'  => $request->baslik
                ]);
                break;

            case $request->has('tarih'):
                $news->update([
                   'tarih' => $request->tarih
                ]);
                break;

            case $request->has('start_time'):
                $news->update([
                    'start_time' => $request->start_time
                ]);
                break;

            case $request->has('end_time'):
                $news->update([
                    'end_time' => $request->end_time
                ]);
                break;


        }

        alert()->success('Güncelleme Bşarılı');
        return redirect()->back();
    }
}
