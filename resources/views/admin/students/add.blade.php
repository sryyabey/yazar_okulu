@extends('admin.layouts.master')

@section('title','Öğrenci Ekle')

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumbs">

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Yeni Öğrenci Kaydı</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <form action="{{route('admin.students.save')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Ad</label>
                                                    <input name="ad" type="text" class="form-control" placeholder="Öğrenci Adı">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Soyad</label>
                                                    <input name="soyad" type="text" class="form-control" placeholder="Öğrenci Soyadı">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Telefon</label>
                                                    <input name="telefon" type="text" class="form-control" placeholder="Telefon Numarası ">
                                                    <small class="text-danger">başında '0' kullanmayın</small>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="select" class=" form-control-label">Meslek</label>

                                                    <select name="meslek" id="select" class="form-control">
                                                        <option value="Öğrenci">Öğrenci</option>
                                                        <option value="Avukat">Avukat</option>
                                                        <option value="Öğretmen">Öğretmen</option>
                                                        <option value="Diğer">Diğer</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Email</label>
                                                    <input name="email" type="email" class="form-control" placeholder="E-mail adresi">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Kullanıcı Şifresi</label>
                                                    <input name="sifre" type="password" class="form-control" placeholder="Kullanıcı Şifresi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="file-input" class=" form-control-label">Resim Ekle</label>
                                                    <input type="file" name="img" class="form-control-file">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <hr>
                                                <small class="text-success ">Bu bölümler isteğe bağlı doldurulabilir ! </small>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="x_card_code" class="control-label mb-1">Doğum Tarihi</label>
                                                <div class="input-group">
                                                    <input style="display: none" id="date_goster" name="birthday" type="date" class="form-control cc-cvc" >
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calendar fa-lg" id="date"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="x_card_code" class="control-label mb-1">TC no</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <span class="text-primary" id="tc">TC</span>
                                                        </div>
                                                        <input style="display: none" id="tc_goster" name="tc" type="text" class="form-control" placeholder="TC numarası">

                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                Kayıt
                                            </button>
                                        </div>
                                    </form>
                                </div></div></div></div>

                </div>
            </div>



            <!-- sağ kolon -->
            <div class="col-md-6">

                <div class="breadcrumbs">
                    <table class="table table-hover table-responsive-lg" id="students" style="width:100%">
                        <tr>
                            <th>resim</th>
                            <th>Ad Soyad</th>
                            <th>Telefon</th>
                            <th>Email</th>

                        </tr>

                        @foreach($students as $student)
                        <tr>
                            <td><img src="{{asset('img')}}/{{$student->img}}" class="img-thumbnail" alt=""></td>
                            <td>{{$student->ad}} {{$student->soyad}}</td>
                            <td>{{$student->telefon}}</td>
                            <td>{{$student->email}}</td>

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
              $('#date').click(function () {
                  $('#date_goster').show(800)
              });

              $('#tc').click(function () {
                  $('#tc_goster').show(80)
              });

               $('#students').DataTable();
           });
       </script>


   @endsection
