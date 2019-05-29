@extends('admin.layouts.master')

@section('title','Galeri ekle düzenle')


@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="breadcrumbs">
                <div class="container">
                    <h3 class="text-center mt-1">Resim Ekle</h3>
                    <hr>
                <button id="img" class="btn btn-primary btn-block">Resim Galeri Ekle</button>
                <hr>
                <div class="img_goster" >
                <form action="{{route('admin.icerik.galeri_save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Başlık Ekle</label>
                        <input type="text" class="form-control" name="baslik" placeholder="Resim için açıklama giriniz">
                    </div>
                    <div class="form-group">
                        <label for="">Resim Ekle</label>
                        <input type="file" class="form-control" name="img">
                    </div>
                    <button type="submit" name="resim" class="btn btn-primary btn-block">Kaydet</button>

                </form>
                </div>
                </div>
                <table class="table table-hover">
                    <tr>
                        <th>resim</th>
                        <th>baslik</th>
                        <th>İşlem</th>
                    </tr>
                    @foreach($resims as $key => $resim)
                        <tr>
                            <td><img src="{{asset('img/galeri')}}/{{$resim->img}}" width="100" alt=""></td>
                            <td>{{$resim->baslik}} </td>
                            <td  id="{{$key}}"> <i title="düzenle" class="fa fa-pencil"></i></td>
                        </tr>
                        <tr style="display: none" id="{{$key}}_goster">
                            <td>
                                <form action="{{route('admin.icerik.galeri_update')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$resim->id}}">
                                    <div class="form-group">
                                        <label for="">Başlık Ekle</label>
                                        <input type="text" class="form-control" name="baslik" value="{{$resim->baslik}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Resim Ekle</label>
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                    <button type="submit" name="resim" class="btn btn-primary">Güncelle</button> | <a class="btn btn-danger"
                                            href="{{route('admin.icerik.galeri_delete',$resim->id)}}">SİL</a>

                                </form>
                            </td>
                        </tr>

                    @endforeach
                </table>

            </div>
        </div>

        <div class="col-md-6">
            <div class="breadcrumbs">
                <div class="container">
                    <h3 class="text-center mt-1">Video Ekle</h3>
                    <hr>
                    <button id="video" class="btn btn-success btn-block">Video Galeri Ekle</button>
                    <hr>
                    <div class="video_goster" >
                        <form action="{{route('admin.icerik.galeri_save')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">

                                <label for="">Başlık Ekle</label>
                                <input type="text" class="form-control" name="baslik" placeholder="Resim için açıklama giriniz">
                            </div>
                            <div class="form-group">
                                <label for="">Video Ekle</label>
                                <input type="text" class="form-control" name="youtube" placeholder="Youtube linki ekle">
                            </div>
                            <button type="submit" name="video" class="btn btn-success btn-block">Kaydet</button>

                        </form>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <th>Başlık</th>
                            <th>video</th>
                            <th>İşlem</th>
                        </tr>
                        @foreach($videos as $key => $video)
                        <tr>
                            <td>{{$video->baslik}}</td>
                            <td>
                                <iframe src="{{$video->video}}" frameborder="0"></iframe>
                            </td>
                            <td id="{{$key}}_video">
                                <i class="fa fa-pencil"></i>
                            </td>
                        </tr>
                        <tr id="{{$key}}_video_goster" style="display: none">

                            <td>
                                <form action="{{route('admin.icerik.video_update')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">

                                        <input type="hidden" name="id" value="{{$video->id}}">
                                        <label for="">Başlık Ekle</label>
                                        <input type="text" class="form-control" name="baslik" value="{{$video->baslik}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Video Ekle</label>
                                        <input type="text" class="form-control" name="youtube" value="{{$video->video}}">
                                    </div>
                                    <button type="submit" name="video" class="btn btn-danger">Güncelle</button> | <a class="btn btn-success"
                                            href="{{route('admin.icerik.video_delete',$video->id)}}">Sİl</a>

                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </table>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @foreach($resims as $key => $resim)
    <script>
        $(document).ready(function () {
            $('#{{$key}}').click(function () {
                $('#{{$key}}_goster').toggle(500);
            }) ;
        });
    </script>
    @endforeach
    @foreach($videos as $key => $video)
        <script>
            $(document).ready(function () {
                $('#{{$key}}_video').click(function () {
                    $('#{{$key}}_video_goster').toggle(500);
                }) ;
            });
        </script>
    @endforeach
@endsection
