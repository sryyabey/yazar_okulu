@extends('admin.layouts.master')

@section('title','haber & duyuru ekle düzenle')

@section('content')

    <div class="contaner ml-2 mt-2">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <button id="form" class="btn btn-primary btn-block">Yeni Haber & Duyuru Ekle</button>
                    <hr>

                    <div id="form_goster" style="display: none">
                        <form action="{{route('admin.icerik.news_save')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="">Haber Başlığı</label>
                                <input class="form-control" type="text" name="baslik" placeholder="Haber başlığı girin">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tarih Girin</label>
                                        <input class="form-control" type="date" name="tarih">
                                        <small>bu alan isteğe bağlı olarak doldurulabilir!</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Resim</label>
                                        <input class="form-control" type="file" name="img">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Başlama Saati Girin</label>
                                        <input class="form-control" type="time" name="start_time">
                                        <small>bu alan isteğe bağlı olarak doldurulabilir!</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Bitiş Saati Girin</label>
                                        <input class="form-control" type="time" name="end_time">
                                        <small>bu alan isteğe bağlı olarak doldurulabilir!</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Haber veya Duyurunuz</label>
                                <textarea class="form-control" name="icerik" id="exampleFormControlTextarea1" rows="3" placeholder="haber veya duyurunuzu bu alana giriniz"></textarea>
                            </div>
                            <button class="btn btn-primary btn-block">kaydet</button>

                        </form>
                    </div>
                </div>
            </div>



            <!-- table bölümü -->
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <table id="student" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Haber Başlık</th>
                            <th>Tarih</th>
                            <th>Saat</th>
                            <th>içerik</th>
                            <th>işlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newses as $news)
                        <tr>
                            <td>{{$news->baslik}} <br>
                                @if($news->aktif == 0)
                                    <a href="{{route('admin.icerik.news_aktive',$news->id)}}" class="badge badge-danger">Pasif</a>
                                @else
                                    <a href="{{route('admin.icerik.news_aktive',$news->id)}}" class="badge badge-primary">Aktif</a>
                                @endif
                            </td>
                            <td>{{$news->tarih}}</td>
                            <td>{{$news->start_time}} - {{$news->end_time}}</td>
                            <td>{{str_limit($news->icerik,80)}}</td>
                            <td><a href="{{route('admin.icerik.news_update',$news->id)}}" title="güncelle sil"><i class="fa fa-pencil"></i></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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

            $('#student').dataTable({
                "responsive": true,
                "dom": '<"html5buttons"B>lTfgitp',
                "language": {
                    "url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Turkish.json"
                }
            });
        });
    </script>
@endsection
