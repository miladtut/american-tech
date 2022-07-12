<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini" style="color: #fff;
    font-weight: bold;">
          {{ $site_setting->meta_title }}
           {{--  <img src="{{image_url(@$site_setting->logo)}}" style="height: 50px">  --}}
         </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg" style="color: #fff;
    font-weight: bold;">
          {{ $site_setting->meta_title }}
           {{--  <img src="{{image_url(@$site_setting->logo)}}" style="height: 50px">  --}}
         </span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>





    </nav>
</header>



