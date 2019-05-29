<!DOCTYPE html>
<html lang="tr">


<head>
    <title>
        @yield('title')
    </title>


    @include('layouts.ekler.header')
    @yield('header')
</head>

<body>



<!--HEADER SECTION-->
  @include('layouts.ekler.navbar')
<!--END HEADER SECTION-->
<!-- SLIDER -->

@yield('content')

<!-- FOOTER COURSE BOOKING -->

@include('layouts.ekler.footer')
@yield('footer')
</body>

</html>
