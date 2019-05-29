@extends('admin.layouts.master')

@section('title','Yönetim Anasayfa')


@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="card  no-padding bg-flat-color-1">
                    <div class="card-body">
                        <div class="h1 text-muted text-right">
                            <i class="fa fa-address-card-o fa-2x text-light"></i>
                        </div>

                        <div class="h4 mb-0 text-light">
                            <span>
                                <a style="color: white" href="{{route('admin.programs.katilim')}}">
                                Program
                                </a>
                            </span>
                        </div>
                        <small class="text-uppercase font-weight-bold text-light h5 mt-1">
                            <a style="color: white" href="{{route('admin.programs.katilim')}}">
                            Ekle-Çıkar
                            </a>
                        </small>
                        <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card  no-padding bg-flat-color-2">
                    <div class="card-body">
                        <div class="h1 text-muted text-right">
                            <i class="fa fa-address-book-o fa-2x text-light"></i>
                        </div>

                        <div class="h4 mb-0 text-light">
                            <span class="count">{{count($egitimciler)}}</span>
                        </div>
                        <small class="text-uppercase font-weight-bold text-light h5">
                            <a style="color: white" href="{{route('admin.teacher.teachers')}}">
                            Eğitimciler
                            </a>
                        </small>
                        <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card  no-padding bg-flat-color-3">
                    <div class="card-body">
                        <div class="h1 text-muted text-right">
                            <i class="fa fa-graduation-cap fa-2x text-light"></i>
                        </div>

                        <div class="h4 mb-0 text-light">
                            <span class="count">
                                {{count($students)}}
                            </span>
                        </div>
                        <small class="text-uppercase font-weight-bold text-light h5">
                            <a style="color: white;" href="{{route('admin.students.students')}}">
                            Öğrenciler
                            </a>
                        </small>
                        <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card  no-padding bg-flat-color-5">
                    <div class="card-body">
                        <div class="h1 text-muted text-right">
                            <i class="fa fa-grav fa-2x text-light"></i>
                        </div>

                        <div class="h4 mb-0 text-light">
                            <span class="count">{{count($programs)}}</span>
                        </div>
                        <small class="text-uppercase font-weight-bold text-light h5">
                            <a style="color: white;" href="{{route('admin.kursu.programs')}}">
                                Programlar
                            </a>
                        </small>
                        <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>



    <div class="col-md-12">

        <div class="row">
            <div class="col-md-6 ">
                <div class="breadcrumbs">
                    <h2 class="text-success mt-1 text-center">Son Öğrenci Kayıtları</h2>
                <table class="table table-bordered table-hover mt-3 border border-success">
                    <tr>
                        <th>Ad Soyad</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Meslek</th>
                        <th>Durum</th>
                    </tr>
                    @foreach($students as $key => $student)
                        @if($key < 9)
                    <tr>
                        <td>{{$student->ad}} {{$student->soyad}}</td>
                        <td>{{$student->telefon}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->meslek}}</td>
                        <td>
                            @if($student->onay == 1)
                                <a class="badge badge-primary" href="#">Onaylı</a>
                            @else
                                <a class="badge badge-danger" href="#">Onay Bekliyor</a>
                            @endif
                        </td>
                    </tr>
                        @endif
                    @endforeach



                </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <h2 class="text-danger mt-1 text-center">Yaklaşan Etkinlikler</h2>
                <table class="table table-hover table-bordered mt-3">
                    <tr>
                        <th>Etkinlik</th>
                        <th>Konu</th>
                        <th>Eğitimci</th>
                        <th>Tarih</th>
                        <th>Doluluk</th>
                    </tr>

                    @foreach($programs as  $program)
                    <tr>
                        <td>{{$program->slug}}</td>
                        <td>{!! str_limit($program->konu, 50) !!}</td>
                        <td>{{$program->egitimci->ad}} {{$program->egitimci->soyad}}</td>
                        <td>{{$program->tarih}}</td>
                        <td><p class="badge badge-info">13/30</p></td>
                    </tr>
                    @endforeach


                </table>
            </div>
        </div>
        </div>
    </div>


@endsection

