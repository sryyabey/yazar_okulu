@extends('admin.layouts.master')

@section('title','Tüm Programlar')

@section('content')

    <div class="col-md-12">
        <div class="breadcrumbs">
            <h3 class="text-secondary mt-3 ml-3">Gelecek Programlar</h3>
            <hr>
            <table id="student" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Program Adı</th>
                    <th>Eğitimci</th>
                    <th>Kayıt tarihi</th>
                    <th>Son gün</th>
                    <th>Program Tarihi</th>
                    <th>Kontenjan / Onay</th>
                    <th>İşlem</th>
                </tr>
                </thead>
                <tbody>

                @foreach($programs as $program)
                <tr>
                    <td>{{$program->slug}}</td>
                    <td>{{$program->egitimci->ad}} {{$program->egitimci->soyad}}</td>
                    <td>{{$program->start_date}}</td>
                    <td>{{$program->end_date}}</td>
                    <td>{{$program->tarih}}</td>
                    <td>{{$program->kontenjan}} |
                        @if($program->onay == 0)
                            <span class="badge badge-danger">Onay bekliyor</span>
                        @else
                            <span class="badge badge-primary">Onaylı</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.kursu.program_onizle',$program->id)}}" class="btn btn-secondary" title="Düzenle"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
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

