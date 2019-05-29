@extends('admin.layouts.master')

@section('title')
    {{$program->slug}}
@endsection

@section('content')
  <div class="container">
     <div class="row">
         <div class="col-md-6">
             <div class="breadcrumbs">

                 <div class="card mb-3">
                     <img src="{{asset('img')}}/{{$program->img}}" class="card-img-top" alt="...">
                     <div class="card-body">

                         <h5 class="card-title"><a href="{{route('admin.kursu.program_onizle',$program->id)}}">{{$program->slug}}</a></h5>
                         <h4 class="card-title text-primary">Eğitimci : <a href="{{route('admin.teacher.update',$program->egitimci->id)}}">{{$program->egitimci->ad}} {{$program->egitimci->soyad}}</a></h4>
                         <p class="card-text">{!! $program->konu !!}</p>
                         <p class="card-text"><h3 class="text-muted">Kontenjan : {{count($program->student)}} / {{$program->kontenjan}}</h3></p>
                     </div>
                 </div>

             </div>
         </div>

         <div class="col-md-6">
             <div class="breadcrumbs">
                 <div class="row">
                     <div class="col-md-4 mt-1">
                         <a href="{{route('admin.programs.print',$program->id)}}" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i>
                              Yoklama Yazdır</a>
                     </div>
                     <div class="col-md-8">
                         <h3 class="text-center text-primary">Katılan Öğrenciler</h3>
                     </div>
                 </div>

                 <table class="table table-hover mt-1">
                     <tr>
                         <th>Ad & Soyad</th>
                         <th>Telefon</th>
                         <th>E-mail</th>
                     </tr>

                     @foreach($program->student as $student)
                     <tr>
                         <td><a href="{{route('admin.students.profile',$student->id)}}">{{$student->ad}} {{$student->soyad}}</a></td>
                         <td>{{$student->telefon }}</td>
                         <td>{{$student->email}}</td>
                     </tr>
                     @endforeach
                 </table>

             </div>
         </div>

     </div>

  </div>

@endsection