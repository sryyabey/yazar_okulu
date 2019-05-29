@extends('admin.layouts.master')

@section('title','Tüm Eğitimcilerimiz')

@section('content')


    <div class="col-md-12">
        <div class="breadcrumbs">
            <h2 class="text-center text-dark mt-3">Eğitimcilerimiz</h2>
            <hr>




            <table id="student" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Ad & Soyad</th>
                    <th>Branş</th>
                    <th>Telefon</th>
                    <th>email</th>
                    <th>Sosyal Medya</th>
                    <th>açıklama</th>
                    <th>Durum</th>
                    <th>işlem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{$teacher->ad}} {{$teacher->soyad}}</td>
                    <td>{{$teacher->brans}}</td>
                    <td>{{$teacher->telefon}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->sosyal_medya}}</td>
                    <td title="{!! $teacher->icerik !!}">{!! str_limit($teacher->icerik,150) !!}</td>
                    <td>
                        @if($teacher->onay == 0)
                            <a class="badge badge-danger" href="{{route('admin.teacher.teacher_onay',$teacher->id)}}">onay bekliyor</a>
                        @else
                            <a class="badge badge-secondary" title="Onay ver" href="{{route('admin.teacher.teacher_onay',$teacher->id)}}">onaylı</a> |
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{route('admin.teacher.update',$teacher->id)}}">Düzenle / Sil</a> </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Ad & Soyad</th>
                    <th>Branş</th>
                    <th>Telefon</th>
                    <th>email</th>
                    <th>Sosyal Medya</th>
                    <th>açıklama</th>
                    <th>Durum</th>
                    <th>işlem</th>
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