@inject('request', 'Illuminate\Http\Request')

<!DOCTYPE html>
<html lang="en">

<head>


    <link href="{{url('css/bootstrap.css')}}" rel="stylesheet">

    @if (App::isLocale('ar'))
        <link href="{{url('css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    @endif

    <link href="{{url('css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{url('css/material-design-iconic-font.css')}}" rel="stylesheet">
    <link href="{{url('css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{url('css/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/revlution/settings.css')}}" rel="stylesheet">
    <link href="{{url('css/revlution/layers.css')}}" rel="stylesheet">
    <link href="{{url('css/revlution/navigation.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    @if (App::isLocale('en') || App::isLocale('tr'))
        <link href="{{url('css/en.css')}}" rel="stylesheet">
   @endif
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="{{url('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{url('js/respond.js')}}"></script><![endif]-->
    <script src="{{url('js/jquery-1.12.2.min.js')}}"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $site_setting->titlewebsite }} </title>
    
    
    <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon" />



</head>


<body class="inner-page">
<div class="loader">
    <div class="loader-inner">
        <img src="images/ajax-loading.gif" alt="">
    </div>
</div>

@include('website.header')
@yield('content')
@include('website.footer')



<script src="{{url('js/bootstrap.min.js') }}"></script>
<script src="{{url('js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script src="{{url('js/wow.js') }}"></script>
<!--Revolution SLider-->
<script src="{{url('js/revlution/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{url('js/revlution/jquery.themepunch.revolution.min.js') }}"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{url('js/revlution/revolution.extension.actions.min.js') }}"></script>
<script src="{{url('js/revlution/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{url('js/revlution/revolution.extension.parallax.min.js') }}"></script>
<script src="{{url('js/revlution/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{url('js/script.js') }}"></script>




<script>
    new WOW().init();
</script>
<!-- Page Scroll to id plugin -->
<script src="{{url('js/jquery.malihu.PageScroll2id.min.js') }}"></script>
<script>
 $( document ).ready(function() {

        $('#searchinput').keypress(function (e) {
            var key = e.which;
            if(key == 13)  // the enter key code
            {
                var word = $('#searchinput').val();
                var  newurl = '{{url('search')}}'+'/'+word;
                window.location = newurl ;
            }
        });



    });
    
    (function($){
        $(window).on("load",function(){

            /* Page Scroll to id fn call */
            $("a[rel='m_PageScroll2id']").mPageScroll2id({
                scrollSpeed: 1200
                ,scrollEasing:"easeOutQuint"
                ,liveSelector:"a[rel='m_PageScroll2id']"
                ,offset:170
            });

        });
    })(jQuery);
</script>




@yield('javascript')



</body>
</html>
