@extends('admin.layouts.master')

@section('title','Hakkımızda menüsü düzenleme')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <img src="{{asset('img')}}/{{$about->img}}" alt="">
                    <button id="img" class="btn btn-primary btn-block mt-1">Resmi Güncelle</button>
                    <div id="img_goster" style="display: none;">
                        <form action="{{route('admin.icerik.aboutus_tahdis')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$about->id}}">
                            <div class="form-group">
                                <input type="file" class="form-control" name="img">
                            </div>
                            <button class="btn btn-secondary btn-block">Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul class="list-group">
                        <h3 class="text-center">Hakkımızda Menüsü Elemanı</h3>
                        <hr>
                        <li class="list-group-item">Başlık : {{$about->baslik}} <i id="baslik" style="cursor: pointer;" class="fa fa-pencil"></i></li>
                        <li id="baslik_goster" class="list-group-item" style="display: none;">
                            <form action="{{route('admin.icerik.aboutus_tahdis')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$about->id}}">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="baslik" value="{{$about->baslik}}" required>
                                </div>
                                <button class="btn btn-secondary btn-block">Kaydet</button>
                            </form>
                        </li>

                        <li class="list-group-item">Anahtar Kelimeler : {{$about->keywords}} <i id="keywords" style="cursor: pointer;" class="fa fa-pencil"></i></li>
                        <li id="keywords_goster" class="list-group-item" style="display: none;">
                            <form action="{{route('admin.icerik.aboutus_tahdis')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$about->id}}">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="keywords" value="{{$about->keywords}}" required>
                                </div>
                                <button class="btn btn-secondary btn-block">Kaydet</button>
                            </form>
                        </li>

                        <li class="list-group-item"><i id="icerik" style="cursor: pointer;" class="fa fa-pencil"></i> İcerik :
                        <li id="icerik_goster" class="list-group-item" style="display: none;">
                            <form action="{{route('admin.icerik.aboutus_tahdis')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$about->id}}">
                                <div class="form-group">
                                    <textarea class="form-control" name="icerik" required>{!! $about->icerik !!}</textarea>
                                </div>
                                <button class="btn btn-secondary btn-block">Kaydet</button>
                            </form>
                        </li>
                        {!! $about->icerik  !!}
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
              $('#img_goster').toggle(800);
           });

            $('#baslik').click(function () {
                $('#baslik_goster').toggle(800);
            });

            $('#keywords').click(function () {
                $('#keywords_goster').toggle(800);
            });

            $('#icerik').click(function () {
                $('#icerik_goster').toggle(800);
            });



        });
    </script>

@endsection