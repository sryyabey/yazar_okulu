@extends('admin.layouts.master')

@section('title','Öğrenci Ekle')

@section('content')

    <div class="col-md-12">
        <div class="breadcrumbs">
        <h2 class="text-center text-dark mt-2"><i>Tüm Öğrenciler</i></h2>
            <hr>

            <table id="student" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>resim</th>
                    <th>Ad Soyad</th>
                    <th>E-mail</th>
                    <th>Telefon</th>
                    <th>Meslek</th>
                    <th>D.tarihi</th>
                    <th>TC</th>
                    <th>Onay</th>
                </tr>
                </thead>
                <tbody>

                @foreach($students as $student)
                    <tr>
                        <td><img src="{{asset('img')}}/{{$student->img}}" class="img-thumbnail" width="70" alt=""></td>
                        <td><a href="{{route('admin.students.profile',$student->id)}}">{{$student->ad}} {{$student->soyad}}</a></td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->telefon}}</td>
                        <td>{{$student->meslek}}</td>
                        <td>{{$student->birthday}}</td>
                        <td>{{$student->tc}}</td>
                        <td>
                            @if($student->onay == 0)
                                <span class="badge badge-danger">Onay Bekliyor</span>
                            @else
                                <span class="badge badge-primary">Onaylı</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>resim</th>
                    <th>Ad Soyad</th>
                    <th>E-mail</th>
                    <th>Telefon</th>
                    <th>Meslek</th>
                    <th>D.tarihi</th>
                    <th>TC</th>
                    <th>Onay</th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>



@endsection

@section('footer')

    <script>
        $(document).ready(function() {
            $('#student').dataTable({
                "responsive": true,
                "dom": '<"html5buttons"B>lTfgitp',
                "language": {
                    "url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Turkish.json"
                }
            });

        } );
    </script>

@endsection
