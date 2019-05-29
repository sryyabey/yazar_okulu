<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\teacher;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');



    }

    public function add()
    {
        $students= students::orderBy('ad','soyad','telefon','email')->paginate(8);

        return view('admin.students.add', compact('students'));
    }

    public function save(){

        $this->validate(\request(),[
            'ad'       => 'required',
            'soyad'    => 'required',
            'email'    => 'required',
            'telefon'  => 'required'
        ]);

        $student = students::create([
            'ad'       => request('ad'),
            'soyad'    => request('soyad'),
            'email'    => request('email'),
            'telefon'  => request('telefon'),
            'meslek'   => request('meslek'),
            'birthday' => request('birthday'),
            'tc'       => request('tc'),
            'onay'     => 0
        ]);




        $user= User::create([
            'name' => $student->ad." ".$student->soyad,
            'email' => $student->email,
            'password' => Hash::make(request('sifre')),
            'yetki'    => 1
        ]);

        $student->update([
           'user_id'  => $user->id
        ]);


        if (request()->has('img')){

            $file = request()->file('img');
            $name =time().'.'.rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img',$name);

            $student->update([
                'img'  => $name
            ]);

        }


        $students= students::orderBy('ad','soyad','telefon','email')->paginate(8);
        alert()->success('kaydınız başarılı bir şekilde alındı ve Hesap oluşturuldu !', $student->ad);
        return redirect()->route('admin.students.add',compact('students'));

    }

    public function students(){
        if (\auth()->user()->yetki != 4){
            alert()->warning('Bu alana giriş yetkini yok');
            return redirect()->route('anasayfa');
        }

        $students=students::all();

        return view('admin.students.students',compact('students'));
    }

    public function profile($id){
        if (\auth()->user()->yetki != 4){
            alert()->warning('Bu alana giriş yetkini yok');
            return redirect()->route('anasayfa');
        }

        $student =students::find($id);


        return view('admin.students.profile',compact('student'));
    }

    public function onay($id){

        $student = students::find($id);

        if ($student->onay == 0){
            $student->update([
                'onay'  => 1
            ])  ;
        }
        elseif ($student->onay ==1){
                 $student->update([
                    'onay' => 0
                 ]);
        }

        alert()->success('Kayıt Onaylandı !', $student->ad." ".$student->soyad);
        return redirect()->back();
    }

    public function update(){

        $student = students::find(request('id'));

        $student->update([
            'ad'       => request('ad'),
            'soyad'    => request('soyad'),
            'email'    => request('email'),
            'telefon'  => request('telefon'),
            'meslek'   => request('meslek'),
            'birthday' => request('birthday'),
            'tc'       => request('tc'),

        ]);


        alert()->success('Güncelleme Başarılı !', $student->ad." ".$student->soyad);
        return redirect()->back();
    }

    public function img()
    {

       $student =students::find(request('id'));

        if (request()->has('img')){

            $file = request()->file('img');
            $name =time().'.'.rand(1111, 9999).'.'.$file->getClientOriginalExtension();
            request()->file('img')->move('img',$name);

            $student->update([
                'img'  => $name
            ]);

        }

        alert()->success('Profil Resmi Güncelleme Başarılı !', $student->ad." ".$student->soyad);
        return redirect()->back();
    }

}
