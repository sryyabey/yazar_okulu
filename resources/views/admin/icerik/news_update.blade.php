@extends('admin.layouts.master')

@section('title','haber & duyuru ekle düzenle')

@section('content')
    
    <div class="container">
        <h2 class="text-secondary text-center">Haber Duyuru Güncelleme ve Düzenleme</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <img src="{{asset('img/news')}}/{{$news->img}}" alt="{{$news->img}}">
                    <button id="img" class="btn btn-primary btn-block">Resmi Güncelle</button>
                    <hr>

                    <div id="img_goster" style="display: none">
                        <form action="{{route('admin.icerik.news_tahdis') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$news->id}}">
                            <div class="form-group">
                                <input type="file" name="img" class="form-control">
                            </div>
                            <button class="btn btn-primary">Güncelle</button> | <span id="img_kapa" class="btn btn-success">Kapat</span>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul class="list-group">
                        <li class="list-group-item">
                            @if($news->aktif == 0)
                                <a href="{{route('admin.icerik.news_aktive',$news->id)}}" class="badge badge-danger">Pasif</a>
                            @else
                                <a href="{{route('admin.icerik.news_aktive',$news->id)}}" class="badge badge-primary">Aktif</a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            Başlık : {{$news->baslik}} &nbsp; <i id="baslik" class="fa fa-pencil" style="cursor: pointer "></i> <br>

                            <div id="baslik_goster" style="display: none">
                                <hr>
                                <form action="{{route('admin.icerik.news_tahdis') }}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$news->id}}">
                                    <div class="form-group">
                                        <input type="text" name="baslik" class="form-control" value="{{$news->baslik}}">
                                    </div>
                                    <button class="btn btn-primary">Güncelle</button> | <span id="baslik_kapa" class="btn btn-success">Kapat</span>
                                </form>
                            </div>
                        </li>

                        
                        <li class="list-group-item">
                            Tarih: {{$news->tarih}} &nbsp; <i id="tarih" class="fa fa-pencil" style="cursor: pointer "></i> <br>

                            <div id="tarih_goster" style="display: none">
                                <hr>
                                <form action="{{route('admin.icerik.news_tahdis') }}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$news->id}}">
                                    <div class="form-group">
                                        <input type="date" name="tarih" class="form-control" value="{{$news->tarih}}">
                                    </div>
                                    <button class="btn btn-primary">Güncelle</button> | <span id="tarih_kapa" class="btn btn-success">Kapat</span>
                                </form>
                            </div>
                        </li>

                        <li class="list-group-item">
                            Başlama Saati: {{$news->start_time}} &nbsp; <i id="start_time" class="fa fa-pencil" style="cursor: pointer "></i> <br>

                            <div id="start_time_goster" style="display: none">
                                <hr>
                                <form action="{{route('admin.icerik.news_tahdis') }}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$news->id}}">
                                    <div class="form-group">
                                        <input type="time" name="start_time" class="form-control" value="{{$news->start_time}}">
                                    </div>
                                    <button class="btn btn-primary">Güncelle</button> | <span id="start_time_kapa" class="btn btn-success">Kapat</span>
                                </form>
                            </div>
                        </li>

                        <li class="list-group-item">
                            Bitiş Saati: {{$news->end_time}} &nbsp; <i id="end_time" class="fa fa-pencil" style="cursor: pointer "></i> <br>

                            <div id="end_time_goster" style="display: none">
                                <hr>
                                <form action="{{route('admin.icerik.news_tahdis') }}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$news->id}}">
                                    <div class="form-group">
                                        <input type="time" name="end_time" class="form-control" value="{{$news->end_time}}">
                                    </div>
                                    <button class="btn btn-primary">Güncelle</button> | <span id="end_time_kapa" class="btn btn-success">Kapat</span>
                                </form>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.icerik.news')}}" class="text-secondary"><<- GERİ</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    
@endsection


@section('footer')

    <script>
        $(document).ready(function () {
            $('#img').click(function () {
                $('#img_goster').show(300);
            });
            $('#img_kapa').click(function () {
               $('#img_goster').hide(300)
            });

            $('#baslik').click(function () {
                $('#baslik_goster').show(300);
            });
            $('#baslik_kapa').click(function () {
                $('#baslik_goster').hide(300)
            });

            $('#tarih').click(function () {
                $('#tarih_goster').show(300);
            });
            $('#tarih_kapa').click(function () {
                $('#tarih_goster').hide(300)
            });


            $('#start_time').click(function () {
                $('#start_time_goster').show(300);
            });
            $('#start_time_kapa').click(function () {
                $('#start_time_goster').hide(300)
            });

            $('#end_time').click(function () {
                $('#end_time_goster').show(300);
            });
            $('#end_time_kapa').click(function () {
                $('#end_time_goster').hide(300)
            });


        });
    </script>

@endsection
