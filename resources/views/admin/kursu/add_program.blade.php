@extends('admin.layouts.master')

@section('title','Program Oluştur')

@section('content')

    <div class="col-md-12">
        <div class="breadcrumbs">

            <div class="card">
                <div class="card-header">
                    <strong class="h2 text-secondary">Yeni Bir Program Ekle</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{route('admin.kursu.save_program')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <label class="h3 text-secondary">Kürsü</label>
                                        <select name="kursu" id="kursu" class="form-control" required>
                                            <option >----</option>
                                            @foreach($kursus as $kursu)
                                            <option value="{{$kursu->id}}">{{$kursu->kursu_adi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <label class="h3 text-secondary">Kürsü alt başlık</label>
                                        <select name="alt_kursu" id="alt_kursu" class="form-control" required>
                                            <option >----</option>
                                            @foreach($alt_kursus as $alt_kursu)
                                                <option value="{{$alt_kursu->id}}" data-chained="{{$alt_kursu->main_kursu_id}}" >{{$alt_kursu->baslik}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <label class="h3 text-secondary">Eğitimci</label>
                                        <select name="egitimci" id="egitimci" class="form-control" required>
                                            <option >----</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->ad}}  {{$teacher->soyad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="h3 text-secondary">Kayıt Başlangıç Tarihi</label>
                                    <div class="input-group">
                                        <input type="date" name="start_date" class="form-control">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="h3 text-secondary">Son Kayıt Tarihi</label>
                                    <div class="input-group">
                                        <input type="date" name="end_date" class="form-control">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="h3 text-secondary">Program Tarihi</label>
                                    <div class="input-group">
                                        <input type="date" name="tarih" class="form-control">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="h3 text-secondary">Kontenjan Kişi</label>
                                    <div class="input-group">
                                        <input type="text" id="text-input" name="kontenjan" placeholder="Rakam olarak giriniz" class="form-control form-control-lg">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="h3 text-secondary">SEO Başlık</label>
                                    <div class="input-group">
                                        <input type="text" id="text-input" name="slug" placeholder="Konu Başlığı SEO için" class="form-control form-control-lg">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="h3 text-secondary">Anahtar Kelimeler</label>
                                    <div class="input-group">
                                        <input type="text" id="text-input" name="keywords" placeholder="Tarih, konferans, denizli, yazar, okul vb..." class="form-control form-control-lg">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="h3 text-secondary">Program İçeriği</label>
                                    <div class="input-group">
                                        <textarea name="icerik" id="icerik_edit" rows="9" placeholder="Program içeriği" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="h3 text-secondary">Program için resim ekleyin</label>
                                    <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-large btn-secondary btn-block">Kayıt</button>
                        </div>


                    </form>
                </div>
            </div>


        </div>
    </div>

@endsection

@section('footer')

    <script src="{{asset('js/jquery.chained.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $("#alt_kursu").chained("#kursu");

            $('#icerik_edit').summernote({
                width: 1080,
                height:400,
            });


        });
    </script>


@endsection
