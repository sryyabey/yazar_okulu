@extends('admin.layouts.master')

@section('title','Hakkımızda menüsü düzenleme')


@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="breadcrumbs">

                <div id="form">
                <h4 class="mt-1 text-center">Hakkımızda Menüsü İşlemleri</h4>
                <hr>
                <form action="{{route('admin.icerik.aboutus_save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Menü Adı</label>
                        <input type="text" name="baslik" class="form-control" placeholder="Menüde görünen ad">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Resim</label>
                                <input type="file" name="img" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Keywords</label>
                                <input type="text" name="keywords" class="form-control" placeholder="Anahtar kelimeler arada virgül ile">
                            </div>
                        </div>
                    </div>


                        <div class="form-group">
                            <label for="">İçerik</label>
                            <textarea id="icerik" name="icerik" class="form-control" placeholder="İçerik"></textarea>
                        </div>
                    <button class="btn btn-primary btn-block">kaydet</button>

                </form>
                </div>

            </div>
        </div>



        <!-- sağ sutun -->
        <div class="col-md-6">
            <div class="breadcrumbs">
                <table class="table table-hover">
                    <tr>
                        <th>Resim</th>
                        <th>Menü Adı</th>
                        <th>Anahtar Kelimeler</th>
                        <th>İçerik</th>
                    </tr>

                    @foreach($abouts as $key => $about)
                    <tr>
                        <td>
                            <img src="{{asset('img')}}/{{$about->img}}" width="80" alt="">
                        </td>
                        <td>
                            {{$about->baslik}} <a href="{{route('admin.icerik.aboutus_update',$about->id)}}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            {{$about->keywords}}
                        </td>
                        <td>
                            <span class="text-dark">{!! str_limit($about->icerik,80) !!} </span>
                        </td>


                    </tr>

                        <div>

                        </div>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer')

    <script>
       $(document).ready(function () {
           $('#icerik').summernote();
       });
    </script>

@endsection