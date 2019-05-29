@extends('layouts.master')

@section('title')
        {{$yayin->baslik}}
@endsection

@section('content')

    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <a class="btn btn-success btn-block" href="{{route('site.yayinlar')}}">Tüm yayınlarımız</a>
                            <br>
                            <br>

                            <img src="{{asset('img/yayinlar')}}/{{$yayin->img}}" width="500" alt="">
                            <hr>


                            <h2> {{$yayin->baslik}}</h2>

                            <p>
                                {!! $yayin->icerik !!}
                            </p>




                        </div>
                    </div>

                </div>
            </div>
    </section>

@endsection