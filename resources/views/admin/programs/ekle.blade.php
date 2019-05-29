@extends('admin.layouts.master')

@section('title','Programa katılım Ekle')


@section('content')

     <div class="row">
         <div class="col-md-4">
             <div class="breadcrumbs">
                    <h3>Program Bilgileri</h3>
                 <ul class="list-group">
                     <li class="list-group-item">
                         <img src="{{asset('img')}}/{{$program->img}}" class="img-responsive center-block" alt="">
                     </li>
                     <li class="list-group-item">Baslik : {{$program->slug}}</li>
                     <li class="list-group-item">Tarih : {{$program->tarih}}</li>
                     <li class="list-group-item">Kontenjan : {{count($program->student)}} / {{$program->kontenjan}}</li>
                 </ul>

             </div>
         </div>


         <div class="col-md-4">
             <div class="breadcrumbs">
                 <h3>Katılanlar</h3>
                 <table class="table table-hover">
                     <tr>
                         <th>ad soyad</th>
                         <th>email</th>
                         <th>İşlem</th>
                     </tr>

                     @foreach($program->student as $student)
                     <tr>
                         <td><a href="#">{{$student->ad}} {{$student->soyad}} </a></td>
                         <td>{{$student->email}}</td>
                         <td><a href="{{route('admin.programs.delete_katilimci',$student->id)}}"><i title="Bu katilimciyi çıkar" class="fa fa-trash-o" aria-hidden="true"></i>
                             </a></td>
                     </tr>
                     @endforeach
                 </table>

             </div>
         </div>

         <div class="col-md-4">
             <div class="breadcrumbs">
                 <h3>Katılımcı Ekle</h3>

                 <form action="{{route('admin.programs.add_katilim')}}" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="program_id" value="{{$program->id}}">
                     <div class="form-group">
                         <select class="form-control" name="katilimcilar[]" multiple="multiple" id="katilim">
                         <option value="">--- ---</option>
                          @foreach($ogrenciler as $ogrenci)
                         <option value="{{$ogrenci->id}}">{{$ogrenci->ad}} {{$ogrenci->soyad}}</option>
                         @endforeach
                     </select>
                         <button class="btn btn-primary btn-block mt-2">Programa Ekle</button>
                     </div>


                 </form>




             </div>
         </div>
     </div>

@endsection

@section('footer')

    <script>
        $(document).ready(function() {
            $('#katilim').select2();
        });
    </script>

@endsection