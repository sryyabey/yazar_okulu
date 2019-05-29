<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','AnasayfaController@anasayfa')->name('anasayfa');
Route::get('/blank','AnasayfaController@blank')->name('blank');
Route::get('home', function (){
      return redirect()->route('admin.home');
});

Route::post('user_save','SiteCrudController@user_save')->name('user_save');

Route::get('cikisyap','\App\Http\Controllers\Auth\LoginController@logout')->name('cikisyap');

Route::group(["prefix"=>"site"], function (){
   Route::get('iletisim','SiteController@iletisim')->name('site.iletisim');
   Route::post('contact_form','SiteCrudController@contact_form')->name('site.contact_form');
   Route::get('hakkimizda','SiteController@hakkimizda')->name('site.hakkimizda');

   Route::get('profil','ProfilController@index')->name('site.profil');
   Route::post('profil_update','ProfilController@update')->name('site.profil_update');


   Route::get('program_katil/{id}','ProgramKatilController@index')->name('site.program_katil');
   Route::post('katil','ProgramKatilController@katil')->name('site.katil');

   Route::get('programlar','SiteController@programlar')->name('site.programlar');

   Route::get('slider/{id}','SiteController@slider')->name('site.slider');
   Route::get('egitimciler','SiteController@egitimciler')->name('site.egitimciler');
   Route::get('kursu/{id}','SiteController@kursu')->name('site.kursu');
   Route::get('yayin/{id}','SiteController@yayin')->name('site.yayin');
   Route::get('yayinlar','SiteController@yayinlar')->name('site.yayinlar');

   Route::get('about/{slug}','SiteController@about')->name('site.about');
   Route::get('kursuler','SiteController@kursuler')->name('site.kursuler');

   Route::post('teacher_save','SiteCrudController@teacher_save')->name('site.teacher_save');
   Route::post('student_save','SiteCrudController@student_save')->name('site.student_save');

});

Route::group(["prefix"=>"admin"], function (){
    Route::get('home','AdminController@home')->name('admin.home');
    Route::get('blank','AdminController@blank')->name('admin.blank');

    Route::group(["prefix"=>"kursu"], function () {

        Route::get('new_kursu', 'KursuController@new_kursu')->name('admin.kursu.new_kursu');
        Route::post('kursu_kayit', 'KursuController@kursu_kayit')->name('admin.kursu.kursu_kayit');
        Route::get('kursu_sil/{id}', 'KursuController@kursu_sil')->name('admin.kursu.kursu_sil');
        Route::get('kursu_duzenle/{id}', 'KursuController@kursu_duzenle')->name('admin.kursu.kursu_duzenle');
        Route::post('kursu_update', 'KursuController@kursu_update')->name('admin.kursu.kursu_update');

        Route::get('alt_kursu', 'KursuController@alt_kursu')->name('admin.kursu.alt_kursu');
        Route::post('alt_kursu_kayit', 'KursuController@alt_kursu_kayit')->name('admin.kursu.alt_kursu_kayit');
        Route::get('alt_kursu_duzenle/{id}','KursuController@alt_kursu_duzenle')->name('admin.kursu.alt_kursu_duzenle');
        Route::get('alt_kursu_sil/{id}','KursuController@alt_kursu_sil')->name('admin.kursu.alt_kursu_sil');
        Route::post('alt_kursu_update','KursuController@alt_kursu_update')->name('admin.kursu.alt_kursu_update');

        Route::get('add_program','KursuController@add_program')->name('admin.kursu.add_program');
        Route::post('save_program','KursuController@save_program')->name('admin.kursu.save_program');


        Route::get('programs','KursuController@programs')->name('admin.kursu.programs');
        Route::get('program_onizle/{id}','KursuController@program_onizle')->name('admin.kursu.program_onizle');
        Route::get('program_del/{id}','KursuController@program_del')->name('admin.kursu.program_del');

        Route::post('program_update','ProgramsController@update')->name('admin.kursu.program_update');
    });

    Route::group(["prefix"=>"teacher"], function () {
        Route::get('new_teacher','TeacherController@new_teacher')->name('admin.teacher.new_teacher');
        Route::post('save_teacher','TeacherController@save_teacher')->name('admin.teacher.save_teacher');

        Route::get('teachers','TeacherController@teachers')->name('admin.teacher.teachers');
        Route::get('update/{id}','TeacherController@update')->name('admin.teacher.update');
        Route::post('guncelle','TeacherController@guncelle')->name('admin.teacher.guncelle');

        Route::get('delete/{id}','TeacherController@delete')->name('admin.teacher.delete');
        Route::post('image_update','TeacherController@image_update')->name('admin.teacher.image_update');
        Route::get('teachers_onay/{id}','TeacherController@onay')->name('admin.teacher.teacher_onay');

    });

    Route::group(["prefix"=>"students"], function () {
        Route::get('add','StudentController@add')->name('admin.students.add');
        Route::post('save','StudentController@save')->name('admin.students.save');
        Route::get('students','StudentController@students')->name('admin.students.students');

        Route::get('profile/{id}','StudentController@profile')->name('admin.students.profile');
        Route::get('onay/{id}','StudentController@onay')->name('admin.students.onay');
        Route::post('update','StudentController@update')->name('admin.students.update');
        Route::post('img','StudentController@img')->name('admin.students.img');

    });

    Route::group(["prefix" => "icerik"], function (){
        //slider kontrol
        Route::get('slider','SliderController@index')->name('admin.icerik.slider');
        Route::post('slide_save','SliderController@save')->name('admin.icerik.slide_save');
        Route::get('slider_update/{id}','SliderController@slider_update')->name('admin.icerik.slider_update');
        Route::post('slider_tahdis','SliderController@update')->name('admin.icerik.slider_tahdis');
        Route::get('slide_aktive/{id}','SliderController@aktive')->name('admin.icerik.slide_aktive');
        Route::get('slider_delete/{id}','SliderController@delete')->name('admin.icerik.slider_delete');

        // yayınlar kontrol
        Route::get('yayinlar','YayinlarController@index')->name('admin.icerik.yayinlar');
        Route::post('save','YayinlarController@save')->name('admin.icerik.save');
        Route::get('yayin_update/{id}','YayinlarController@yayin_update')->name('admin.icerik.yayin_update');
        Route::post('update','YayinlarController@update')->name('admin.icerik.update');
        Route::get('aktive/{id}','YayinlarController@aktive')->name('admin.icerik.aktive');
        Route::get('yayin_sil/{id}','YayinlarController@delete')->name('admin.icerik.yayin_sil');

        // haber duyuru kontrol
        Route::get('news','NewsController@index')->name('admin.icerik.news');
        Route::post('news_save','NewsController@save')->name('admin.icerik.news_save');
        Route::get('news_aktive/{id}','NewsController@aktive')->name('admin.icerik.news_aktive');
        Route::get('news_update/{id}','NewsController@news_update')->name('admin.icerik.news_update');
        Route::post('news_tahdis','NewsController@tahdis')->name('admin.icerik.news_tahdis');

        // galeri ekle kaldır
        Route::get('galery','GaleriController@index')->name('admin.icerik.galeri');
        Route::post('galeri_save','GaleriController@save')->name('admin.icerik.galeri_save');
        Route::post('galeri_update','GaleriController@update')->name('admin.icerik.galeri_update');
        Route::get('galeri_delete/{id}','GaleriController@delete')->name('admin.icerik.galeri_delete');
        Route::post('video_update','GaleriController@video_update')->name('admin.icerik.video_update');
        Route::get('video_delete/{id}','GaleriController@video_delete')->name('admin.icerik.video_delete');

        // hakkımızda menüsü
        Route::get('aboutus_menu','AboutusController@index')->name('admin.icerik.aboutus_menu');
        Route::post('aboutus_save','AboutusController@save')->name('admin.icerik.aboutus_save');
        Route::get('aboutus_update/{id}','AboutusController@update')->name('admin.icerik.aboutus_update');
        Route::post('aboutus_tahdis','AboutusController@tahdis')->name('admin.icerik.aboutus_tahdis');


    });

    Route::group(["prefix" => "programs"], function () {
        Route::get('katilim','KatilimController@katilim')->name('admin.programs.katilim');
        Route::get('katilim_onizle/{id}','KatilimController@onizle')->name('admin.programs.katilim_onizle');
        Route::get('print/{id}','KatilimController@print')->name('admin.programs.print');
        Route::get('ekle/{id}','KatilimController@ekle')->name('admin.programs.ekle');
        Route::post('add_katilim','KatilimController@add_katilim')->name('admin.programs.add_katilim');
        Route::get('delete_katilimci/{id}','KatilimController@delete_katilimci')->name('admin.programs.delete_katilimci');

    });

    Route::group(["prefix" => "message"], function () {
        Route::get('inbox','MessageController@inbox')->name('admin.message.inbox');
        Route::get('message/{id}','MessageController@message')->name('admin.message.message');

    });
});

Auth::routes();

