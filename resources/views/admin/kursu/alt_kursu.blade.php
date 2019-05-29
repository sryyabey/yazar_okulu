@extends('admin.layouts.master')

@section('title','Kürsü Alt Başlıkları')

@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center">Bölüm Ekleme</h3>
                            </div>
                            <hr>
                            <form action="{{route('admin.kursu.alt_kursu_kayit')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                  {{csrf_field()}}
                                <div class="row form-group">
                                    <label for="cc-payment" class="control-label mb-1">Kürsüler</label>
                                    <div class="col-12 col-md-12">
                                        <select name="kursu_id" id="selectLg" class="form-control">
                                            <option value="0">Kürsü Seçin</option>
                                            @foreach($kursus as $kursu)
                                            <option value="{{$kursu->id}}"><img src="{{asset('img')}}/{{$kursu->img}}" class="img-thumbnail" alt=""> {{$kursu->kursu_adi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Konu Başlığı</label>
                                    <input name="baslik" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Konu başlığı">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">İçerik</label>
                                    <textarea name="icerik" class="form-control" id="" cols="30" rows="5"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label mb-1">SEO name</label>
                                            <input name="slug" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-cc-exp="Please enter a valid month and year" placeholder="Seo başlık" autocomplete="cc-exp">
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="x_card_code" class="control-label mb-1">Anahtar Kelimeler</label>
                                        <div class="input-group">
                                            <input name="keywords" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" placeholder="anahtar kelimeler">

                                        </div>
                                    </div>
                                </div>
                                <input name="img" type="file">
                                <hr>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Kayıt
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->

        </div>

        <div class="col-md-6">
             <!-- başlangıc -->


            @foreach($kursus as $kursu)
                <button class="btn btn-secondary btn-block text-light mt-1" id="{{$kursu->id}}">{{$kursu->kursu_adi}}</button>
            <div class="col-lg-12 col-md-12 mt-2" style="display: none" id="open_{{$kursu->id}}">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header user-header alt bg-secondary">
                            <div class="media">
                                <a href="#">
                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{asset('img')}}/{{$kursu->img}}">
                                </a>
                                <div class="media-body">
                                    <h2 class="text-light display-6">{{$kursu->kursu_adi}}</h2>
                                    <p class="text-light">{{$kursu->slug}}</p>
                                </div>
                            </div>
                        </div>


                        <ul class="list-group list-group-flush">
                            @foreach($kursu->alt_kursu as $alt_kursu)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-9">
                                        <a href="#">  {{$alt_kursu->baslik}} </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{route('admin.kursu.alt_kursu_duzenle',$alt_kursu->id)}}" class="badge badge-secondary text-light">Düzenle</a>
                                        <a href="#" class="badge badge-danger text-light">Sil</a>
                                    </div>
                                </div>
                             </li>
                            @endforeach
                        </ul>

                    </section>
                </aside>
                <hr>
            </div>
            @endforeach
            <!-- bitiş -->
        </div>
    </div>
</div>

@endsection

@section('footer')
    @foreach($kursus as $kursu)
    <script>
        $(document).ready(function () {
            $("#{{$kursu->id}}").click(function () {
               $("#open_{{$kursu->id}}").toggle(800);
            });
        });
    </script>
    @endforeach
@endsection