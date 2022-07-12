<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-176826621-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-176826621-1');
</script>

  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

  @if(app()->isLocale('ar'))
   <title>{{$site_setting->meta_title}}</title>
  <meta property="og:title" content="{{ (isset($sub_title) ? $sub_title : $site_setting->meta_title  )}}"/>
  <meta property="og:description" content="{{ (isset($sub_desc) ? $sub_desc : $site_setting->meta_desc  )}}"/>
  <meta property="og:image" content="{{image_url($site_setting->logo)}}"/>
  <meta name="twitter:image:src" content="{{image_url($site_setting->logo)}}"/>
  <meta name="twitter:description" content="{{ (isset($sub_desc) ? $sub_desc : $site_setting->meta_desc  )}}"/>
  <meta name="twitter:title" content="{{ (isset($sub_title) ? $sub_title : $site_setting->meta_title  )}}"/>
  <meta name="description" content="{{ (isset($sub_desc) ? $sub_desc : $site_setting->meta_desc  )}}"/>
  <meta name="keywords" content="{{ (isset($sub_key_words) ? $sub_key_words : $site_setting->key_words  )}}"/>
  <meta name="title" content="{{ (isset($sub_title) ? $sub_title : $site_setting->meta_title  )}}"/>
  @else
  <title>{{ $site_setting->meta_title_en}}</title>
  <meta property="og:title" content="{{ (isset($sub_title) ? $sub_title : $site_setting->meta_title_en  )}}"/>
  <meta property="og:description" content="{{ (isset($sub_desc) ? $sub_desc : $site_setting->meta_desc_en  )}}"/>
  <meta property="og:image" content="{{image_url($site_setting->logo)}}"/>
  <meta name="twitter:image:src" content="{{image_url($site_setting->logo)}}"/>
  <meta name="twitter:description" content="{{ (isset($sub_desc) ? $sub_desc : $site_setting->meta_desc_en  )}}"/>
  <meta name="twitter:title" content="{{ (isset($sub_title) ? $sub_title : $site_setting->meta_title_en  )}}"/>
  <meta name="description" content="{{ (isset($sub_desc) ? $sub_desc : $site_setting->meta_desc_en  )}}"/>
  <meta name="keywords" content="{{ (isset($sub_key_words) ? $sub_key_words : $site_setting->tags  )}}"/>
  <meta name="title" content="{{ (isset($sub_title) ? $sub_title : $site_setting->meta_title_en  )}}"/>
  @endif

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" />
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css"/>
    <link rel="stylesheet" href="{{asset('front/css/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}"/>
    @if(app()->isLocale('ar'))
    <link rel="stylesheet" href="{{asset('front/css/bootstrap-rtl.css')}}"/> 
    @else
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}"/> 
    @endif
    
    <link href="{{asset('front/css/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/> 
    @stack('front_css')
    <link rel="stylesheet" href="{{asset('front/css/main.css')}}"/> 
    <link rel="icon" type="image/png" href="{{image_url($site_setting->logo)}}" >

    @if(app()->isLocale('ar'))

    @else
    <link rel="stylesheet" href="{{asset('front/css/main-ltr.css')}}"/> 

    @endif
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>


