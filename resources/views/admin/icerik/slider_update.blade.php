@extends('admin.layouts.master')

@section('title','Slider Düzenle | Caorusel Düzenle')

@section('content')

    <div class="row ml-1 mt-4">
        <div class="col-md-6">
            <div class="breadcrumbs">
            <img src="{{asset('img/slider')}}/{{$slider->img}}" alt="">
                <div class="row">
                    <div class="col-md-10">
                        <button class="btn btn-primary btn-block mt-1" id="img">Güncelle</button>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-danger btn-block mt-1" href="{{route('admin.icerik.slider_delete',$slider->id)}}" >Sil</a>
                    </div>
                </div>


                <div id="img_goster" style="display: none">
                <form action="{{route('admin.icerik.slider_tahdis')}}" method="post" enctype="multipart/form-data" class="mt-2">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$slider->id}}">
                    <div class="form-group">
                    <input class="form-control" type="file" name="img">
                    </div>
                    <button class="btn btn-primary" type="submit">Güncelle</button>
                    <span class="btn btn-success" id="img_kapa">Kapat</span>
                </form>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item">
                    @if($slider->aktif == 0)
                        <a href="{{route('admin.icerik.slide_aktive',$slider->id)}}"><span class="badge badge-danger">Pasif</span></a>
                    @else
                        <a href="{{route('admin.icerik.slide_aktive',$slider->id)}}"><span class="badge badge-primary">aktif</span></a>
                    @endif
                </li>
                <li class="list-group-item">
                   Ad Beyaz : {{$slider->ad_white}}  &nbsp;&nbsp; <span id="white" class="badge badge-primary"><i class="fa fa-pencil"></i></span>

                    <div id="white_goster" style="display: none">
                        <form action="{{route('admin.icerik.slider_tahdis')}}" method="post" enctype="multipart/form-data" class="mt-2">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$slider->id}}">
                            <div class="form-group">
                                <input class="form-control" type="text" name="white" value="{{$slider->ad_white}}">
                            </div>
                            <button class="btn btn-primary" type="submit">Güncelle</button>
                            <span class="btn btn-success" id="white_kapa">Kapat</span>
                        </form>
                    </div>

                </li>

                <li class="list-group-item">
                    Ad Kırmızı : {{$slider->ad_red}} &nbsp;&nbsp; <span id="red" class="badge badge-primary"><i class="fa fa-pencil"></i></span>

                    <div id="red_goster" style="display: none">
                        <form action="{{route('admin.icerik.slider_tahdis')}}" method="post" enctype="multipart/form-data" class="mt-2">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$slider->id}}">
                            <div class="form-group">
                                <input class="form-control" type="text" name="red" value="{{$slider->ad_red}}">
                            </div>
                            <button class="btn btn-primary" type="submit">Güncelle</button>
                            <span class="btn btn-success" id="red_kapa">Kapat</span>
                        </form>
                    </div>

                </li>

                <li class="list-group-item">
                    Buton adı : {{$slider->buton_ad}} &nbsp;&nbsp; <span id="buton" class="badge badge-primary"><i class="fa fa-pencil"></i></span>

                    <div id="buton_goster" style="display: none">
                        <form action="{{route('admin.icerik.slider_tahdis')}}" method="post" enctype="multipart/form-data" class="mt-2">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$slider->id}}">
                            <div class="form-group">
                                <input class="form-control" type="text" name="buton" value="{{$slider->buton_ad}}">
                            </div>
                            <button class="btn btn-primary" type="submit">Güncelle</button>
                            <span class="btn btn-success" id="buton_kapa">Kapat</span>
                        </form>
                    </div>

                </li>

                <li class="list-group-item">
                    <span class="badge badge-primary"><i id="aciklama" class="fa fa-pencil"></i></span> <br>

                    <div id="aciklama_goster" style="display: none">
                        <form action="{{route('admin.icerik.slider_tahdis')}}" method="post" enctype="multipart/form-data" class="mt-2">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$slider->id}}">
                            <div class="form-group">
                                <textarea class="form-control" type="text" name="aciklama" >{{$slider->aciklama}}</textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Güncelle</button>
                            <span class="btn btn-success" id="aciklama_kapa">Kapat</span>
                        </form>
                    </div>

                    Açıklama : {{$slider->aciklama}}

                </li>
            </ul>
        </div>
    </div>

@endsection

@section('footer')

    <script>
        $(document).ready(function () {
           $('#img').click(function () {
              $('#img_goster').slideDown(800);
              $('#img').hide();
           });
            $('#img_kapa').click(function () {
                $('#img_goster').slideUp(800);
                $('#img').show();
            });

            $('#white').click(function () {
                $('#white_goster').slideDown(800);
                $('#white').hide();
            });
            $('#white_kapa').click(function () {
                $('#white_goster').slideUp(800);
                $('#white').show();
            });

            $('#red').click(function () {
                $('#red_goster').slideDown(800);
                $('#red').hide();
            });
            $('#red_kapa').click(function () {
                $('#red_goster').slideUp(800);
                $('#red').show();
            });

            $('#buton').click(function () {
                $('#buton_goster').slideDown(800);
                $('#buton').hide();
            });
            $('#buton_kapa').click(function () {
                $('#buton_goster').slideUp(800);
                $('#buton').show();
            });

            $('#aciklama').click(function () {
                $('#aciklama_goster').slideDown(800);
                $('#aciklama').hide();
            });
            $('#aciklama_kapa').click(function () {
                $('#aciklama_goster').slideUp(800);
                $('#aciklama').show();
            });


        });
    </script>

@endsection
