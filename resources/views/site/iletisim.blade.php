@extends('layouts.master')

@section('title','Denizli Yazar Okulu İletişim Sayfası')

@section('content')

    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Bize <span> Ulaşın</span></h2>
                            <p>Soru , görüş ve önerileriniz için aşagıdaki iletişim bilgileri ile bizimle iletişim kurubilirsiniz.</p>
                        </div>
                    </div>
                    <div class="pg-contact">
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con1">
                            <h2>Yazar <span>Okulu</span></h2>
                            <p>Denizli yazar okulu ile yazmak artık daha kolay sertifikalı kurslarımız ile siz de yazarlar arasındaki yerinizi alın.</p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con1"> <i class="fa fa-address-card-o fa-3x" aria-hidden="true"></i>
                            <h3>Adresimiz</h3>
                            <p>Pelitlibağ Mh., İstiklal Cd., No: 155-157, Pamukkale, Denizli
                                <br>Denizli Gençlik Merkezi</p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con3"> <i class="fa fa-mobile fa-3x" aria-hidden="true"></i>

                            <h4>İletişim Bilgileri:</h4>
                            <p> <a href="tel://0099999999" class="contact-icon">Telefon: 01 234874 965478</a>
                                <br> <a href="tel://0099999999" class="contact-icon">Cep : 01 654874 965478</a>
                                <br> <a href="mailto:mytestmail@gmail.com" class="contact-icon">Email: info@denizliyazarokulu.org</a> </p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con4"> <i class="fa fa-internet-explorer fa-3x" aria-hidden="true"></i>

                            <h4>WWW</h4>
                            <p> <a href="#">Website: www.denizliyazarokulu.org</a>
                                <br> <a href="#">Facebook: www.facebook/</a>
                                <br> <a href="#">Blog: www.blog.com</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="map">
        <div class="row contact-map">

            <!-- IFRAME: GET YOUR LOCATION FROM GOOGLE MAP -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3154.1087309089366!2d29.098102815183058!3d37.76404862054985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c73ef892ea7ab1%3A0xfe5b36b4e366e20b!2sDenizli+Gen%C3%A7lik+Merkezi!5e0!3m2!1str!2str!4v1550488363427" allowfullscreen></iframe>
            <div class="container">
                <div class="overlay-contact footer-part footer-part-form">
                    <div class="map-head">
                        <p>Bize </p>
                        <h2>Ulaşın</h2> <span class="footer-ser-re">İletişim Formu</span> </div>
                    <!-- ENQUIRY FORM -->
                    <form method="post" action="{{route('site.contact_form')}}">
                        {{csrf_field()}}
                        <ul>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text"  name="ad" placeholder="ad" required=""> </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" name="telefon" placeholder="telefon" required=""> </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" name="email" placeholder="E-mail" required=""> </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" name="city" placeholder="Şehir" required=""> </li>
                            <li class="col-md-12 col-sm-12 col-xs-12 contact-input-spac">
                                <textarea id="f5" name="icerik" required=""></textarea>
                            </li>
                            <li class="col-md-6">
                                <input type="submit" value="Gönder"> </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </section>




@endsection
