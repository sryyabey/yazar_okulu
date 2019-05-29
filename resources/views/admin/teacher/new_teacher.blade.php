@extends('admin.layouts.master')

@section('title','Eğitimci Ekle')

@section('content')

 <div class="col-md-12">
     <div class="breadcrumbs">
         <div class="row">
             <div class="col-md-12">
                 <div class="breadcrumbs">
                     <div class="card mt-2">
                         <div class="card-header">
                             <strong class="card-title">Eğitimci Ekle</strong>
                         </div>
                         <div class="card-body">
                             <!-- Credit Card -->
                             <div id="pay-invoice">
                                 <div class="card-body">

                                     <h3 class="text-secondary">Yer Alacağı Kürsü</h3>
                                     <hr>

                                     <form action="{{route('admin.teacher.save_teacher')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                         {{ csrf_field() }}
                                         <div class="row">
                                             <div class="col-md-6">

                                                 <div class="form-group">
                                                     <label for="cc-payment" class="control-label mb-1">Kürsü</label>

                                                         <select name="select" id="kursu" class="form-control">
                                                             <option value="0">----------</option>
                                                             @foreach($kursus as $kursu)
                                                             <option value="{{$kursu->id}}" >{{$kursu->kursu_adi}}</option>
                                                             @endforeach
                                                         </select>

                                                 </div>
                                             </div>
                                             <div class="col-md-6">
                                                 <div class="form-group">
                                                     <label for="cc-payment" class="control-label mb-1">Program</label>

                                                     <select name="alt_kursu_id" id="alt_kursu" class="form-control">
                                                         <option value="0">----------</option>
                                                         @foreach($alt_kursus as $alt_kursu)
                                                         <option value="{{$alt_kursu->id}}" data-chained="{{$alt_kursu->main_kursu_id}}">{{$alt_kursu->baslik}}</option>
                                                         @endforeach
                                                     </select>

                                                 </div>
                                             </div>
                                         </div>
                                         <hr>
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <div class="form-group">
                                                     <label for="cc-payment" class="control-label mb-1">Ad </label>
                                                     <input id="cc-pament" name="ad" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                 </div>
                                             </div>
                                             <div class="col-md-6">
                                                 <div class="form-group">
                                                     <label for="cc-payment" class="control-label mb-1">Soyadı</label>
                                                     <input id="cc-pament" name="soyad" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <div class="form-group">
                                                     <label for="cc-payment" class="control-label mb-1">Branş</label>
                                                     <input id="cc-pament" name="brans" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                 </div>
                                             </div>
                                             <div class="col-md-6">
                                             <label for="x_card_code" class="control-label mb-1">Sosyal Medya Hesabı</label>
                                             <div class="input-group">
                                                 <input id="x_card_code" name="sosyal_medya" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                 <div class="input-group-addon">
                                                     <span class="fa fa-facebook fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                                 </div>
                                             </div>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-md-6">
                                                 <label for="x_card_code" class="control-label mb-1">Telefon</label>
                                                 <div class="input-group">
                                                     <input id="x_card_code" name="telefon" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                     <div class="input-group-addon">
                                                         <span class="fa fa-phone fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-md-6">
                                                 <label for="x_card_code" class="control-label mb-1">E-mail</label>
                                                 <div class="input-group">
                                                     <input id="x_card_code" name="email" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                     <div class="input-group-addon">
                                                         <span class="fa fa-envelope-o fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-md-12 mt-4">

                                             <div class="form-group">
                                                 <label for="textarea-input" class=" form-control-label">Program Kapsamında Sunacağı İçerik (Müfredat) </label>
                                                 <textarea name="icerik" id="icerik_edit" rows="10" placeholder="İçerik..." class="form-control"></textarea>
                                             </div>

                                             <div class="form-group mt-4">
                                                 <label for="file-input" class=" form-control-label">Resim Yükle</label>
                                                 <input type="file" id="file-input" name="img" class="form-control-file">
                                             </div>
                                         </div>
                                         <div class="mt-4">
                                             <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                 Kayıt
                                             </button>
                                         </div>
                                     </form>
                                 </div>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>

             <!-- sağ kolon -->

         </div>
     </div>
 </div>

@endsection


@section('footer')

    <script src="{{asset('js/jquery.chained.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $("#alt_kursu").chained("#kursu");

            $('#icerik_edit').summernote();


        });
    </script>


@endsection