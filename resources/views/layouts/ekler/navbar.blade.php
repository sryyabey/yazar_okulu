




<section>
    <!-- TOP BAR -->
    <div class="ed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ed-com-t1-left">
                        <ul>
                            <li><a href="#">Adres: Pelitlibağ Mh., İstiklal Cd., No: 155-157, Pamukkale, Denizli</a>
                            </li>
                            <li><a href="#">Telefon: +90 258 241 07 46</a>
                            </li>
                        </ul>
                    </div>
                    <div class="ed-com-t1-right">
                        <ul>
                            @guest()
                                <li><a href="#" data-toggle="modal" data-target="#modal1">Giriş</a>
                                </li>

                                <li><a href="#" data-toggle="modal" data-target="#modal2">kayıt</a>
                                </li>
                            @endguest
                            @auth()

                                    <li>
                                        @if(auth()->user()->yetki == 4)
                                            <a class="dropdown-item" href="{{route('admin.home')}}" >
                                                <i class="fa fa-tachometer"></i> Yönetim Paneli
                                                </span>
                                            </a>
                                        @else

                                        <a class="dropdown-item" href="{{route('site.profil')}}" >
        <i class="fa fa-user"></i> Profilim
     </span>
                                        </a>
                                            @endif



                                    </li>


                            @endauth


                         </ul>
                    </div>
                    <div class="ed-com-t1-social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LOGO AND MENU SECTION -->
    <div class="top-logo" data-spy="affix" data-offset-top="250">
        <div class="container">
            <div class="row">
                <div class="col-md-12" >
                    <div class="row" >
                        <div class="col-md-2" >
                            <div class="web-logo">
                                <a href="{{route('anasayfa')}}"><img src="{{asset('img/logo.png')}}" width="100%" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="main-menu">
                                <ul>
                                    <li><a href="{{route('anasayfa')}}">Anasayfa</a>
                                    </li>
                                    <li class="about-menu">
                                        <a href="{{route('site.hakkimizda')}}" class="mm-arr">Hakkımızda</a>
                                        <!-- MEGA MENU 1 -->
                                        <div class="mm-pos">
                                            <div class="about-mm m-menu">
                                                <div class="m-menu-inn">
                                                    <div class="mm1-com mm1-s1">
                                                        <div class="ed-course-in">
                                                            <a class="course-overlay menu-about" href="admission.html">
                                                                <img src="{{asset('images/h-about.jpg')}}" alt="">
                                                                <span>Akademik</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="mm1-com mm1-s2">
                                                        @foreach($abouts as $key => $about)
                                                            @if($key == 0)
                                                            <p>{!! str_limit($about->icerik, 150) !!}</p>
                                                        <a href="{{route('site.about',$about->slug)}}" class="mm-r-m-btn">Devamı ...</a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="mm1-com mm1-s3">
                                                        <ul>
                                                            @foreach($abouts as $about)
                                                            <li><a href="{{route('site.about',$about->slug)}}">{{$about->baslik}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="admi-menu">
                                        <a href="{{route('site.kursuler')}}" class="mm-arr">Kürsüler</a>
                                        <!-- MEGA MENU 1 -->
                                        <div class="mm-pos">
                                            <div class="admi-mm m-menu">
                                                <div class="m-menu-inn">
                                                    @foreach($kursus as $kursu)
                                                        <div class="mm2-com mm1-com mm1-s1">
                                                            <div class="ed-course-in">
                                                                <a class="course-overlay" href="{{route('site.kursu',$kursu->id)}}">
                                                                    <img src="{{asset('img')}}/{{$kursu->img}}" alt="{{$kursu->slug}}">
                                                                    <span>{{$kursu->kursu_adi}}</span>
                                                                </a>
                                                            </div>


                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="{{route('site.yayinlar')}}">Yayınlarımız</a></li>
                                    <!--<li><a class='dropdown-button ed-sub-menu' href='#' data-activates='dropdown1'>Courses</a></li>-->

                                    <li><a href="{{route('site.programlar')}}">Programlar</a>
                                    </li>
                                    <li><a href="{{route('site.egitimciler')}}">Eğitimcilerimiz</a>
                                    </li>
                                    <li><a href="{{route('site.iletisim')}}">İletişim</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="all-drop-down-menu">

                </div>

            </div>
        </div>
    </div>
    <div class="search-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-form">
                        <form>
                            <div class="sf-type">
                                <div class="sf-input">
                                    <input type="text" id="sf-box" placeholder="Search course and discount courses">
                                </div>
                                <div class="sf-list">
                                    <ul>
                                        <li><a href="course-details.html">Kürsü 1</a></li>
                                        <li><a href="course-details.html">Kürsü 2</a></li>
                                        <li><a href="course-details.html">Kürsü 3</a></li>
                                        <li><a href="course-details.html">Kürsü 4</a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="sf-submit">
                                <input type="submit" value="Kurslarda Ara">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MOBILE MENU -->
<section>
    <div class="ed-mob-menu">
        <div class="ed-mob-menu-con">
            <div class="row">
                <div class="col-md-2" >
                    <div class="ed-mm-left">
                        <div class="wed-logo">
                            <a href="{{route('anasayfa')}}"> Denizli Yazar Okulu
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="ed-mm-right">
                        <div class="ed-mm-menu">
                            <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                            <div class="ed-mm-inn">
                                <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>

                                <h4>Kullanıcı</h4>
                                <ul>
                                    <li><a href="#!" data-toggle="modal" data-target="#modal1">Giriş</a></li>
                                    <li><a href="#!" data-toggle="modal" data-target="#modal2">kayıt</a></li>
                                </ul>
                                <h4>Tüm Sayfalar</h4>
                                <ul>
                                    <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                                    @foreach($abouts as $about)
                                    <li><a href="{{route('site.about',$about->slug)}}">{{$about->baslik}}</a></li>
                                    @endforeach
                                    @foreach($kursus as $kursu)
                                    <li><a href="{{route('site.kursu',$kursu->id)}}">{{$kursu->kursu_adi}}</a></li>
                                    @endforeach
                                    <li><a href="{{route('site.yayinlar')}}">Yayınlarımız</a></li>
                                    <li><a href="{{route('site.programlar')}}">Programlar</a></li>
                                    <li><a href="{{route('site.egitimciler')}}">Eğitimcilerimiz</a></li>
                                    <li><a href="{{route('site.iletisim')}}">İletişim</a></li>

                                </ul>
                                <h4>Kullanıcı Profili</h4>
                                <ul>
                                    @auth()

                                        <li>
                                            @if(auth()->user()->yetki == 4)
                                                <a class="dropdown-item" href="{{route('admin.home')}}" >
                                                    <i class="fa fa-tachometer"></i> Yönetim Paneli
                                                    </span>
                                                </a>
                                            @else

                                                <a class="dropdown-item" href="{{route('site.profil')}}" >
                                                    <i class="fa fa-user"></i> Profilim
                                                    </span>
                                                </a>
                                            @endif



                                        </li>


                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<div class="container">
    @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
