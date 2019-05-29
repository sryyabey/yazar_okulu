<!--
<section>
    <div class="full-bot-book">
        <div class="container">
            <div class="row">
                <div class="bot-book">
                    <div class="col-md-2 bb-img">
                        <img src="images/3.png" alt="">
                    </div>
                    <div class="col-md-7 bb-text">
                        <h4>therefore always free from repetition</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
                    </div>
                    <div class="col-md-3 bb-link">
                        <a href="course-details.html">Book This Course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!-- FOOTER -->
<section class="wed-hom-footer">
    <div class="container">
        <!--<div class="row">
            <div class="col-md-12">
            <h4>About Wedding Planner</h4>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum</p>
            <p>more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
            <p></p>
          </div>
          </div>-->
        <div class="row wed-foot-link">
            <div class="col-md-4 foot-tc-mar-t-o">
                <h4>Kürsüler</h4>
                <ul>
                    @foreach($kursus as $kursu)
                    <li><a href="{{route('site.kursu',$kursu->id)}}">{{$kursu->kursu_adi}}</a></li>

                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Programlar</h4>
                <ul>
                    @foreach($programs as $program)
                    <li><a href="{{route('site.program_katil',$program->id)}}">{{$program->slug}}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-4">
                <h4>Destek ve Yardım</h4>
                <ul>
                    <li><a href="#">+90 258 241 07 46</a>
                    </li>
                    <li><a href="{{route('site.iletisim')}}">İletişim</a>
                    </li>
                    <li><a href="#">Geri bildirim</a>
                    </li>
                    <li><a href="#">SSS</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="row wed-foot-link-1">
            <div class="col-md-4 foot-tc-mar-t-o">
                <h4>Bize ulaşın !</h4>
                <p>Adres: Pelitlibağ Mh., İstiklal Cd., No: 155-157, Pamukkale, Denizli</p>
                <p>Telefon: <a href="#!">+90 258 241 07 46</a></p>
                <p>Email: <a href="#!">info@denizliyazarokulu.org</a></p>
            </div>
            <div class="col-md-4">
                <h4>Sık Sorula Sorular</h4>
                <ul>
                    <li><a href="#">soru 1</a>
                    </li>
                    <li><a href="#">soru 2</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>SOSYAL MEDYA</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- COPY RIGHTS -->
<section class="wed-rights">
    <div class="container">
        <div class="row">
            <div class="copy-right text-right">
                <a target="_blank" href="#">Denizli Yazarlık Okulu  &copy; <span class="text-light">Tüm Hakları Saklıdır!</span> </a>
            </div>
        </div>
    </div>
</section>

<!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
<section>
    <!-- LOGIN SECTION -->
    <div id="modal1" class="modal fade" role="dialog">
        <div class="log-in-pop">

            <div class="log-in-pop-right">
                <a href="#" class="pop-close" data-dismiss="modal"><i class="fa fa-times fa-2x" aria-hidden="true"></i>
                </a>
                <h4>Kullanıcı Girişi</h4>
                <p>Hala bir hesabın yok mu? bir kaç dakikada hemen hesap oluşturabilirsin !</p>
                 <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <div class="input-field s12">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            <label>Email</label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="input-field s12">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <label>Şİfre</label>
                        </div>
                    </div>
                    <div>
                        <div class="s12 log-ch-bx">
                            <p>
                                <input type="checkbox" id="test5" {{ old('remember') ? 'checked' : '' }}/>
                                <label for="test5">Beni Hatırla</label>
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s4">
                            <button type="submit" class="waves-effect waves-light log-in-btn">GİRİŞ</button> </div>
                    </div>
                    <div>
                        <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">Şifremi Unuttum</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Yeni hesap</a> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- REGISTER SECTION -->
    <div id="modal2" class="modal fade" role="dialog">
        <div class="log-in-pop">

            <div class="log-in-pop-right">
                <a href="#" class="pop-close" data-dismiss="modal"><i class="fa fa-times fa-2x" aria-hidden="true"></i>
                </a>
                <h4>Yeni Hesap Aç</h4>
                <p>Eğer kayıt olmadıysan , birkaç dakika içinde kayıt olabilirsin.</p>
                <form class="s12" method="post" action="{{route('site.student_save')}}">
                    {{csrf_field()}}
                    <div>
                        <div class="input-field s12">
                            <input name="ad" type="text" data-ng-model="name1" class="validate" required>
                            <label>Ad</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s12">
                            <input name="soyad" type="text" data-ng-model="name1" class="validate" required>
                            <label>Soyad</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s12">
                            <input name="email" type="email" class="validate" required>
                            <label>Email Adresi</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s12">
                            <input name="telefon" type="text" class="validate" required>
                            <label>Telefon</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s12">
                            <input name="sifre" type="password" class="validate" required>
                            <label>Şifre</label>
                        </div>
                    </div>

                    <div>
                        <div class="input-field s4">
                            <input type="submit" value="Kayıt" class="waves-effect waves-light log-in-btn"> </div>
                    </div>
                    <div>
                        <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Kayıtlı isen burdan giriş yapabilirsin !</a> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FORGOT SECTION -->
    <div id="modal3" class="modal fade" role="dialog">
        <div class="log-in-pop">
            <div class="log-in-pop-left">
                <h1>Hello... </h1>
                <p>Don't have an account? Create your account. It's take less then a minutes</p>
                <h4>Login with social media</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                    </li>
                    <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                    </li>
                    <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                    </li>
                </ul>
            </div>
            <div class="log-in-pop-right">
                <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                </a>
                <h4>Forgot password</h4>
                <p>Don't have an account? Create your account. It's take less then a minutes</p>
                <form class="s12">
                    <div>
                        <div class="input-field s12">
                            <input type="text" data-ng-model="name3" class="validate">
                            <label>User name or email id</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s4">
                            <input type="submit" value="Submit" class="waves-effect waves-light log-in-btn"> </div>
                    </div>
                    <div>
                        <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- SOCIAL MEDIA SHARE -->
<section>
    <div class="icon-float">
        <ul>
            <li><a href="#" class="sh">1k <br> Share</a> </li>
            <li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
            <li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
            <li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
            <li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
            <li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
            <li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
        </ul>
    </div>
</section>

<!--Import jQuery before materialize.js-->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/main.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/jquery.chained.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')

