@extends('admin.layouts.master')

@section('title','Yayınlarımız Ekle & Düzenle')

@section('content')
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="breadcrumbs">
                <span id="form" class="btn btn-primary btn-block">Yeni Yayın Ekle</span>
                <hr>
                <div id="form_goster" class="container mt-2" style="display: none">
                    <form action="{{route('admin.icerik.save')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Yayın için başlık</label>
                            <input class="form-control" type="text" name="baslik" placeholder="Yayın Başlığı">
                        </div>
                        <div class="form-group">
                            <label for="">İçerik</label>
                            <textarea class="form-control" type="text" name="icerik" placeholder="Yayın İçeriği"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Yayınlanma Tarihi</label>
                            <input class="form-control" type="date" name="tarih">
                        </div>
                        <div class="form-group">
                            <label for="">Yayın resmi</label>
                            <input class="form-control" type="file" name="img" >
                        </div>
                        <button class="btn btn-primary btn-block">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="breadcrumbs">
                <table id="student" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Baslik</th>
                        <th>içerik</th>
                        <th>yayın tarihi</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($yayinlar as $yayin)
                    <tr>
                        <td><img src="{{asset('img/yayinlar')}}/{{$yayin->img}}" width="80" alt="">
                            <br>
                            @if($yayin->aktif == 0)
                                <a href="{{route('admin.icerik.aktive',$yayin->id)}}" class="badge badge-danger" title="Aktive etmek için tıkla">Pasif</a>
                            @else
                                <a href="{{route('admin.icerik.aktive',$yayin->id)}}" class="badge badge-primary" title="Pasif yapmak için tıkla">Aktif</a>
                            @endif
                        </td>
                        <td>{{$yayin->baslik}}</td>
                        <td>{{str_limit($yayin->icerik,150)}}</td>
                        <td>{{$yayin->tarih}}</td>
                        <td>
                            <a href="{{route('admin.icerik.yayin_update',$yayin->id)}}" title="Düzenle" class="badge badge-primary"><i class="fa fa-pencil"></i></a>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection


@section('footer')

    <script>
        $(document).ready(function () {
           $('#form').click(function () {
              $('#form_goster').slideDown(800);
           });

            $(document).ready(function() {
                $('#student').dataTable({
                    "responsive": true,
                    "dom": '<"html5buttons"B>lTfgitp',
                    "language": {
                        "url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Turkish.json"
                    }
                });

            } );
        });
    </script>

@endsection
