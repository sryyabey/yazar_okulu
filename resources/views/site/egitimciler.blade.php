@extends('layouts.master')

@section('title')
    Eğitimcilerimiz
@endsection

@section('content')

    <section>

        <div class="row">
            <div class="cor about-sp">
                <div class="ed-rsear">
                    <div class="ed-rsear-in">
                        <ul>
                            @foreach($teachers as $teacher)
                                @if($teacher->onay == 1)
                            <li>
                                <div class="ed-rese-grid">
                                    <div class="ed-rsear-img ed-faci-full-top">
                                        <img src="{{asset('img')}}/{{$teacher->img}}" width="100" alt="">
                                    </div>
                                    <div class="ed-rsear-dec ed-faci-full-bot">
                                        <h4><a href="facilities-detail.html">{{$teacher->ad}} {{$teacher->soyad}}</a></h4>
                                        <p>{!! $teacher->icerik !!}</p>
                                        <!-- <a href="facilities-detail.html" class="read-line-btn"></a> -->
                                    </div>
                                </div>
                            </li>
                                @endif
                                @endforeach

                        </ul>
                    </div>
                </div>
                <div class="ed-about-sec1">
                    <div class="col-md-6"></div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
    </section>


@endsection