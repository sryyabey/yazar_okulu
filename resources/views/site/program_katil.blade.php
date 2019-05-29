@extends('layouts.master')

@section('title')
   {{$program->slug}}
@endsection

@section('content')


    <section class="c-all h-quote">
        <div class="container">

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="all-title quote-title qu-new">

                    <h2>{{$program->slug}}</h2>
                    <p>
                        {!! $program->konu !!}}
                    </p>

                    <p class="help-line">Bize Ulaşın <span>+90 258 241 07 46</span> </p> <span class="help-arrow pulse"><i class="fa fa-angle-right" aria-hidden="true"></i></span> </div>
            </div>

            <!-- form başı -->


           @guest()

            <div class="col-md-6 col-sm-12 col-xs-12">

                <div class="n-form-com admiss-form">
                    <div class="col s12">
                        <h6 class="alert alert-danger text-center text-success">Hesabınız varsa giriş yapınız!</h6>
                        <h6 class="alert alert-info text-center text-success">Öncelikle bir hesap oluşturmalısınız!</h6>

                        <form class="form-horizontal" action="{{route('user_save')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label class="control-label col-sm-3">Adınız</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="ad" placeholder="Adınız girin" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Soyadınız</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="soyad" placeholder="Soyadınızı girin" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Email </label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> </label>
                                        <div class="col-sm-12">
                                            <input type="password" name="sifre" class="form-control" placeholder="Şifre" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> </label>
                                        <div class="col-sm-12">
                                            <input type="password" name="sifre_tekrar" class="form-control" placeholder="Şifre Tekrar" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Telefon</label>
                                <div class="col-sm-9">
                                    <input type="text" name="telefon" class="form-control" placeholder="Telefon Numaranız" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Doğum Tarihi</label>
                                <div class="col-sm-9">
                                    <input type="date" name="birthday" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">TC no:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tc" class="form-control" placeholder="İsteğe bağlıdır!">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Profil Resmi:</label>
                                <div class="col-sm-9">
                                    <input type="file" name="img" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Meslek:</label>
                                <div class="col-sm-9">
                                    <div class="select-wrapper initialized">
                                        <select name="meslek" class="initialized">
                                            <option>Öğretmen</option>
                                            <option>Öğrenci</option>
                                            <option>Avukat</option>
                                            <option>İşçi</option>
                                            <option>Diğer</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="form-group mar-bot-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="waves-effect waves-light light-btn waves-input-wrapper" style=""><input type="submit" value="Hesap Oluştur" class="waves-button-input"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endguest
            <!-- form sonu -->
            @auth()

            <!--  auth()->user()->student->katilim->programs_id  -->


                <div class="col-md-6 col-sm-12 col-xs-12">
                <ul class="list-group">
                    <li class="list-group-item"><img class="img-thumbnail" src="{{asset('img')}}/{{auth()->user()->student->img}}" alt=""></li>
                    <li class="list-group-item">
                        <form action="{{route('site.katil')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{ auth()->user()->student->id }}">
                            <input type="hidden" name="program_id" value="{{$program->id}}">
                            @foreach(auth()->user()->student->katilim as $katilim)
                                @if($program->id == $katilim->programs_id)
                                    <label for="" class="alert alert-info alert-block text-center">Bu programa katıldın</label>
                                @endif
                            @endforeach

                            @if($program->end_date < date('Y-m-d'))
                                Katılım Tarihi Sona Erdi
                            @else
                        <button type="submit" class="btn btn-primary btn-block">Katıl</button>
                            @endif
                        </form>
                    </li>
                    <li class="list-group-item">Ad & Soyad : {{auth()->user()->student->ad}}  {{auth()->user()->student->soyad}}</li>
                    <li class="list-group-item">Email: {{auth()->user()->student->email}}</li>
                    <li class="list-group-item">Telefon: {{auth()->user()->student->telefon}}</li>
                    <li class="list-group-item">Meslek: {{auth()->user()->student->meslek}}</li>
                    <li class="list-group-item">Doğum Tarihi: {{auth()->user()->student->birthday}}</li>
                    <li class="list-group-item">
                    </li>
                </ul>

                </div>

            @endauth
        </div>
    </section>







@endsection
