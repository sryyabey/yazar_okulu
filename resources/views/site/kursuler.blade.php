@extends('layouts.master')

@section('title','Kürsüler')

@section('content')

    <h2 class="text-center">Tüm Kürsü ve Bölümler</h2>
    <hr>
    <div class="container">
    <div class="row mt-2">
        @foreach($kursus as $kursu)
        <div class="col-md-12">
            <div class="home-top-cour">
                <!--POPULAR COURSES IMAGE-->
                <div class="col-md-3"> <img src="{{asset('img')}}/{{$kursu->img}}" alt=""> </div>
                <!--POPULAR COURSES: CONTENT-->
                <div class="col-md-9 home-top-cour-desc">
                    <a href="course-details.html">
                        <h2c>{{$kursu->kursu_adi}}</h2c>
                    </a>

                    <p>{!! $kursu->icerik !!}</p> <span class="home-top-cour-rat">4.2</span>
                    <h3 class="text-center">Bölümler</h3>
                    <ul class="list-group">
                        @foreach($kursu->alt_kursu as $bolum)
                            <li class="list-group-item">{{$bolum->baslik}}</li>
                        @endforeach
                    </ul>
                    <div class="hom-list-share">
                        <ul>
                            <li><a href="{{route('site.kursu',$kursu->id)}}"><i class="fa fa-bar-chart" aria-hidden="true"></i> Kürsü hakkında</a> </li>
                            <li><a href=""><i class="fa fa-puzzle-piece" aria-hidden="true"></i>{{count($kursu->alt_kursu)}} Bölüm Adedi</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    </div>

@endsection