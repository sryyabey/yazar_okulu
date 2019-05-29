@extends('layouts.master')

@section('title')
   {{$about->baslik}}
@endsection
@section('keyword')
    {{$about->keywords}}
@endsection
@section('description')
    {{$about->baslik}}
@endsection

@section('content')

    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <img src="{{asset('img')}}/{{$about->img}}" width="500" alt="">
                            <h2>{{$about->baslik}}</h2>
                            <p>
                                {!! $about->icerik !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
    </section>
@endsection