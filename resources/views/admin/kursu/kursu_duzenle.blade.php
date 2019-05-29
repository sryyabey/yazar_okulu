@extends('admin.layouts.master')
@section('title','Kürsü Düzenle')

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <h2 class="text-primary">Kürsüsü Düzenleme Sayfası</h2>
                    <h3 class="text-secondary">{{$kursu->kursu_adi}} </h3>
                    <hr>
                    <img class="rounded" src="{{asset('img')}}/{{$kursu->img}}" alt=""><br>

                    <div class="row">
                        <div class="col-md-8">
                            <p class="btn btn-secondary btn-block mt-3" id="update_button">Düzenle</p>
                        </div>
                        <div class="col-md-4">
                            <p class="btn btn-danger btn-block mt-3" id="sil">SİL</p>
                            <p style="display: none" class="btn btn-primary btn-block mt-3" id="iptal">İPTAL</p>
                        </div>
                    </div>
                    <p class="text-dark h3"><span class="text-secondary"> Kürsü Adı:</span> {{$kursu->kursu_adi}} </p>
                    <hr>
                    <p>
                        <p class="h3 text-secondary">İçerik Bilgileri:</p>
                    <hr>
                        {!! $kursu->icerik !!}
                    </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="h3 text-secondary">SEO Başlık</p>
                            <hr>
                            <p class="text-dark">{{$kursu->slug}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="h3 text-secondary">Anahtar Kelimeler</p>
                            <hr>
                            <p class="text-dark">{{$kursu->keywords}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="breadcrumbs">

                    <div style="display:none;" id="sil_form">
                        <div class="card border border-secondary">
                            <div class="card-header">
                                <strong class="card-title">{{$kursu->kursu_adi}}</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{$kursu->icerik}}</p>
                                <p class="text-danger h3">Bu Kürsüyü Silmek İstediğinize Emin misiniz?</p>
                                <a class="btn btn-danger btn-block" href="{{route('admin.kursu.kursu_sil',$kursu->id)}}">Evet Sil</a>
                            </div>
                        </div>
                    </div>


                    <div id="form" style="display: none">

                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <form action="{{route('admin.kursu.kursu_update')}}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$kursu->id}}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Kürsü Adı</label>
                                            <input id="cc-pament" name="kursu_adi" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kursu->kursu_adi}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">İçerik</label>
                                            <textarea id="icerik" name="icerik" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00" required="">{{$kursu->icerik}}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Seo Başlık</label>
                                                    <input id="cc-pament" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kursu->slug}}" >
                                                    <small>Bu alanda yazılan başlık arama motorları içindir!</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Anahtar Kelimeler</label>
                                                    <input id="cc-pament" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kursu->keywords}}">
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
            </div>
        </div>
    </div>


    <div class="col-md-12 ">
        <hr>
        <footer class="bg-secondary">
       <span class="text-light ml-3">DENİZLİ YAZAR OKULU</span>
        </footer>
    </div>



@endsection

@section('footer')

    <script>
        $(document).ready(function () {
           $("#update_button").click(function () {
               $("#form").toggle(800);
           });

           $('#sil').click(function () {
               $('#sil').hide();
               $('#iptal').show();
               $("#sil_form").show(800)
           });
            $('#iptal').click(function () {
                $('#iptal').hide();
                $('#sil').show();
                $("#sil_form").hide(800)
            });
            $(document).ready(function() {
                $('#icerik').summernote();
            });
        });
    </script>

@endsection