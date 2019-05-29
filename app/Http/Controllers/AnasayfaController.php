<?php

namespace App\Http\Controllers;

use App\Models\about_us;
use App\Models\alt_kursu;
use App\Models\galeri;
use App\Models\main_kursu;
use App\Models\news;
use App\Models\programs;
use App\Models\slider;
use App\Models\yayinlar;
use Illuminate\Http\Request;

class AnasayfaController extends Controller
{
    public function anasayfa(){

        $kursus = main_kursu::all();
        $programs = programs::orderByDesc('tarih')->paginate(8);
        $sliders =slider::where('aktif','like',1)->get();
        $yayinlar = yayinlar::where('aktif','like',1)->orderBy('tarih')->paginate(4);
        $newses =news::where('aktif','like',1)->orderBy('tarih')->paginate(4);
        $galeri_resims = galeri::where('cins','like',1)->orderByDesc('id')->paginate(12);
        $galeri_videos= galeri::where('cins','like',0)->orderByDesc('id')->paginate(1);
        $abouts=about_us::all();
        $alt_kursus = alt_kursu::all();

        return view('anasayfa',compact('kursus','alt_kursus','programs','sliders','yayinlar','newses','galeri_resims','galeri_videos','abouts'));
    }

    public function blank(){

        return view('blank');
    }
}
