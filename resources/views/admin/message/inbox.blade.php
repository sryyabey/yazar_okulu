@extends('admin.layouts.master')

@section('title','Inbox')

@section('content')


    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Gelen Mesajlar</strong>
                        </div>

                        <table id="student" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Ad</th>
                                <th>Email</th>
                                <th>telefon</th>
                                <th>Şehir</th>
                                <th>icerik</th>
                                <th>Durum</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$message->ad}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->telefon}}</td>
                                    <td>{{$message->city}}</td>
                                    <td title="{{$message->icerik}}"><a href="{{route('admin.message.message',$message->id)}}">{!! str_limit($message->icerik,100) !!}</a></td>
                                    <td>
                                        @if($message->durum == 0)
                                            <span class="badge badge-danger">Okunmadı</span>
                                        @else
                                            <span class="badge badge-primary">Okundu</span>
                                        @endif

                                    </td>
                                </tr>
                             @endforeach


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Ad</th>
                                <th>Email</th>
                                <th>telefon</th>
                                <th>Şehir</th>
                                <th>icerik</th>
                                <th>Durum</th>
                            </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>


            </div>
        </div><!-- .animated -->
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
