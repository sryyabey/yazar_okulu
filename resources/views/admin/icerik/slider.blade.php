@extends('admin.layouts.master')

@section('title','Slider Ekle | Caorusel Ekle')

@section('content')



    <div class="row ml-1 mt-1">
        <div class="col-md-6">
            <div class="breadcrumbs">
                <!-- sol bölüm başlangıcı -->
                <button id="form" class="btn btn-primary btn-block mt-1">Yeni Ekle</button>
                <button id="form_kapa" class="btn btn-success btn-block" style="display: none">Kapat</button>
                <hr>
                <form action="{{route('admin.icerik.slide_save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div id="form_goster" style="display: none">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ad Beyaz</label>
                                <input name="ad_white" class="form-control" type="text" placeholder="Ad beyaz">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ad Kırmızı</label>
                                <input name="ad_red" class="form-control" type="text" placeholder="Ad kırmızı">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Buton Adı</label>
                                <input name="buton_ad" class="form-control" type="text" placeholder="Buton Adı">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Resim ekle</label>
                                <input type="file" name="img">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label >İçerik</label>
                            <textarea class="form-control" name="icerik" id="" cols="30" rows="10"></textarea>
                        </div>

                        <hr>
                        <button class="btn btn-primary btn-block" type="submit">kaydet</button>
                    </div>
                </div>
                </form>


                <!-- tablo oluştur -->







 <!-- sol menü  sonu -->
            </div>
        </div>




        <!-- sağ menü -->
        <div class="col-md-6">

            <div class="breadcrumbs">
                <table id="student" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>ad_beyaz</th>
                        <th>ad_kırmızı</th>
                        <th>buton adı</th>
                        <th>açıklama</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($sliders as $slider)
                    <tr>
                        <td>
                            <img src="{{asset('img/slider')}}/{{$slider->img}}" width="150" alt=""> <br>
                            @if($slider->aktif == 0)
                                <a href="{{route('admin.icerik.slide_aktive',$slider->id)}}" class="badge badge-danger" title="aktive etmek için tıkla">Pasif</a>
                            @else
                                <a href="{{route('admin.icerik.slide_aktive',$slider->id)}}" class="badge badge-primary" title="pasifize etmek için tıkla">Aktif</a>
                            @endif
                        </td>
                        <td>{{$slider->ad_white}}</td>
                        <td>{{$slider->ad_red}}</td>
                        <td>{{$slider->buton_ad}}</td>
                        <td title="{{$slider->aciklama}}">{{str_limit($slider->aciklama,50)}}</td>
                        <td>
                            <a href="{{route('admin.icerik.slider_update',$slider->id)}}" class="badge badge-primary text-light" title="düzenle"><i class="fa fa-pencil fa-2x"></i></a>
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
               $('#form_kapa').show();
               $('#form').hide();
           }) ;

            $('#form_kapa').click(function () {
                $('#form_goster').slideUp(800);
                $('#form_kapa').hide();
                $('#form').show();
            }) ;

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
