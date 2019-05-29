<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//TR">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>{{$print->slug}} yoklama listesi</title>
    <meta name="generator" content="LibreOffice 6.0.7.3 (Linux)"/>
    <meta name="created" content="2019-04-04T09:30:07.267104742"/>
    <meta name="changed" content="2019-04-04T09:31:56.787169813"/>
    <style type="text/css">
        @page { margin: 2cm }
        p { margin-bottom: 0.25cm; line-height: 115% }
        td p { margin-bottom: 0cm }
    </style>
</head>
<body lang="tr-TR" dir="ltr">
<p style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p style="margin-bottom: 0cm; line-height: 100%"><br/>



<img style="align-self: center" src="{{asset('img/logo.png')}}" width="100" alt="">

      <h3>{{$print->slug}} Yoklama Çizelgesi</h3> Tarih: {{date('d')}} / {{date('m')}} / {{date('Y')}}- <button onclick="window.print();return false;" />Yazdır</button>
<br>


<table width="643" cellpadding="4" cellspacing="0">
    <col width="21">
    <col width="90">
    <col width="56">
    <col width="56">
    <col width="56">
    <col width="56">
    <col width="56">
    <col width="56">
    <col width="56">
    <col width="56">
    <tr valign="top">
        <td width="21" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p>No</p>
        </td>
        <td width="90" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p>Ad Soyad</p>
        </td>
        <td width="56" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border: 1px solid #000000; padding: 0.1cm">
            <p><br/>

            </p>
        </td>
    </tr>
    @foreach($print->student as $key => $student)
    <tr valign="top">
        <td width="21" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p>{{$key+1}}</p>
        </td>
        <td width="90" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p>{{$student->ad}} {{$student->soyad}}</p>
        </td>
        <td width="56" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
            <p><br/>

            </p>
        </td>
        <td width="56" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
            <p><br/>

            </p>
        </td>
    </tr>
        @endforeach
</table>
<p style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
</body>
</html>