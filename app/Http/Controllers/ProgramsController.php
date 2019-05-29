<?php

namespace App\Http\Controllers;

use App\Models\programs;
use Illuminate\Http\Request;
use App\Models\main_kursu;
use App\Models\alt_kursu;
use App\Models\teacher;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

        $program= programs::find(request('id'));


        switch (request()){
            case request()->has('egitimci'):
                $program->update([
                   'egitimci_id'  => request('egitimci')
                ]);
                break;
            case request()->has('alt_kursu'):
                $program->update([
                   'alt_kursu'   => request('alt_kursu')
                ]);
                break;
            case request()->has('start_date'):
                $program->update([
                    'start_date'   => request('start_date')
                ]);
            case request()->has('end_date'):
                $program->update([
                    'end_date'   => request('end_date')
                ]);
            case request()->has('tarih'):
                $program->update([
                    'tarih'   => request('tarih')
                ]);
            case request()->has('kontenjan'):
                $program->update([
                    'kontenjan'   => request('kontenjan')
                ]);
            case request()->has('keywords'):
                $program->update([
                    'keywords'   => request('keywords')
                ]);
            case request()->has('icerik'):
                $program->update([
                    'konu'   => request('icerik')
                ]);
            case request()->has('onay'):
                $program->update([
                    'onay'   => request('onay')
                ]);



        }

        $kursus = main_kursu::all();
        $alt_kursus = alt_kursu::all();
        $teachers= teacher::all();



        alert()->success('Güncelleme Başarılı', $program->slug);
        return redirect()->route('admin.kursu.program_onizle', compact('program','kursus','alt_kursus','teachers'));


    }


}
