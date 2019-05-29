<?php

namespace App\Http\Controllers;

use App\Models\contact_form;
use App\Models\students;
use App\Models\teacher;
use App\User;
use Dotenv\Validator;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SiteCrudController extends Controller
{
    public function user_save(Request $request){

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


        alert()->success('Üyeliğiniz Onaylandıktan Sonra Hesabınız Açılacaktır!', $user->name)->autoclose(15000);

        return redirect()->back();
    }

    public function contact_form(Request $request)
    {
        $contact = contact_form::create([
           'ad'      => $request->ad,
           'telefon' => $request->telefon,
           'email'   => $request->email,
           'city'    => $request->city,
           'icerik'  => $request->icerik,
           'durum'   => 0
        ]);

        alert()->success('Bizimle iletişim kuruduğunuz için teşekkürler mesajınız en kısa zamanda değerlendirilecektir!',$request->ad)->autoclose(30000);
        return redirect()->back();
    }

    public function teacher_save(Request $request){


        $teacher = teacher::create([
           'alt_kursu_id' => $request->bolum,
           'ad'           => $request->ad,
           'soyad'        => $request->soyad,
           'brans'        => $request->meslek,
           'email'        => $request->email,
           'telefon'      => $request->telefon,
           'onay'         => 0
        ]);

        alert()->success('En kısa Sürede sizinle irtibata geçeceğiz','Eğitimci kaydınız alınmıştır ')->autoclose(5000);
        return redirect()->back();

    }

    public function student_save(Request $request){

        $this->validate($request,[
            'ad'    => 'required',
            'soyad' => 'required',
            'email' => 'required|unique:students',
            'telefon' => 'required'
        ]);

        $student= students::create([
           'ad'    => $request->ad,
           'soyad' => $request->soyad,
           'email' => $request->email,
           'telefon' => $request->telefon,
           'onay'   => 0
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

        alert()->success('kaydınız başarılı bir şekilde alındı ve Hesap oluşturuldu !', $student->ad)->autoclose(5000);
        return redirect()->back();

    }



}
