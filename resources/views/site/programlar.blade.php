@extends('layouts.master')

@section('title')
  Programlar
@endsection

@section('content')

    <section>
        <div class="container com-sp">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Tüm <span> Programlarımız</span></h2>
                            <p>Tüm programlarımızı bu alanda inceleyip kayıt olabilirsiniz!</p>
                        </div>
                        <div>
                            <div class="ho-event pg-eve-main">
                                <ul>
                                    @foreach($programs as $key =>$program)
                                    <li>
                                        <div class="ho-ev-date pg-eve-date"><span>{{date('d',strtotime($program->tarih))}}</span><span>{{date('m-Y',strtotime($program->tarih))}}</span>
                                        </div>
                                        <div class="ho-ev-link pg-eve-desc">
                                            <a href="{{route('site.program_katil',$program->id)}}">
                                                <h4>{{$program->slug}}</h4>
                                            </a>
                                            <p>{!! str_limit($program->konu, 150) !!}</p>
                                            <span>{{$program->start_date}} – {{$program->end_date}}</span>
                                        </div>
                                        <div class="pg-eve-reg">
                                            <a href="{{route('site.program_katil',$program->id)}}">kaydol</a><a href="#" id="{{$key}}_program">Dahası...</a> <a href="#" style="display: none;" id="{{$key}}_program_kapa">Kapat</a>
                                        </div>
                                        <br>

                                    </li>
                                        <li id="{{$key}}_program_goster" style="display: none">
                                            <img src="{{asset('img')}}/{{$program->img}}" alt="">
                                            <p>
                                                {!! $program->konu !!}
                                            </p>
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

@section('footer')

    @foreach($programs as $key => $program)
        <script>
            $(document).ready(function () {
               $('#{{$key}}_program').click(function () {
                   $('#{{$key}}_program_goster').toggle();
                   $('#{{$key}}_program_kapa').show();
                   $('#{{$key}}_program').hide();
               }) ;

                $('#{{$key}}_program_kapa').click(function () {
                    $('#{{$key}}_program_goster').toggle();
                    $('#{{$key}}_program').show();
                    $('#{{$key}}_program_kapa').hide();
                }) ;
            });
        </script>
    @endforeach

@endsection