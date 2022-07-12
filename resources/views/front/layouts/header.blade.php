  <div class="loader-page">
    <div class="spinner">
      <div class="dot1"></div>
    </div>
  </div>
  <div class="mobile-menu-overlay"></div><!-- begin:: Header Mobile -->
  <div class="header-mobile">
    <div class="container">
      <div class="header-mobile-content">
        <div class="logo"><a href="{{url('/')}}"><img src="{{image_url($site_setting->logo)}}" alt=""/></a></div>
        <div class="header-mobile__toolbar"><i class="fa fa-bars"></i></div>
      </div>
    </div>
  </div><!-- end:: Header Mobile -->
<!-- begin:: Header -->
   <header class="main-header  {{ @$is_active=='home'? '' : 'internal'}}  ">
    <div class="container">
      <div class="d-flex flex-column flex-lg-row align-items-lg-center">
        @if($is_active=='home')
        <div class="logo d-none d-lg-block"><a href="{{url('/')}}"><img src="{{image_url($site_setting->logo)}}" alt=""/></a></div>
        @else
        <div class="logo d-none d-lg-block"><a href="{{url('/')}}"><img src="{{image_url($site_setting->logo)}}" alt=""/></a></div>
        @endif
        <div class="menu-container d-lg-none ">
          <div class="btn-close-header-mobile justify-content-end"><i class="fas fa-times"></i></div>
        </div>

        <div class="menu-container mr-lg-auto ml-lg-4">
          <ul class="main-menu list-main-menu">
            <li class="menu_item"><a class="menu_link {{@$is_active=='home' ?'active':''}}" href="{{url('/')}}"><span class="menu_link-text">@lang('global.front.home')</span></a></li>
            <li class="menu_item"><a class="menu_link {{@$is_active=='about' ?'active':''}}" href="{{url('/about')}}"><span class="menu_link-text">@lang('global.front.aboutUs')</span></a></li>
            @if(@$is_active=='home')
            <li class="menu_item"><a class="menu_link " onclick="closer()" href="#ourBusinessAndServices"><span class="menu_link-text">@lang('global.front.our_business_and_services')</span></a></li>
           @else
           <li class="menu_item"><a class="menu_link " href="{{url('/')}}#ourBusinessAndServices"><span class="menu_link-text">@lang('global.front.our_business_and_services')</span></a></li>
           @endif

            <li class="menu_item"><a class="menu_link {{@$is_active=='joinOurTeam' ?'active':''}}" href="{{route('web.joinOurTeam')}}"><span class="menu_link-text">@lang('global.front.join_the_team')</span></a></li>
            <li class="menu_item"><a class="menu_link {{@$is_active=='offerprice' ?'active':''}}" href="{{route('web.offerPrice')}}"><span class="menu_link-text"> @lang('global.front.offers_and_packages')</span></a></li>
            <li class="menu_item"><a class="menu_link" href="{{route('web.blog.index')}}"><span class="menu_link-text">@lang('global.front.blog') </span></a></li>
           @if(@$is_active=='home')
            <li class="menu_item"><a class="menu_link" onclick="closer()" href="#footer"><span class="menu_link-text"> @lang('global.front.call_us')</span></a></li>
           @else
           <li class="menu_item"><a class="menu_link" href="{{url('/')}}#footer"><span class="menu_link-text"> @lang('global.front.call_us')</span></a></li>
           @endif
          </ul>
        </div>
      
        <div class="menu-container">
          <ul class="main-menu list-main-menu">
            <li class="menu_item"><a href="tel:{{$site_setting->mobile}}" class="menu_link req" href="index.html"><span class="menu_link-icon"><i class="fas fa-phone"></i></span><span class="menu_link-text"><span class="menu_link-text">‎‪{{$site_setting->mobile}}</span></span></a></li>          
            @if(app()->isLocale('ar'))
            <li class="menu_item ml-lg-1"><a class="menu_link menu_link-lang" href="{{url('lang')}}/en"><span class="menu_link-text">EN</span></a></li>
             @else
             <li class="menu_item ml-lg-1"><a class="menu_link menu_link-lang" href="{{url('lang')}}/ar"><span class="menu_link-text">عربي</span></a></li>
             @endif

          </ul>
        </div>
      </div>
    </div>
  </header><!-- end:: Header -->    <!-- begin:: hero -->
