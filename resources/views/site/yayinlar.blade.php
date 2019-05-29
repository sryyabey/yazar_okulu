@extends('layouts.master')

@section('title')
    Tüm yayınlar
@endsection

@section('content')


    <section>
        <div class="container com-sp">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Tüm <span> Yayınlarımız</span></h2>
                            <p>Tüm yayınlarımızı bu alanda inceleyebilirsiniz!</p>
                        </div>
                        <div>
                            <div class="ho-event pg-eve-main">
                                <ul>
                                      @foreach($yayinlar as $yayin)
                                        <li>
                                            <img src="{{asset('img/yayinlar')}}/{{$yayin->img}}" width="150" alt="">
                                            <div class="ho-ev-link pg-eve-desc">
                                                <a href="">
                                                    <h4>{{$yayin->baslik}}</h4>
                                                </a>
                                                <p>{!! str_limit($yayin->icerik) !!}</p>
                                                <span>Yayın Tarihi: {{date('d-m-Y',strtotime($yayin->tarih))}}</span>
                                            </div>
                                            <div class="pg-eve-reg">
                                                <a href="{{route('site.yayin',$yayin->id)}}">Önizle</a>
                                            </div>
                                            <br>

                                        </li>
                                          @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="pg-pagina">
                            <!--
                            <ul class="pagination">
                                 <li class="disabled"><a href="#!"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                 <li class="active"><a href="#!">1</a></li>
                                 <li class="waves-effect"><a href="#!">2</a></li>
                                 <li class="waves-effect"><a href="#!">3</a></li>
                                 <li class="waves-effect"><a href="#!">4</a></li>
                                 <li class="waves-effect"><a href="#!">5</a></li>
                                 <li class="waves-effect"><a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                             </ul>
                             -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
