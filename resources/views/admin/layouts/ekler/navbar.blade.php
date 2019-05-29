<nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="./"><img src="#" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{route('admin.home')}}"> <i class="menu-icon fa fa-dashboard"></i>Anasayfa </a>

            </li>
            <h3 class="menu-title">Web Yönetimi</h3><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-line-chart"></i>Kürsüler</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.kursu.new_kursu')}}">Yeni Kürsü</a></li>
                    <li><i class="fa fa-id-badge"></i><a href="{{route('admin.kursu.alt_kursu')}}">Bölümler</a></li>
                    <li><i class="fa fa-calendar"></i><a href="{{route('admin.kursu.add_program')}}">Program Ekle</a></li>
                    <li><i class="fa fa-bars"></i><a href="{{route('admin.kursu.programs')}}">Programlar</a></li>

                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-address-book-o"></i>Eğitimciler</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-address-book-o"></i><a href="{{route('admin.teacher.new_teacher')}}">Eğitimci Ekle</a></li>
                    <li><i class="fa fa-address-book-o"></i><a href="{{route('admin.teacher.teachers')}}">Eğitimcilerimiz</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-graduation-cap"></i>Öğrenciler</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-graduation-cap"></i><a href="{{route('admin.students.add')}}">Öğrenci Ekle</a></li>
                    <li><i class="fa fa-graduation-cap"></i><a href="{{route('admin.students.students')}}">Öğrenci onay-işlem</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-indent"></i>İçerik Ekle</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-indent"></i><a href="{{route('admin.icerik.slider')}}">Slider</a></li>
                    <li><i class="menu-icon fa fa-paper-plane-o"></i><a href="{{route('admin.icerik.yayinlar')}}">Yayınlar</a></li>
                    <li><i class="menu-icon fa fa-newspaper-o"></i><a href="{{route('admin.icerik.news')}}">Haber & Duyuru</a></li>
                    <li><i class="menu-icon fa fa-picture-o"></i><a href="{{route('admin.icerik.galeri')}}">Galeri</a></li>
                    <li><i class="menu-icon fa fa-grav"></i><a href="{{route('admin.icerik.aboutus_menu')}}">Hakkımızda Menü</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-graduation-cap"></i>Program İşlemleri</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-indent"></i><a href="{{route('admin.programs.katilim')}}">Programlar Durum</a></li>


                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope-o"></i>Mesajlar</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-inbox"></i><a href="{{route('admin.message.inbox')}}">Mesajlar</a></li>

                </ul>
            </li>

            <h3 class="menu-title">Diğer</h3><!-- /.menu-title -->

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Foto Galeri</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Foto ekle</a></li>
                    <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Fotoğraflar</a></li>
                </ul>
            </li>



        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Site içi arama ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification">
                             <a class="dropdown-item media" href="#">
                                <i class="fa fa-warning"></i>
                                <p class="text-dark">Server #3 overloaded.</p>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media " href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <p>Hoşgeldin <br>{{auth()->user()->name}}</p>
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i>Profil</a>

                        <a class="nav-link" href="#"><i class="fa fa-user"></i> İletiler <span class="count">13</span></a>

                        <a class="nav-link" href="#"><i class="fa fa-cog"></i> Ayarlar</a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Çıkış
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>



            </div>
        </div>

    </header>


    <div class="container">
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
