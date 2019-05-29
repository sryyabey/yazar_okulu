@extends('layouts.master')

@section('title','Hakkımızda')

@section('content')


    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Yazar Okulumuz <span> Hakkında</span></h2>
                            @foreach($abouts as $key => $about)
                                @if($key == 0)
                            <p>{!! $about->icerik !!}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="ed-about-sec1">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
