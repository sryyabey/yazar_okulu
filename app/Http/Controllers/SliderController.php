<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;
use File;

class SliderController extends Controller
{
    public function index(){

        $sliders=slider::all();
        return view('admin.icerik.slider',compact('sliders'));
    }

    public function save(Request $request){


        $this->validate($request,[
           'ad_white' => 'required',
           'ad_red'   => 'required',
           'buton_ad' => 'required',
           'icerik'   => 'required',
           'img'      => 'max:2048 |mimes:jpg,jpeg,gif'

        ]);


        $slider= slider::create([
            'ad_white' => $request->ad_white,
            'ad_red'   => $request->ad_red,
            'buton_ad' => $request->buton_ad,
            'aciklama' => $request->icerik,
            'aktif'    => 0
        ]);

        if ($request->has('img')){
            $file = request()->file('img');
            $name =time().'.'.rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img/slider',$name);

            $slider->update([
                'img'  => $name
            ]);
        }

        alert()->success('Slider kaydı başarılı');
        return redirect()->back();
    }

    public function slider_update($id)
    {

        $slider =slider::findOrFail($id);

        return view('admin.icerik.slider_update',compact('slider'));
    }

    public function update(Request $request)
    {
        $slider = slider::find($request->id);

        switch ($request){
            case $request->has('img'):
                $file = request()->file('img');
                $name =time().'.'.rand(1111, 9999).'.'.$file->getClientOriginalExtension();
                request()->file('img')->move('img/slider',$name);
                $file_path= public_path().'/img/slider/'.$slider->img;

                if (file_exists($file_path)){
                    // unlink(public_path("img/".$kursu_sil->img));
                    File::delete($file_path);
                }
                $slider->update([
                    'img'  => $name
                ]);
                break;
            case $request->has('white'):
                $slider->update([
                   'ad_white' => $request->white
                ]);
                break;

            case $request->has('red'):
                $slider->update([
                    'ad_red' => $request->red
                ]);
                break;

            case $request->has('buton'):
                $slider->update([
                    'buton_ad' => $request->buton
                ]);
                break;

            case $request->has('aciklama'):
                $slider->update([
                    'aciklama' => $request->aciklama
                ]);
                break;




        }

        alert()->success('Güncelleme Başarılı');
        return redirect()->back();
    }

    public function aktive($id){

        $slider= slider::find($id);

        if ($slider->aktif == 0){
            $slider->update([
               'aktif' => 1
            ]);
        }else{
            $slider->update([
               'aktif' => 0
            ]);
        }


        alert()->success('Slider güncellendi');
        return redirect()->back();
    }

    public function delete($id){

        $slider = slider::find($id);

        $file_path= public_path().'/img/slider/'.$slider->img;

        if (file_exists($file_path)){
            // unlink(public_path("img/".$kursu_sil->img));
            File::delete($file_path);
        }
        $slider->delete();

        return redirect()->route('admin.icerik.slider');
    }


}
