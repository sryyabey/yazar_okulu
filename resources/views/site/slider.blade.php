@extends('layouts.master')

@section('title')
  {{$slider->ad_white}} {{$slider->ad_red}}
@endsection

@section('content')

    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">

                                    <img src="{{asset('img/slider')}}/{{$slider->img}}" width="500" alt="">



                                    <h2>{{$slider->ad_white}} <span> {{$slider->ad_red}}</span></h2>

                                    <p>
                                        {!! $slider->aciklama !!}
                                    </p>




                        </div>
                    </div>

            </div>
        </div>
    </section>
@endsection