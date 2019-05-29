@extends('admin.layouts.master')

@section('title','Eğitimciler Güncelleme')

@section('content')


    <div class="col-md-12">
        <div class="row mt-2">
            <!-- sap kolon -->
            <div class="col-md-6">
                <div class="breadcrumbs">

                    <div class="card mt-2">
                        <div class="card-header">
                            <strong class="card-title">{{$teacher->ad}} {{$teacher->soyad}}</strong>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <img class="rounded border border-dark" width="150" src="{{asset('img')}}/{{$teacher->img}}" alt="">
                                    <p><button id="img" class="btn btn-secondary mt-1">Resim Güncelle</button></p>
                                </li>
                                <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-8">
                                        <button id="update" class="btn btn-primary btn-block">Güncelle</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button id="sil" class="btn btn-danger btn-block">SİL</button> <button style="display: none" id="iptal" class="btn btn-primary btn-block">İptal</button>
                                    </div>
                                </div>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-dark">{{$alt_kursu->kursu->kursu_adi}} <i class="fa fa-arrow-right text-success" aria-hidden="true"></i>
  {{$alt_kursu->baslik}} </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-secondary"> Ad & Soyad <i class="fa fa-arrow-right text-dark" aria-hidden="true"></i> </span> <span class="text-dark"> {{$teacher->ad}} {{$teacher->soyad}} </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-secondary"> Branş <i class="fa fa-arrow-right text-dark" aria-hidden="true"></i> </span> <span class="text-dark "> {{$teacher->brans}} </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-secondary"> Sosyal Medya <i class="fa fa-arrow-right text-dark" aria-hidden="true"></i> </span> <span class="text-dark "> {{$teacher->sosyal_medya}} </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-secondary"> Telefon <i class="fa fa-arrow-right text-dark" aria-hidden="true"></i> </span> <span class="text-dark "> {{$teacher->telefon}} </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-secondary"> E-mail <i class="fa fa-arrow-right text-dark" aria-hidden="true"></i> </span> <span class="text-dark "> {{$teacher->email}} </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-dark"> Açıklamalar <i class="fa fa-arrow-right text-dark" aria-hidden="true"></i> </span>
                                    <br>
                                    <span class="text-dark "> {!! $teacher->icerik !!} </span>
                                </li>

                            </ul>

                        </div>
                    </div>

                </div>
            </div>

            <!-- sol kolon -->
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <div id="form" style="display:none;">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Güncelleme Formu</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <hr>
                                        <form action="{{route('admin.teacher.guncelle')}}" method="post" novalidate="novalidate">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$teacher->id}}">
                                            <div class="row">
                                                <div class="col-md-6">

                                                        <select name="" id="kursu" class="form-control-sm form-control">
                                                            <option value="{{$alt_kursu->kursu->id}}">{{$alt_kursu->kursu->kursu_adi}}</option>
                                                            @foreach($kursus as $kursu)
                                                            <option value="{{$kursu->id}}">{{$kursu->kursu_adi}}</option>
                                                            @endforeach
                                                        </select>

                                                </div>
                                                <div class="col-md-6">

                                                    <select name="" id="alt_kursu" class="form-control-sm form-control">
                                                        <option value="{{$alt_kursu->id}}" data-chained="{{$alt_kursu->main_kursu_id}}>{{$alt_kursu->baslik}}</option>
                                                        @foreach($alt_kursus as $alt_kursu)
                                                        <option value="{{$alt_kursu->id}}" data-chained="{{$alt_kursu->main_kursu_id}}">{{$alt_kursu->baslik}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Ad</label>
                                                        <input id="cc-pament" name="ad" type="text" class="form-control"  value="{{$teacher->ad}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Soyad</label>
                                                        <input id="cc-pament" name="soyad" type="text" class="form-control" value="{{$teacher->soyad}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Branş</label>
                                                        <input id="cc-pament" name="brans" type="text" class="form-control"  value="{{$teacher->brans}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Sosyal medya</label>
                                                        <input id="cc-pament" name="sosyal_medya" type="text" class="form-control" value="{{$teacher->sosyal_medya}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Telefon</label>
                                                        <input id="cc-pament" name="telefon" type="text" class="form-control"  value="{{$teacher->telefon}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">E-mail</label>
                                                        <input id="cc-pament" name="email" type="text" class="form-control" value="{{$teacher->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 ">
                                                <textarea name="icerik" id="icerik_edit" rows="9"  class="form-control">{!! $teacher->icerik !!}</textarea>
                                                <hr>
                                            </div>


                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    Güncelle
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div id="delete" style="display:none;">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Bu kişiyi silmek istediğine emin misin?</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded mx-auto d-block" src="{{asset('img')}}/{{$teacher->img}}" alt="Card image cap">
                                <h5 class="text-sm-center mt-2 mb-1">{{$teacher->ad}} {{$teacher->soyad}}</h5>
                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{$alt_kursu->baslik}} / {{$teacher->brans}}</div>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <a class="btn btn-danger btn-block" href="{{route('admin.teacher.delete',$teacher->id)}}">SİL</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="resim" style="display: none">
                    <div class="card">
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded mx-auto d-block" src="{{asset('img')}}/{{$teacher->img}}" alt="Card image cap">
                                <h5 class="text-sm-center mt-2 mb-1">{{$teacher->ad}} {{$teacher->soyad}}</h5>
                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{$alt_kursu->baslik}} / {{$teacher->brans}}</div>
                                <form action="{{route('admin.teacher.image_update')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$teacher->id}}">
                                <input class="btn btn-secondary" type="file" name="img">
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <button class="btn btn-secondary btn-block" type="submit">Güncelle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </div>

@endsection

@section('footer')
    <script src="{{asset('js/jquery.chained.min.js')}}"></script>

    <script>
        $(document).ready(function () {
           $("#img").click(function () {
               $("#resim").toggle(800);
           });

           $("#update").click(function () {
               $("#form").toggle(800);

           });
           $('#sil').click(function () {
               $('#delete').slideDown(800);
               $("#sil").hide();
               $("#iptal").show();

           });

           $("#iptal").click(function () {
              $('#delete').slideUp(800);
              $("#iptal").hide();
              $("#sil").show();
           });

            $("#alt_kursu").chained("#kursu");
            $('#icerik_edit').summernote();
        });
    </script>

@endsection