<meta charset="utf-8">
<title>
    {{ $site_setting->meta_title }}
</title>

<meta http-equiv="X-UA-Compatible"
      content="IE=edge">
<meta content="width=device-width, initial-scale=1.0"
      name="viewport"/>
<meta http-equiv="Content-type"
      content="text/html; charset=utf-8">

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->





@if(App::getLocale() == 'en')
    <link href="{{ url(env('PUBLIC_PATH').'adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet"
          href="{{ url(env('PUBLIC_PATH').'quickadmin/css') }}/select2.min.css"/>
    <link href="{{ url(env('PUBLIC_PATH').'adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ url(env('PUBLIC_PATH').'adminlte/css/custom.css') }}" rel="stylesheet">
    <link href="{{ url(env('PUBLIC_PATH').'adminlte/css/skins/skin-blue.min.css') }}" rel="stylesheet">
@else


    <link href="{{ url(env('PUBLIC_PATH').'adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet"
          href="{{ url(env('PUBLIC_PATH').'quickadmin/css') }}/select2.min.css"/>

    <link href="{{ url(env('PUBLIC_PATH').'adminlte/css/custom.css') }}" rel="stylesheet">
    <link href="{{ url(env('PUBLIC_PATH').'stylertl/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ url(env('PUBLIC_PATH').'stylertl/AdminLTErtl.min.css') }}" rel="stylesheet">
    <link href="{{ url(env('PUBLIC_PATH').'stylertl/rtl.css') }}" rel="stylesheet">
    <link href="{{ url(env('PUBLIC_PATH').'adminlte/css/styleedit.css') }}" rel="stylesheet">
    <link href="{{ url(env('PUBLIC_PATH').'adminlte/css/pop-img.css') }}" rel="stylesheet">
    <link href="{{ url(env('PUBLIC_PATH').'quickadmin/css/wickedpicker.css') }}" rel="stylesheet">

    <link href="{{ url(env('PUBLIC_PATH').'adminlte/plugins/swithcBtn/css/style.css') }}" rel="stylesheet">


@endif





<link rel="stylesheet"
      href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet"
      href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
<link rel="stylesheet"
      href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
<link rel="stylesheet"
      href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.css"/>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.min.css"/>
<meta name="csrf-token" content="{{ csrf_token() }}" />


<style>

    
      .info-box-icon {
          border-top-left-radius: 2px;
          border-top-right-radius: 0;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 2px;
          display: block;
          float: right;
          height: 100%;
          width: 90px;
          text-align: center;
          font-size: 45px;
          line-height: 90px;
          background: rgba(0,0,0,0.2);
      }

      .info-box-content {
            padding: 5px 10px;
            margin-left:0px;
            margin-right: 90px;
            text-align: center;
            line-height: 30px;
        }

        table.dataTable td.select-checkbox:before{
              display:none;
        }

        ul.treeview-menu a{
            font-family: 'Cairo', sans-serif!important;
        }


</style>