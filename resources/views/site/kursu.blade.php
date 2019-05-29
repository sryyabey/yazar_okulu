@extends('layouts.master')

@section('title')
          {{$kursu->slug}}
@endsection
@section('keyword')
     {{$kursu->keywords}}
@endsection
@section('description')
    {{$kursu->icerik}}
@endsection

@section('content')

    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <img src="{{asset('img')}}/{{$kursu->img}}" alt="">
                            <h2>{{$kursu->kursu_adi}}</span></h2>
                            <p style="text-align: left">{!! $kursu->icerik !!}</p>
                        </div>
                    </div>

            </div>
        </div>
    </section>
@endsection