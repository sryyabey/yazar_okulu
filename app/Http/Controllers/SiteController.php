<?php

namespace App\Http\Controllers;

use App\Models\about_us;
use App\Models\main_kursu;
use App\Models\programs;
use App\Models\slider;
use App\Models\teacher;
use App\Models\yayinlar;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function iletisim(){

        $kursus =main_kursu::all();
        $abouts=about_us::all();
        $programs = programs::orderByDesc('tarih')->paginate(8);

        return view('site.iletisim',compact('kursus','abouts','programs'));
    }

    public function hakkimizda(){

        $kursus =main_kursu::all();
        $abouts=about_us::all();
        $programs = programs::orderByDesc('tarih')->paginate(8);

        return view('site.hakkimizda',compact('kursus','abouts','programs'));
    }

    public function programlar()
    {
        $programs = programs::all();
        $kursus =main_kursu::all();
        $abouts=about_us::all();
        return view('site.programlar', compact('kursus','programs','abouts'));
    }

    public function slider($id)
    {
        $slider = slider::find($id);
        $kursus =main_kursu::all();
        $abouts=about_us::all();
        $programs = programs::orderByDesc('tarih')->paginate(8);
        return view('site.slider',compact('kursus','slider','abouts','programs'));

    }

    public function egitimciler(){

        $teachers =teacher::all();
        $abouts=about_us::all();
        $programs = programs::orderByDesc('tarih')->paginate(8);
        $kursus = main_kursu::all();
        return view('site.egitimciler',compact('kursus','teachers','abouts','programs'));
    }

    public function kursu($id)
    {
        $kursu=main_kursu::find($id);
        $kursus = main_kursu::all();
        $abouts=about_us::all();
        $programs = programs::orderByDesc('tarih')->paginate(8);

        return view('site.kursu',compact('kursus','kursu','abouts','programs'));

    }

    public function yayin($id){

        $yayin = yayinlar::find($id);
        $kursus = main_kursu::all();
        $abouts=about_us::all();
        $programs = programs::orderByDesc('tarih')->paginate(8);
        return view('site.yayin',compact('kursus','yayin','abouts','programs'));
    }

    public function yayinlar()
    {
        $yayinlar= yayinlar::orderByDesc('tarih')->get();
        $kursus=main_kursu::all();
        $abouts=about_us::all();
        $programs = programs::orderByDesc('tarih')->paginate(8);
        return view('site.yayinlar',compact('kursus','yayinlar','abouts','programs'));
    }

    public function about($slug){

        $kursus=main_kursu::all();
        $abouts=about_us::all();
        $about=about_us::where('slug','like',$slug)->first();
        $programs = programs::orderByDesc('tarih')->paginate(8);

        return view('site.about',compact('about','kursus','abouts','slug','programs'));
    }

    public function kursuler(){

        $kursus=main_kursu::all();
        $abouts=about_us::all();

        $programs = programs::orderByDesc('tarih')->paginate(8);

        return view('site.kursuler', compact('kursus','abouts','programs'));
    }
}
