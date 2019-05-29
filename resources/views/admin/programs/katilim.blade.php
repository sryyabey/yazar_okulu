@extends('admin.layouts.master')

@section('title','Program ve Katılımlar')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ul class="list-group">

                    @foreach($programs as $program)
                        <li class="list-group-item">
                            <div class="media">
                                <img src="{{asset('img')}}/{{$program->img}}"width="150" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">{{$program->slug}}</h5>
                                    <div class="row">
                                        <div class="col-md-10">
                                            {!! str_limit($program->konu,150) !!}
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{route('admin.programs.katilim_onizle',$program->id)}}" class="btn btn-primary btn-block">Önizle</a>
                                            <a href="{{route('admin.programs.ekle',$program->id)}}" class="btn btn-success btn-block">Ekle Çıkar</a>
                                        </div>
                                    </div>

                                    <button title="@foreach($program->student as $student){{$student->ad}} {{$student->soyad}} /@endforeach" type="button" class="btn btn-outline-primary">{{count($program->student)}}/{{$program->kontenjan}}</button>

                                </div>
                            </div>

                        </li>
                    @endforeach
                    <!--
                    @foreach($katilims as $katilim)
                    <li class="list-group-item">
                        <div class="media">
                            <img src="{{asset('img')}}/{{$katilim->katilim->img}}"width="150" class="mr-3" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">{{$katilim->katilim->slug}}</h5>
                                 <div class="row">
                                     <div class="col-md-10">
                                         {!! str_limit($katilim->katilim->konu,150) !!}
                                     </div>
                                     <div class="col-md-2">
                                         <button class="btn btn-primary btn-block">Önizle</button>
                                     </div>
                                 </div>

                            </div>
                        </div>

                    </li>
                    @endforeach
                        -->
                </ul>
            </div>
        </div>
    </div>



@endsection