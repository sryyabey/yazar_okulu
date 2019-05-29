@extends('admin.layouts.master')

@section('title')
  Denizli Yazar Okulu - {{$student->ad}} - {{$student->soyad}}
@endsection

@section('content')


    <div class="col-md-12">
        <div class="row">
            <!-- sağ kolon başlangıç -->
            <div class="col-md-6">

                <section class="card">
                    <div class="twt-feed blue-bg">
                        <div class="corner-ribon black-ribon">
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" id="form_open"></i></a>
                        </div>
                        <div class="fa fa-twitter wtt-mark"></div>

                        <div class="media">
                            <a href="#">
                                <img class="align-self-center rounded mr-3" id="img" title="Resmi Güncelle" style="width:85px; height:85px;" alt="{{$student->ad}} profil resmi" src="{{asset('img')}}/{{$student->img}}">
                            </a>
                            <div class="media-body">
                                <h2 class="text-white display-6">{{$student->ad}} {{$student->soyad}}</h2>
                                <p class="text-light">{{$student->meslek}}</p>
                            </div>
                        </div>



                    </div>

                    <div class="twt-write col-sm-12">

                        <!-- update form -->
                        <div class="" >

                                <div class="breadcrumbs">
                                    <div class="card" style="display: none" id="img_update">
                                        <form action="{{route('admin.students.img')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$student->id}}">
                                            <input type="file" name="img">
                                            <button class="btn btn-info btn-block">Güncelle</button>
                                        </form>
                                    </div>

                                    <div class="card" style="display:none;" id="form_update">
                                        <div class="card-header">
                                            <strong class="card-title">Update formu</strong>
                                        </div>
                                        <div class="card-body">
                                            <!-- Credit Card -->
                                            <div id="pay-invoice">
                                                <div class="card-body">
                                                    <form action="{{route('admin.students.update')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$student->id}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Ad</label>
                                                                    <input name="ad" type="text" class="form-control" value="{{$student->ad}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Soyad</label>
                                                                    <input name="soyad" type="text" class="form-control" value="{{$student->soyad}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Telefon</label>
                                                                    <input name="telefon" type="text" class="form-control" value="{{$student->telefon}}">
                                                                    <small class="text-danger">başında '0' kullanmayın</small>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="select" class=" form-control-label">Meslek</label>

                                                                    <select name="meslek" id="select" class="form-control">
                                                                        <option value="{{$student->meslek}}">{{$student->meslek}}</option>
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
                                                                    <input name="email" type="email" class="form-control" value="{{$student->email}}">
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="row">


                                                            <div class="col-md-12">
                                                                <hr>
                                                                <small class="text-success ">Bu bölümler isteğe bağlı doldurulabilir ! </small>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="x_card_code" class="control-label mb-1">Doğum Tarihi</label><br>
                                                                <div class="input-group">
                                                                    <input id="date_goster" name="birthday" type="date" class="form-control cc-cvc" value="{{$student->birthday}}">
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
                                                                        <input id="tc_goster" name="tc" type="text" class="form-control" value="{{$student->tc}}">

                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div>
                                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                                Güncelle
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div></div></div></div>


                        </div>
                        <!-- update form sonu -->

                        <ul class="list-group mt-5">
                            <li class="list-group-item ">
                              <span class="text-success">
                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                              </span> :
                                @if($student->onay == 0)
                                    <button id="onay" class="btn btn-danger">Onay Bekliyor</button>
                                    <a id="onayla" href="{{route('admin.students.onay',$student->id)}}" class="btn btn-danger" style="display: none">Onayla</a>
                                @else
                                    <button class="btn btn-primary">Onaylandı</button>
                                @endif
                            </li>

                            <li class="list-group-item ">
                              <span class="text-success">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                              </span> :
                                {{$student->telefon}}
                            </li>

                            <li class="list-group-item ">
                              <span class="text-success">
                                  <i class="fa fa-envelope-o" aria-hidden="true"></i>
                              </span> :
                                    {{$student->email}}
                            </li>

                            <li class="list-group-item ">
                              <span class="text-success">
                                  <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                              </span> :
                                {{date('d-m-Y',strtotime($student->birthday))}}
                            </li>
                            <li class="list-group-item ">
                              <span class="text-success">
                                  T.C.
                              </span> :
                                {{$student->tc}}
                            </li>


                        </ul>


                    </div>
                    <hr>

                </section>


            </div>
            <!-- sağ kolon sonu -->

            <!-- sol kolon başlangıç -->
            <div class="col-md-6">

                <div class="breadcrumbs">
                    <h4 class="text-center text-info">Katıldığı Etkinlikler - Eğitimler</h4>
                    <hr>
                    <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <th>Program Adı</th>
                            <th>Tarihi</th>
                            <th>Eğitimci</th>

                        </tr>

                        @foreach($student->program as$key=> $program)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a style="color: black;" href="{{route('admin.kursu.program_onizle',$program->id)}}">{{$program->slug}}</a></td>
                            <td>{{$program->tarih}}</td>
                            <td><a style="color: black" href="{{route('admin.teacher.update',$program->egitimci->id)}}">{{$program->egitimci->ad }} {{$program->egitimci->soyad }} </a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
            <!-- sol kol sonu -->
        </div>
    </div>

@endsection

@section('footer')

    <script>
        $(document).ready(function () {
           $('#form_open').click(function () {
               $('#form_update').toggle(900)
           }) ;

           $('#onay').hover(function () {
              $('#onayla').show();
              $('#onay').hide();
           });

            $('#onayla').mouseout(function () {
                $('#onay').show();
                $('#onayla').hide();
            });

            $('#img').click(function () {
                $('#img_update').toggle();
            })



        });
    </script>

@endsection
