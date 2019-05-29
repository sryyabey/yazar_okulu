@extends('layouts.master')

@section('title','Denizli Yazar Okulu')

@section('content')


    <section style="margin-top: 2px;">



        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Wrapper for slides-->
            <div class="carousel-inner">

                @foreach($sliders as $key => $slider)
                <div class="item
                @if($key == 0)
                   active
                @endif
                     ">
                    <img src="{{asset('img/slider')}}/{{$slider->img}}"  alt="">
                    <div class="carousel-caption slider-con">
                        <h2>{{$slider->ad_white}}<span>{{$slider->ad_red}}</span></h2>
                        <p>{{str_limit($slider->aciklama,200)}}</p>
                        <a href="{{route('site.slider',$slider->id)}}" class="bann-btn-1">{{$slider->buton_ad}}</a><a href="{{route('site.slider',$slider->id)}}" class="bann-btn-2">Devamı ...</a>
                    </div>
                </div>
                @endforeach


            </div>

            <!-- Left and right controls-->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-chevron-left slider-arr"></i>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-chevron-right slider-arr"></i>
            </a>
        </div>

    </section>

    <!-- QUICK LINKS -->
    <section>
        <div class="container">
            <div class="row">
                <div class="wed-hom-ser">
                    <ul>
                        <li>
                            <a href="awards.html" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="images/icon/h-ic1.png" alt=""> Akademi</a>
                        </li>
                        <li>
                            <a href="{{route('site.egitimciler')}}" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="images/icon/h-ic2.png" alt=""> Eğitimiciler</a>
                        </li>
                        <li>
                            <a href="{{route('site.programlar')}}" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="images/icon/h-ic4.png" alt=""> Programlar</a>
                        </li>
                        <li>
                            <a href="seminar.html" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="images/icon/h-ic3.png" alt=""> Seminerler</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- DISCOVER MORE -->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <h2>Daha Fazlasını <span>Keşfet</span></h2>
                    <p>Kürsülerimiz ve Bölümlerimiz hakkında genel bilgiler</p>
                </div>
            </div>
            <div class="row">
                <div class="ed-course">
                    @foreach($kursus as $kursu)
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="ed-course-in">
                            <a class="course-overlay" href="{{route('site.kursu',$kursu->id)}}">
                                <img src="{{asset('img')}}/{{$kursu->img}}" alt="">
                                <span>{{$kursu->kursu_adi}}</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- POPULAR COURSES -->
    <section class="pop-cour">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <h2>Yaklaşan <span>Programlar</span></h2>
                    <p>Yaklaşan Programlar programlara katılım ve genel bilgiler</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <!--Programlar başlangıç-->
                        @foreach($programs as $key => $program)
                            @if($key <= 3 )
                        <div class="home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="col-md-3"> <img src="{{asset('img')}}/{{$program->img}}" alt=""> </div>
                            <!--POPULAR COURSES: CONTENT-->
                            <div class="col-md-9 home-top-cour-desc">
                                <a href="course-details.html">
                                    <h3>{{$program->slug}}</h3>
                                </a>
                                <h4>{{$program->keywords}}</h4>
                                <p>{!! str_limit($program->konu, 75) !!}</p> <span class="home-top-cour-rat" title="Tarih">{{$program->tarih}}</span>
                                <div class="hom-list-share">
                                    <ul>
                                        <li><a href="{{route('site.program_katil',$program->id)}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Katıl</a> </li>
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$program->end_date}}</a> </li>
                                        <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> 0/{{$program->kontenjan}}</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            @endif
                        @endforeach
                        <!--Programs sonu-->

                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <!--Programlar başlangıç-->
                        @foreach($programs as $key => $program)
                            @if($key > 3)
                                <div class="home-top-cour">
                                    <!--POPULAR COURSES IMAGE-->
                                    <div class="col-md-3"> <img src="{{asset('img')}}/{{$program->img}}" alt=""> </div>
                                    <!--POPULAR COURSES: CONTENT-->
                                    <div class="col-md-9 home-top-cour-desc">
                                        <a href="course-details.html">
                                            <h3>{{$program->slug}}</h3>
                                        </a>
                                        <h4>{{$program->keywords}}</h4>
                                        <p>{!! str_limit($program->konu, 75) !!}</p> <span class="home-top-cour-rat" title="Tarih">{{$program->tarih}}</span>
                                        <div class="hom-list-share">
                                            <ul>
                                                <li><a href="{{route('site.program_katil',$program->id)}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Katıl</a> </li>
                                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$program->end_date}}</a> </li>
                                                <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> 0/{{$program->kontenjan}}</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                    <!--Programs sonu-->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UPCOMING EVENTS -->
    <section>
        <div class="container com-sp pad-bot-0">
            <div class="row">
                <div class="col-md-4">
                    <!--<div class="ho-ex-title">
                            <h4>Upcoming Event</h4>
                        </div>-->
                    <div class="ho-ev-latest ho-ev-latest-bg-1">
                        <div class="ho-lat-ev">
                            <a href="{{route('site.programlar')}}"> <h4>Etkinlik & Programlar</h4></a>
                            <p> Yaklaşan Programlar ve kayıt için takip edin</p>
                        </div>
                    </div>
                    <div class="ho-event ho-event-mob-bot-sp">
                        <ul>
                            @foreach($programs as $program)
                                @if($program->tarih > date('Y-m-d'))
                            <li>
                                <div class="ho-ev-date"><span>{{date('d', strtotime($program->tarih))}}</span><span>{{date('m-Y', strtotime($program->tarih))}}</span>
                                </div>
                                <div class="ho-ev-link">
                                    <a href="{{route('site.program_katil',$program->id)}}">
                                        <h4>{{$program->slug}}</h4>
                                    </a>
                                    <p>Eğitimci : {{$program->egitimci->ad}} {{$program->egitimci->soyad}} </p>
                                    <p>Konu: {!! str_limit($program->konu, 75) !!}</p>
                                    <span>{{date('m-Y', strtotime($program->start_date))}} – {{date('m-Y', strtotime($program->end_date))}}</span>
                                </div>
                            </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--<div class="ho-ex-title">
                            <h4>Upcoming Event</h4>
                        </div>-->
                    <div class="ho-ev-latest ho-ev-latest-bg-2">
                        <div class="ho-lat-ev">
                            <a href="{{route('site.yayinlar')}}"> <h4>Yayınlarımız</h4> </a>
                            <p>Tüm yayınlarımız geçmiş yayınlar ve daha fazlası için tıklayın.</p>
                        </div>
                    </div>
                    <div class="ho-event ho-event-mob-bot-sp">
                        <ul>
                            @foreach($yayinlar as $yayin)
                                @if($yayin->tarih > date('Y-m-d'))
                            <li>
                                <div class="ho-ev-img"><img src="{{asset('img/yayinlar')}}/{{$yayin->img}}" alt="">
                                </div>
                                <div class="ho-ev-link">
                                    <a href="{{route('site.yayin',$yayin->id)}}">
                                        <h4>{{$yayin->baslik}}</h4>
                                    </a>
                                    <p>{{str_limit($yayin->icerik, 150)}}</p>
                                    <span>Yayın Tarihi: {{date('d-m-Y',strtotime($yayin->tarih))}}</span>
                                </div>
                            </li>
                                @endif
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--<div class="ho-ex-title">
                            <h4>Upcoming Event</h4>
                        </div>-->
                    <div class="ho-ev-latest ho-ev-latest-bg-3">
                        <div class="ho-lat-ev">
                            <h4>Eğitimci Olun!</h4>
                            <p>Eğitim verebileceğiniz konu varsa eğitimcimiz olun. Bize ulaşın!</p>
                        </div>
                    </div>
                    <div class="ho-st-login">
                        <ul class="tabs tabs-hom-reg">
                            <li class="tab col s12"><a href="#hom-vijay">Eğitimci Kayıt Formu</a>
                            </li>

                        </ul>
                        <div id="hom-vijay" class="col s12">
                            <form class="col s12" method="post" action="{{route('site.teacher_save')}}">
                                {{csrf_field()}}


                                 <select name="bolum" id="kursu" class="form-control" required>
                                        <option value="">Kürsü Seçin</option>
                                     @foreach($kursus as $kursu)
                                        <option value="{{$kursu->id}}" >{{$kursu->kursu_adi}}</option>
                                     @endforeach
                                </select>

                                <select name="bolum" id="bolum" class="form-control mt-1" required>

                                    @foreach($alt_kursus as $bolum)
                                        <option value="{{$bolum->id}}" data-chained="{{$bolum->main_kursu_id}}" >{{$bolum->baslik}}</option>
                                    @endforeach
                                </select>



                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="ad" type="text" class="validate">
                                        <label>adınız</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="soyad" type="text" class="validate">
                                        <label>soyadınız</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="meslek" type="text" class="validate">
                                        <label>Meslek</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="email" type="text" class="validate">
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="telefon" type="text" class="validate">
                                        <label>Telefon</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <button type="submit" value="Kayıt" class="waves-effect waves-light light-btn btn-block">Kayıt</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS AND EVENTS -->
    <section>
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2>Haber ve  <span>Duyurular</span></h2>
                    <p>Yazar okulumuza ait duyuru ve haberler.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="bot-gal h-gal ho-event-mob-bot-sp">
                        <h4>Foto Galeri</h4>
                        <ul>
                            @foreach($galeri_resims as $resim)
                            <li><img class="materialboxed" data-caption="{{$resim->baslik}}" src="{{asset('img/galeri')}}/{{$resim->img}}" alt="">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">

                        <h4>Video Galeri</h4>



                    <iframe width="0" height="0" src="https://youtu.be/gdsT26gysDo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @foreach($galeri_videos as $video)
                    <iframe src="{{$video->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="bot-gal h-blog ho-event">
                        <h4>Haber & Duyuru</h4>
                        <div class="ho-event">
                            <ul>
                                @foreach($newses as $news)
                                <li>
                                    <div class="ho-ev-date"><span>{{date('d',strtotime($news->tarih))}}</span><span>{{date('m-Y',strtotime($news->tarih))}}</span>
                                    </div>
                                    <div class="ho-ev-link">
                                        <a href="#">
                                            <h4>{{$news->baslik}}</h4>
                                        </a>
                                        <p>{{str_limit($news->icerik,100)}}</p>
                                        <span>{{$news->start_time}} – {{$news->end_time}}</span>
                                    </div>
                                </li>








                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('footer')

    <script>
        $(document).ready(function () {
            $('#bolum').chained('#kursu');
        })
    </script>
@endsection