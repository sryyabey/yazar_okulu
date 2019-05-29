@extends('admin.layouts.master')

@section('title')
    {{$message->ad}} mesajinı oku
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">
            <h4 class="breadcrumbs text-center">{{$message->ad}} Mesajını Okuyorsunuz!</h4>
            <hr>
        </div>
        <div class="container">
        <div class="col-md-6">
            <div class="breadcrumbs">
                <ul class="list-group">
                    <li class="list-group-item"><span class="text-secondary"> Ad : </span> {{$message->ad}} </li>
                    <li class="list-group-item"><span class="text-secondary">Email :</span> {{$message->email}}</li>
                    <li class="list-group-item"><span class="text-secondary">Telefon :</span> {{$message->telefon}}</li>
                    <li class="list-group-item"><span class="text-secondary">Şehir :</span> {{$message->city}}</li>
                    <li class="list-group-item"><a class="btn btn-success" href="{{route('admin.message.inbox')}}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                             Mesajlar</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="breadcrumbs">
                <p class="text-dark ">
                   <span class="h3 text-secondary text-center "> Mesaj : </span> <br>
                <hr>
               <div class=" p-1">
                    {{$message->icerik}}
               </div>
                </p>
            </div>
        </div>
        </div>
    </div>

@endsection