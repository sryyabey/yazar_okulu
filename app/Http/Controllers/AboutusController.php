<?php

namespace App\Http\Controllers;

use App\Models\about_us;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index(){

        $abouts= about_us::all();

        return view('admin.icerik.aboutus_menu',compact('abouts'));
    }

    public function save(Request $request){

        $about= about_us::create([
           'baslik' => $request->baslik,
           'keywords' => $request->keywords,
           'icerik'  => $request->icerik,
           'slug'  => $request->baslik.rand(100,999)
        ]);

        if ($request->hasFile('img')){
            $file = request()->file('img');
            $name =rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img',$name);

            $about->update([
                'img'  => $name
            ]);
        }

        alert()->success('kaydınız başarılı bir şekilde alındı');
        return redirect()->back();
    }

    public function update($id)
    {
        $about= about_us::find($id);
        return view('admin.icerik.aboutus_update',compact('about'));
    }

    public function tahdis(Request $request)
    {
        $about=about_us::find($request->id);



        switch ($request){
            case $request->hasFile('img'):
                $file = request()->file('img');
                $name =rand(1111, 9999).'.'.$file->getClientOriginalExtension();
                request()->file('img')->move('img',$name);

                $about->update([
                    'img'  => $name
                ]);
                break;

            case $request->has('baslik'):
                $about->update([
                   'baslik' => $request->baslik
                ]);
                break;

            case $request->has('keywords'):
                $about->update([
                   'keywords' => $request->keywords
                ]);
                break;

            case $request->has('icerik'):
                $about->update([
                   'icerik'  => $request->icerik
                ]);
                break;

        }

        alert()->success('Güncelleme başarılı');
        return redirect()->back();
    }
}
