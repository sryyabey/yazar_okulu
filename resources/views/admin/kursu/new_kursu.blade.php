@extends('admin.layouts.master')

@section('title','Yeni Kürsü Aç')

@section('content')



    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Yeni Kürsü Aç</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{route('admin.kursu.kursu_kayit')}}" method="post" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Kürsü Adı</label>
                                    <input id="cc-pament" name="kursu_adi" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Kürsü Adı veya Başlığı" required="">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">İçerik</label>
                                    <textarea id="icerik" name="icerik" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00" required=""></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Seo Başlık</label>
                                            <input id="cc-pament" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="SEO başlık arama motorları için" required="">
                                            <small>Bu alanda yazılan başlık arama motorları içindir!</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Anahtar Kelimeler</label>
                                            <input id="cc-pament" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Anahtar Kelimeler" required="">
                                            <small>Kullanım -> felsefe, yeni kurs, tarhi vb</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="file" name="img">
                                </div>


                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Kaydet
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-6 ">
                <div class="breadcrumbs">
                <h4 class="text-center text-secondary mt-2">Kürsüler</h4>
                <table class="table table-hover table-responsive-sm mt-1 ">
                    <tr>
                        <th>Resim</th>
                        <th>Kürsü</th>
                        <th>Seo Başlık</th>
                        <th>Anahtar Kelimeler</th>
                        <th>Düzenle</th>
                    </tr>
                    @foreach($kursus as $kursu)
                    <tr>
                        <td><img class="img-thumbnail" src="{{asset('img')}}/{{$kursu->img}}" alt=""></td>
                        <td>{{$kursu->kursu_adi}}</td>
                        <td>{{$kursu->slug}}</td>
                        <td >{!! str_limit($kursu->keywords,50) !!}</td>

                        <td id="gizle">
                            <a href="{{route('admin.kursu.kursu_duzenle',$kursu->id)}}" title="Düzenle" class="badge badge-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{route('admin.kursu.kursu_duzenle',$kursu->id)}}" id="sil" title="Sil" class="badge badge-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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
    <script>
        $(document).ready(function () {
            $("#sil").click(function () {
                $('#gizle').hide();
                $("#sil_button").show();
            });
            $(document).ready(function() {
                $('#icerik').summernote();
            });
        })
    </script>


@endsection
