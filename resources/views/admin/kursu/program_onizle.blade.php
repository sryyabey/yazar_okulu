@extends('admin.layouts.master')

@section('title',$program->slug)

@section('content')


        <div class="col-md-12 mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumbs">

                        <div class="card mt-4 ml-3">
                            <img src="{{asset('img')}}/{{$program->img}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-secondary text-center">{{$program->slug}}</h3>
                                <div class="row">

                                    <div class="col-md-12">
                                        <button id="delete" class="btn btn-danger btn-block btn-large mt-1">Sil</button>
                                        <button id="iptal" style="display: none" class="btn btn-primary btn-block btn-large mt-1">İptal</button>
                                    </div>
                                </div>
                                <hr>
                                <label for="" class="text-secondary h5">
                                    Düzenleme yapmak istediğiniz başlığın üzerine çift tıklayın!!
                                </label>

                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item"><span class="text-dark h4">Kaydı Yapan :</span> <span class="text-secondary h4">{{$program->user->name}} </span></li>
                                    <li class="list-group-item" id="name" title="Düzenlemek için çift tıklayın"><span class="text-dark h4">Eğitimci :</span> <span class="text-secondary h4">{{$program->egitimci->ad}} {{$program->egitimci->soyad}}</span></li>
                                        <li class="list-group-item" id="ad" style="display:none;">
                                            <form action="{{route('admin.kursu.program_update')}}" method="post">
                                                {{csrf_field()}}
                                                <div class="form-group">

                                                    <div class="row">
                                                       <div class="col-md-9">
                                                           <input type="hidden" name="id" value="{{$program->id}}">
                                                        <select name="egitimci" id="egitimci" class="form-control" required>
                                                            <option value="{{$program->egitimci->id}}">{{$program->egitimci->ad}} {{$program->egitimci->soyad}}</option>
                                                            @foreach($teachers as $teacher)
                                                                <option value="{{$teacher->id}}">{{$teacher->ad}}  {{$teacher->soyad}}</option>
                                                            @endforeach
                                                        </select>
                                                       </div>
                                                        <div class="col-md-3">
                                                            <button class="btn btn-success btn-block">Değiştir</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </li>


                                    <li class="list-group-item" id="chair"><span class="text-dark h4">Kürsü :</span> <span class="text-secondary h4">{{$program->AltKursu->baslik}} --- {{$program->AltKursu->kursu->kursu_adi}}</span></li>

                                    <li class="list-group-item" id="chair_open" style="display: none">
                                        <div class="form-group">
                                            <form action="{{route('admin.kursu.program_update')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$program->id}}">
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <label class="h3 text-secondary">Kürsü</label>
                                                    <select name="kursu" id="kursu" class="form-control" required>
                                                        <option value="" >{{$program->AltKursu->kursu->kursu_adi}}</option>
                                                        @foreach($kursus as $kursu)
                                                            <option value="{{$kursu->id}}">{{$kursu->kursu_adi}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <label class="h3 text-secondary">Bölüm</label>
                                                    <select name="alt_kursu" id="alt_kursu" class="form-control" required>
                                                        <option  value="{{$program->AltKursu->id}}>{{$program->AltKursu->baslik}}</option>
                                                        @foreach($alt_kursus as $alt_kursu)
                                                            <option value="{{$alt_kursu->id}}" data-chained="{{$alt_kursu->main_kursu_id}}" >{{$alt_kursu->baslik}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                                <button class="btn btn-success btn-block">Değiştir</button>
                                            </form>

                                        </div>
                                    </li>

                                    <li class="list-group-item" id="start_date"><span class="text-dark h4">Kayıt Başlangıcı :</span> <span class="text-secondary h4">{{date('d-m-y', strtotime($program->start_date))}}</span></li>
                                    <li class="list-group-item" id="start_date_open" style="display:none;">
                                        <form action="{{route('admin.kursu.program_update')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="id" value="{{$program->id}}">
                                                        <div class="input-group">
                                                            <input type="date" name="start_date" class="form-control">
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button class="btn btn-success btn-block">Değiştir</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </li>
                                    <li class="list-group-item" id="end_date"><span class="text-dark h4">Kayıt Sonu :</span> <span class="text-secondary h4">{{date('d-m-y', strtotime($program->end_date))}}</span></li>
                                    <li class="list-group-item" id="end_date_open" style="display:none;">
                                        <form action="{{route('admin.kursu.program_update')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="id" value="{{$program->id}}">
                                                        <div class="input-group">
                                                            <input type="date" name="end_date" class="form-control">
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button class="btn btn-success btn-block">Değiştir</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </li>

                                    <li class="list-group-item" id="tarih"><span class="text-dark h4">Program Tarihi :</span> <span class="text-secondary h4">{{date('d-m-y', strtotime($program->tarih))}}</span></li>
                                    <li class="list-group-item" id="tarih_open" style="display:none;">
                                        <form action="{{route('admin.kursu.program_update')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="id" value="{{$program->id}}">
                                                        <div class="input-group">
                                                            <input type="date" name="tarih" class="form-control">
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button class="btn btn-success btn-block">Değiştir</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </li>

                                    <li class="list-group-item" id="kontenjan"><span class="text-dark h4">Kontenjan :</span> <span class="text-secondary h4">{{$program->kontenjan}}</span></li>
                                    <li class="list-group-item" id="kontenjan_open" style="display:none;">
                                        <form action="{{route('admin.kursu.program_update')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="id" value="{{$program->id}}">
                                                        <div class="input-group">
                                                            <input type="text" id="text-input" name="kontenjan" placeholder="Rakam olarak giriniz" class="form-control form-control-lg">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button class="btn btn-success btn-block">Değiştir</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </li>

                                    <li class="list-group-item" id="keywords"><span class="text-dark h4">Anahtar Kelimeler :</span> <span class="text-secondary h4">{{$program->keywords}}</span></li>
                                    <li class="list-group-item" id="keywords_open" style="display:none;">
                                        <form action="{{route('admin.kursu.program_update')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="id" value="{{$program->id}}">
                                                        <div class="input-group">
                                                            <input type="text" id="text-input" name="keywords" placeholder="Tarih, konferans, denizli, yazar, okul vb..." class="form-control form-control-lg">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button class="btn btn-success btn-block">Değiştir</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </li>
                                    <li class="list-group-item" id="onay"><span class="text-dark h4">Onay :</span> <span class="text-secondary h4">
                                            @if($program->onay == 1)
                                            <button class="btn btn-primary">Onaylı</button>
                                            @else
                                            <button class="btn btn-danger">Onay Bekliyor</button>
                                            @endif
                                        </span></li>
                                    <li class="list-group-item" id="onay_open" style="display:none;">
                                        <form action="{{route('admin.kursu.program_update')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="id" value="{{$program->id}}">
                                                        <div class="row form-group">
                                                            <div class="col-12 col-md-12">

                                                                <select name="onay" id="onay" class="form-control" required>
                                                                    <option  value="1" class="text-secondary">Onayla</option>
                                                                    <option  value="0" class="text-danger">Onay İptal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button class="btn btn-success btn-block">Değiştir</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </li>

                                    <li class="list-group-item" id="konu"><span class="text-dark h4">Konu :</span> <span class="text-secondary h4">{!! $program->konu !!}</span></li>
                                    <li class="list-group-item" id="konu_open" style="display:none;">
                                        <form action="{{route('admin.kursu.program_update')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="id" value="{{$program->id}}">
                                                        <div class="input-group">
                                                            <textarea name="icerik" id="icerik_edit" rows="9" placeholder="Program içeriği" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button class="btn btn-success btn-block">Değiştir</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </li>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="breadcrumbs">




                        <div class="card mt-3" style="display: none" id="sil">
                            <h2 class="card-header text-center">{{$program->slug}}</h2>
                            <div class="card-body">
                            <p class="h4 text-secondary">Eğitimci: {{$program->egitimci->ad}} {{$program->egitimci->soyad}}</p>
                            <p class="h4 text-secondary">Kürsü: {{$program->AltKursu->baslik}} {{$program->AltKursu->kursu->kursu_adi}}</p>
                                <a href="{{route('admin.kursu.program_del',$program->id )}}" class="btn btn-danger btn-block">SİL</a>
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
           $('#update').click(function () {
               $('#guncelle').toggle(800);
           }) ;

           $('#delete').click(function () {
              $('#sil').slideDown(800);
              $('#iptal').show();
              $('#delete').hide();
           });

            $('#iptal').click(function () {
                $('#sil').slideUp(800);
                $('#iptal').hide();
                $('#delete').show();
            });

            $('#icerik_edit').summernote();
            $("#alt_kursu").chained("#kursu");

            $('#name').dblclick(function () {
                $('#ad').toggle(300)
            });

            $('#chair').dblclick(function () {
                $('#chair_open').toggle(300)
            });

            $('#start_date').dblclick(function () {
                $('#start_date_open').toggle(300)
            });

            $('#end_date').dblclick(function () {
                $('#end_date_open').toggle(300)
            });

            $('#tarih').dblclick(function () {
                $('#tarih_open').toggle(300)
            });

            $('#kontenjan').dblclick(function () {
                $('#kontenjan_open').toggle(300)
            });

            $('#keywords').dblclick(function () {
                $('#keywords_open').toggle(300)
            });

            $('#konu').dblclick(function () {
                $('#konu_open').toggle(300);
                $('#konu').hide();
            });
            $('#konu_open').dblclick(function () {
                $('#konu').toggle(300);
                $('#konu_open').hide();
            });

            $('#onay').click(function () {
                $('#onay_open').toggle(300)
            });

        });
    </script>

@endsection
