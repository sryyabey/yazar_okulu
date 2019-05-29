<?php

namespace App\Http\Controllers;

use App\Models\main_kursu;
use App\Models\program_katil;
use App\Models\program_pivot;
use App\Models\programs;
use App\Models\students;
use App\User;
use PhpParser\Node\Stmt\Break_;
use Illuminate\Http\Request;
use App\Models\about_us;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }
    public function index(){


        $kursus= main_kursu::all();

        $id = auth()->user()->id;
        $student =students::where('user_id','like',$id);
        $programs= programs::all();
        $programs->sortByDesc('tarih');
        $abouts=about_us::all();


        return view('site.profil',compact('kursus','student','programs','abouts'));
    }

    public function update(Request $request)
    {
        $user= User::find($request->id);
        $student= students::find($user->student->id);

        switch ($request){
            // resim update
            case $request->has('img'):
                $file = request()->file('img');
                $name =time().'.'.rand(1111, 9999).'.'.$file->getClientOriginalExtension();
                request()->file('img')->move('img',$name);
                $file_path= public_path().'/img/'.$student->img;
                unlink($file_path);
                $student->update([
                    'img'  => $name
                ]);
                break;

             // sosyal linkler
            case $request->has('facebook'):
                $student->update([
                   'facebook'  => $request->facebook,
                   'instagram' => $request->instagram,
                   'twitter'   => $request->twitter
                ]);
                break;

             // ad soyad güncelleme
            case $request->has('ad'):
                $student->update([
                   'ad'    => $request->ad,
                   'soyad' => $request->soyad
                ]);
                $user->update([
                   'name' => $student->ad." ".$student->soyad
                ]);
                break;

             // email güncelleme
            case $request->has('email'):
                $student->update([
                   'email' => $request->email
                ]);
                $user->update([
                    'email' => $request->email
                ]) ;
                break;

             // telefon update
            case $request->has('telefon'):
                $student->update([
                   'telefon'  => $request->telefon
                ]);
                break;

            // birthday update
            case $request->has('birthday'):
                $student->update([
                   'birthday'  => $request->birthday
                ]);
                break;

             // adres update
            case $request->has('adres'):
                $student->update([
                   'adres'  => $request->adres
                ]);
                break;

            // tc update
            case $request->has('tc'):
                $student->update([
                   'tc'  => $request->tc
                ]);
                break;


        }





        alert()->success('Güncelleme Başarılı',$user->name);
        return redirect()->back();
    }
}
