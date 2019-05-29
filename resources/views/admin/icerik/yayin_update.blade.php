@extends('admin.layouts.master')

@section('title','Yayınlarımız Güncelle Düzenle')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="breadcrumbs">
                <img src="{{asset('img/yayinlar')}}/{{$yayin->img}}" width="400" alt=""> &nbsp; <span class="btn btn-primary" title="Güncelle"> <i class="fa fa-pencil" id="img" title="güncelle"></i></span>
                <div class="mt-2" id="img_goster" style="display: none">
                    <form action="{{route('admin.icerik.update')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$yayin->id}}">
                        <div class="form-group">
                            <input type="file" class="form-control" name="img">
                        </div>
                        <button class="btn btn-primary">Güncelle</button> <span id="img_kapa" class="btn btn-success">kapat</span>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="breadcrumbs">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-10">
                                Durum :
                                @if($yayin->aktif == 0)
                                    <a href="{{route('admin.icerik.aktive',$yayin->id)}}" class="badge badge-danger">pasif</a>
                                @else
                                    <a href="{{route('admin.icerik.aktive',$yayin->id)}}" class="badge badge-primary">Aktif</a>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-danger btn-block" href="{{route('admin.icerik.yayin_sil',$yayin->id)}}">SİL</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">Baslik : {{$yayin->baslik}} &nbsp; <i class="fa fa-pencil" id="baslik" title="güncelle"></i>
                    <div class="mt-2" id="baslik_goster" style="display: none">
                    <form action="{{route('admin.icerik.update')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$yayin->id}}">
                        <div class="form-group">
                            <input type="text" class="form-control" name="baslik" value="{{$yayin->baslik}}">
                        </div>
                        <button class="btn btn-primary">Güncelle</button> <span id="baslik_kapa" class="btn btn-success">kapat</span>
                    </form>
                    </div>
                    </li>
                    <li class="list-group-item">Yayın tarihi : {{$yayin->tarih}} &nbsp; <i class="fa fa-pencil" id="tarih" title="güncelle"></i>
                    <div class="mt-2" id="tarih_goster" style="display: none">
                        <form action="{{route('admin.icerik.update')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$yayin->id}}">
                            <div class="form-group">
                                <input type="date" class="form-control" name="tarih" value="{{$yayin->tarih}}">
                            </div>
                            <button class="btn btn-primary">Güncelle</button> <span id="tarih_kapa" class="btn btn-success">kapat</span>
                        </form>
                    </div>
                    </li>
                    <li class="list-group-item">İçerik :  &nbsp; <i class="fa fa-pencil" id="icerik" title="güncelle"></i>
                        <br>
                        <div class="mt-2" id="icerik_goster" style="display: none">
                            <form action="{{route('admin.icerik.update')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$yayin->id}}">
                                <div class="form-group">
                                    <textarea type="date" class="form-control" name="icerik">{{$yayin->icerik}}</textarea>
                                </div>
                                <button class="btn btn-primary">Güncelle</button> <span id="icerik_kapa" class="btn btn-success">kapat</span>
                            </form>
                        </div>
                        {{$yayin->icerik}}
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
            $('#baslik').click(function () {
                $('#baslik_goster').slideDown(800);
            });

            $('#baslik_kapa').click(function () {
                $('#baslik_goster').slideUp(800);
            });

            $('#tarih').click(function () {
                $('#tarih_goster').slideDown(800);
            });

            $('#tarih_kapa').click(function () {
                $('#tarih_goster').slideUp(800);
            });


            $('#icerik').click(function () {
                $('#icerik_goster').slideDown(800);
            });

            $('#icerik_kapa').click(function () {
                $('#icerik_goster').slideUp(800);
            });


            $('#img').click(function () {
                $('#img_goster').slideDown(800);
            });

            $('#img_kapa').click(function () {
                $('#img_goster').slideUp(800);
            });
        });
    </script>
@endsection
