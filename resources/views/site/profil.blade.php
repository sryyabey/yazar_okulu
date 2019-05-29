@extends('layouts.master')

@section('title')
    {{auth()->user()->student->ad }} {{auth()->user()->student->soyad}} | Denizli Yazar Okulu
@endsection

@section('content')
 <!-- section başlangıcı -->

 <section>
     <div class="pro-cover">
     </div>
     <div class="pro-menu">
         <div class="container">
             <div class="col-md-9 col-md-offset-3">
                 <ul>
                     <li><a href="#" id="profil" >Profil</a></li>
                     <li><a href="#" id="kurslar">Kurslarım</a></li>
                     <li><a href="#" id="sertifika">Sertifikalar</a></li>
                     <li><a href="#" id="zaman">Zaman Çizgim</a></li>
                     <li>
                     <li>
                         <a class="text-light" href="{{ route('cikisyap') }}">
                             <i class="fa fa-sign-out" aria-hidden="true"></i>
                             Çıkış
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="stu-db">
         <div class="container pg-inn">
             <div class="col-md-3">
                 <div class="pro-user">
                     <img title="Resmi Güncellemek için tıkla" id="img" src="{{asset('img/')}}/{{auth()->user()->student->img}}" alt="user">
                     <!-- blank form -->
                     <div id="img_goster" style="display: none;">
                     <form action="{{route('site.profil_update')}}" method="post" enctype="multipart/form-data">
                         {{csrf_field()}}
                         <div class="form-group">
                             <input type="hidden" name="id" value="{{auth()->user()->id}}">
                             <input class="form-control" type="file" name="img"> <br>
                             <button class="btn btn-primary btn-block">Güncelle</button>
                         </div>
                     </form>
                     </div>
                     <!-- blank form end -->
                 </div>
                 <div class="pro-user-bio">
                     <ul>
                         <li>
                             <h4>{{auth()->user()->student->ad}} {{auth()->user()->student->soyad}}</h4>
                         </li>
                         <li>{{auth()->user()->student->meslek}} ID:{{auth()->user()->student->id}}</li>
                         <li><a href="{{auth()->user()->student->facebook}}"><i class="fa fa-facebook"></i> Facebook: {{auth()->user()->student->facebook}}</a></li>
                         <li><a href="{{auth()->user()->student->instagram}}"><i class="fa fa-google-plus"></i> Instagram:{{auth()->user()->student->instagram}}</a></li>
                         <li><a href="{{auth()->user()->student->twitter}}"><i class="fa fa-twitter"></i> Twitter: {{auth()->user()->student->twitter}}</a></li>
                         <li><button class="btn btn-primary btn-sm btn-block" id="sosyal">Güncelle</button></li>
                         <li>
                             <div id="sosyal_goster" style="display: none">
                                 <form action="{{route('site.profil_update')}}" method="post" enctype="multipart/form-data">
                                     {{csrf_field()}}
                                     <div class="form-group">
                                         <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                         <input class="form-control" type="text" name="facebook" placeholder="facebook" value="{{auth()->user()->student->facebook}}"> <br>
                                         <input class="form-control" type="text" name="twitter" placeholder="instagram" value="{{auth()->user()->student->instagram}}"> <br>
                                         <input class="form-control" type="text" name="instagram" placeholder="twitter" value="{{auth()->user()->student->twitter}}"> <br>
                                         <button class="btn btn-primary btn-sm">Güncelle</button> <a class="btn btn-success btn-sm" id="sosyal_kapa">Kapat</a>
                                     </div>
                                 </form>
                             </div>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="col-md-9">
                <!-- profil başlangıç -->
                 <div class="udb" id="profil_goster">

                     <div class="udb-sec udb-prof">
                         <h4><img src="{{asset('img/')}}/{{auth()->user()->student->img}}" alt=""> Profil Bilgilerim</h4>

                         <div class="sdb-tabl-com sdb-pro-table">
                             <table class="responsive-table bordered">
                                 <tbody>
                                 <tr>
                                     <td>Öğrenci Adı</td>
                                     <td>:</td>
                                     <td>{{auth()->user()->student->ad}} {{auth()->user()->student->soyad}}


                                             <i class="fa fa-pencil hand" id="name" aria-hidden="true"></i>

                                         <div id="name_goster" style="display: none;" >
                                             <form action="{{route('site.profil_update')}}" method="post" enctype="multipart/form-data">
                                                 {{csrf_field()}}
                                                 <div class="form-group">
                                                     <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                                     <input class="form-control" type="text" name="ad" placeholder="Ad" value="{{auth()->user()->student->ad}}"> <br>
                                                     <input class="form-control" type="text" name="soyad" placeholder="Soyad" value="{{auth()->user()->student->soyad}}"> <br>
                                                     <button class="btn btn-primary btn-sm">Güncelle</button> <a class="btn btn-success btn-sm" id="name_kapa">Kapat</a>
                                                 </div>
                                             </form>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Öğrenci ID</td>
                                     <td>:</td>
                                     <td>{{auth()->user()->student->id}}</td>
                                 </tr>
                                 <tr>
                                     <td>Email</td>
                                     <td>:</td>
                                     <td>{{auth()->user()->student->email}}
                                         <i class="fa fa-pencil hand" id="email" aria-hidden="true"></i>
                                         <br>
                                         <div id="email_goster" style="display: none;" >
                                             <form action="{{route('site.profil_update')}}" method="post" enctype="multipart/form-data">
                                                 {{csrf_field()}}
                                                 <div class="form-group">
                                                     <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                                     <input class="form-control" type="email" name="email" placeholder="Email" value="{{auth()->user()->student->email}}"> <br>
                                                     <button class="btn btn-primary btn-sm">Güncelle</button> <a class="btn btn-success btn-sm" id="email_kapa">Kapat</a>
                                                 </div>
                                             </form>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Telefon</td>
                                     <td>:</td>
                                     <td>{{auth()->user()->student->telefon}}
                                         <i class="fa fa-pencil hand" id="telefon" aria-hidden="true"></i>
                                         <br>
                                         <div id="telefon_goster" style="display: none" >
                                             <form action="{{route('site.profil_update')}}" method="post" enctype="multipart/form-data">
                                                 {{csrf_field()}}
                                                 <div class="form-group">
                                                     <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                                     <input class="form-control" type="text" name="telefon" placeholder="Email" value="{{auth()->user()->student->telefon}}"> <br>
                                                     <button class="btn btn-primary btn-sm">Güncelle</button> <a class="btn btn-success btn-sm" id="telefon_kapa">Kapat</a>
                                                 </div>
                                             </form>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Doğum Tarihi</td>
                                     <td>:</td>
                                     <td>{{date('d-m-Y',strtotime(auth()->user()->student->birthday))}}
                                         <i class="fa fa-pencil hand" id="birthday" aria-hidden="true"></i>
                                         <br>
                                         <div id="birthday_goster" style="display: none"  >
                                             <form action="{{route('site.profil_update')}}" method="post" enctype="multipart/form-data">
                                                 {{csrf_field()}}
                                                 <div class="form-group">
                                                     <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                                     <input class="form-control" type="date" name="birthday" placeholder="Email" value="{{auth()->user()->student->birthday}}"> <br>
                                                     <button class="btn btn-primary btn-sm">Güncelle</button> <a class="btn btn-success btn-sm" id="birthday_kapa">Kapat</a>
                                                 </div>
                                             </form>
                                         </div>

                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Adress</td>
                                     <td>:</td>
                                     <td>{{auth()->user()->student->adres}}
                                         <i class="fa fa-pencil hand" id="adres" aria-hidden="true"></i>
                                         <br>
                                         <div id="adres_goster" style="display: none"  >
                                             <form action="{{route('site.profil_update')}}" method="post" enctype="multipart/form-data">
                                                 {{csrf_field()}}
                                                 <div class="form-group">
                                                     <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                                     <input class="form-control" type="text" name="adres" placeholder="Adres" value="{{auth()->user()->student->adres}}"> <br>
                                                     <button class="btn btn-primary btn-sm">Güncelle</button> <a class="btn btn-success btn-sm" id="adres_kapa">Kapat</a>
                                                 </div>
                                             </form>
                                         </div>

                                     </td>
                                 </tr>
                                 <tr>
                                     <td>TC İsteğe bağlı <br>
                                         <small>TC numaranız </small>
                                     </td>
                                     <td>:</td>
                                     <td>{{auth()->user()->student->tc}}
                                         <i class="fa fa-pencil hand" id="tc" aria-hidden="true"></i>
                                         <br>
                                         <div id="tc_goster" style="display: none"  >
                                             <form action="{{route('site.profil_update')}}" method="post" enctype="multipart/form-data">
                                                 {{csrf_field()}}
                                                 <div class="form-group">
                                                     <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                                     <input class="form-control" type="text" name="tc" placeholder="TC numaranız başka kurum ve kuruluşlarla paylaşılmaz" value="{{auth()->user()->student->tc}}"> <br>
                                                     <button class="btn btn-primary btn-sm">Güncelle</button> <a class="btn btn-success btn-sm" id="tc_kapa">Kapat</a>
                                                 </div>
                                             </form>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Durum</td>
                                     <td>:</td>
                                     <td>
                                         @if(auth()->user()->student->onay == 1)
                                         <span class="text-primary">Onaylı</span>
                                         @else
                                             <span class="text-danger">Aktif değil</span>
                                         @endif

                                     </td>
                                 </tr>
                                 </tbody>
                             </table>


                         </div>
                     </div>
                 </div>

                 <!-- profile sonu -->

                 <!-- kurslar başlangıç -->

                 <div class="udb" id="kurslar_goster" style="display: none">
                     <div class="udb-sec udb-cour">
                         <h4><img src="{{asset('img')}}/{{auth()->user()->student->img}}" alt=""> Kurslarım</h4>
                         <p>Katıldığın Kursları Burada Görebilirsin</p>
                         <div class="sdb-cours">


                             <ul>
                                 @foreach(auth()->user()->student->program as $program)

                                 <li>
                                     <a href="#">
                                         <div class="list-mig-like-com com-mar-bot-30">
                                             <div class="list-mig-lc-img"> <img src="{{asset('img')}}/{{$program->img}}" alt=""> <span class="home-list-pop-rat list-mi-pr">Duration:150 Days</span> </div>
                                             <div class="list-mig-lc-con">
                                                 <h5> <a href="{{route('site.program_katil',$program->id)}}">{{$program->slug}}</a></h5>
                                                 <p class="text-light">{!! str_limit($program->konu, 60) !!}</p>
                                             </div>
                                         </div>
                                     </a>
                                 </li>

                                 @endforeach
                             </ul>
                         </div>
                     </div>
                     <div class="udb-sec udb-cour-stat">
                         <h4><img src="{{asset('img/8333.jpg')}}" alt=""> Gelecek Programlar</h4>
                         <p>Katılabileceğin programlar</p>
                         <div class="pro-con-table">
                             <table class="bordered responsive-table">
                                 <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Program Adı</th>
                                     <th>Kayıt Başlangıç</th>
                                     <th>Kayıt Sonu</th>
                                     <th>Tarih</th>
                                     <th>Durum</th>
                                     <th>Kontenjan</th>
                                 </tr>
                                 </thead>

                                 <tbody>

                                 @foreach($programs as $key => $program)

                                 <tr>
                                     <td>{{$key+1}}</td>
                                     <td><a href="{{route('site.program_katil',$program->id)}}">{{$program->slug}}</a>
                                         <br>
                                         @foreach(auth()->user()->student->katilim as $katilim)
                                             @if($program->id == $katilim->programs_id)
                                                 <small class="badge badge-success text-center">Bu programa katıldın</small>
                                             @endif

                                         @endforeach
                                     </td>
                                     <td>{{$program->start_date}}</td>
                                     <td>{{$program->end_date}}</td>
                                     <td>{{$program->tarih}}</td>
                                     <td>
                                         @if($program->end_date < date('Y-m-d'))
                                             Katılım Sona Erdi
                                         @elseif($program->end_date == date('Y-m-d'))
                                             <span class="text-warning h3">son gün</span>
                                         @else
                                         <a href="{{route('site.program_katil',$program->id)}}" class="pro-user-act">katıl </a>
                                         @endif
                                     </td>
                                     <td><a href="" class="badge badge-danger">
                                         {{count($program->katilim)}}/{{$program->kontenjan}}</a></td>
                                 </tr>

                                 @endforeach

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>

                 <!-- kurslar sonu -->

                 <!-- sertifikalarım -->

                 <div class="udb" id="sertifika_goster" style="display:none;">
                     <div class="udb-sec udb-time">
                         <h4><img src="{{asset('img')}}/{{auth()->user()->student->img}}" alt=""> Setifikalarım</h4>
                         <p>Aldığım Sertifikalar</p>
                         <div class="tour_head1 udb-time-line days">
                             <ul>

                                 <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                     <div class="sdb-cl-tim">
                                         <div class="sdb-cl-day">
                                             <h5>Felsefe tarihi</h5>
                                             <span>Tarih: 10 10 2018</span>
                                         </div>
                                         <div class="sdb-cl-class">
                                             <ul>
                                                 <li>

                                                     <div class="sdb-cl-class-name tooltipped" data-position="top" data-delay="50" data-tooltip="Exam name and status" data-tooltip-id="63d8943e-3b7a-4fd7-5be2-26877cbacdb9">
                                                         <h5>Anadolu Felsefe <span>Ali Rıza Kara</span></h5>

                                                     </div>
                                                 </li>

                                             </ul>
                                         </div>
                                     </div>
                                 </li>


                             </ul>
                         </div>
                     </div>
                 </div>

                 <!--- sertifikarlarım sonu -->

                 <!-- zaman çizgisi -->

                 <div class="udb" id="zaman_goster" style="display:none;">
                     <div class="udb-sec udb-time">
                         <h4><img src="images/icon/db5.png" alt=""> Zaman Çizgisi</h4>
                         <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                         <div class="tour_head1 udb-time-line days">
                             <ul>
                                 <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                     <div class="sdb-cl-tim">
                                         <div class="sdb-cl-day">
                                             <h5>Felsefe Kürsüsü</h5>
                                             <span>tarih: 10Sep 2018</span>
                                         </div>
                                         <div class="sdb-cl-class">
                                             <ul>
                                                 <li>

                                                     <div class="sdb-cl-class-name tooltipped" data-position="top" data-delay="50" data-tooltip="Exam name and status" data-tooltip-id="63d8943e-3b7a-4fd7-5be2-26877cbacdb9">
                                                         <h5>Denizli <span>Ali karaba</span></h5>

                                                     </div>
                                                 </li>

                                             </ul>
                                         </div>
                                     </div>
                                 </li>

                             </ul>
                         </div>
                     </div>
                 </div>


                 <!-- zaman çizgisi sonu -->


             </div>
         </div>
     </div>
 </section>




<!-- section sonu -->
@endsection

@section('footer')

    <script>

        $(document).ready(function () {
           $('#profil').click(function () {
               $('#profil_goster').slideDown(800);
               $('#kurslar_goster').hide();
               $('#sertifika_goster').hide();
               $('#zaman_goster').hide();
           }) ;

            $('#kurslar').click(function () {
                $('#profil_goster').hide();
                $('#kurslar_goster').slideDown(800);
                $('#sertifika_goster').hide();
                $('#zaman_goster').hide();
            }) ;

            $('#sertifika').click(function () {
                $('#profil_goster').hide();
                $('#kurslar_goster').hide();
                $('#sertifika_goster').slideDown(800);
                $('#zaman_goster').hide();
            }) ;

            $('#sertifika').click(function () {
                $('#profil_goster').hide();
                $('#kurslar_goster').hide();
                $('#sertifika_goster').slideDown(800);
                $('#zaman_goster').hide();
            }) ;

            $('#zaman').click(function () {
                $('#profil_goster').hide();
                $('#kurslar_goster').hide();
                $('#sertifika_goster').hide();
                $('#zaman_goster').slideDown(800);
            }) ;

            $('#img').click(function () {
               $('#img_goster').toggle(300);
            });

            $('#sosyal').click(function () {
                $('#sosyal_goster').slideDown(600);
                $('#sosyal').hide();
            });

            $('#sosyal_kapa').click(function () {
               $('#sosyal_goster').slideUp(600);
               $('#sosyal').show();
            });

            $('#name').click(function () {
                $('#name_goster').slideDown(600);
            });

            $('#name_kapa').click(function () {
                $('#name_goster').slideUp(600);
            });

            $('#email').click(function () {
                $('#email_goster').slideDown(600);
            });

            $('#email_kapa').click(function () {
                $('#email_goster').slideUp(600);
            });

            $('#telefon').click(function () {
                $('#telefon_goster').slideDown(600);
            });

            $('#telefon_kapa').click(function () {
                $('#telefon_goster').slideUp(600);
            });

            $('#birthday').click(function () {
                $('#birthday_goster').slideDown(600);
            });

            $('#birthday_kapa').click(function () {
                $('#birthday_goster').slideUp(600);
            });

            $('#adres').click(function () {
                $('#adres_goster').slideDown(600);
            });

            $('#adres_kapa').click(function () {
                $('#adres_goster').slideUp(600);
            });

            $('#tc').click(function () {
                $('#tc_goster').slideDown(600);
            });

            $('#tc_kapa').click(function () {
                $('#tc_goster').slideUp(600);
            });

        });

    </script>

@endsection
