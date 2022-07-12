
<div class="loader-page">
    <div class="lds-ellipsis">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <div class="mobile-menu-overlay"></div><!-- begin:: Header Mobile -->
  <div class="header-mobile-navigation">
    <div class="container">
      <div class="header-mobile-navigation-content">
        <div class="logo"><a href="/"><img src="{{image_url($site_setting->logo)}}" alt=""></a></div>
        <div class="header-mobile-navigation__toolbar"><i class="fa fa-bars"></i></div>
      </div>
    </div>
  </div><!-- end:: Header Mobile -->
<!-- begin:: Header -->

<header class="main-navigation">
    <div class="container">
      <div class="d-flex flex-column flex-lg-row align-items-lg-center">
        <div class="menu-container d-lg-none ">
          <div class="btn-close-header-mobile px-3 justify-content-end"><i class="fas fa-times"></i></div>
        </div>
        <div class="menu-container">
          <ul class="main-menu list-main-menu">
            {{--  <li class="menu_item"><a class="menu_link" href=""><i class="fas fa-search"></i></a></li>  --}}
          </ul>
        </div>
        <div class="menu-container mr-lg-auto">
          <ul class="main-menu list-main-menu">
            @if(app()->isLocale('ar'))
            <li class="menu_item ml-lg-1"><a class="menu_link menu_link-lang" href="{{url('lang')}}/en"><span class="menu_link-text">EN</span></a></li>
             @else
             <li class="menu_item ml-lg-1"><a class="menu_link menu_link-lang" href="{{url('lang')}}/ar"><span class="menu_link-text">عربي</span></a></li>
             @endif
             
            <li class="menu_item"><a class="menu_link {{@$is_active=='blog' ?'active':''}} " href="{{url('/blog')}}"><span class="menu_link-text">@lang('global.front.home')</span></a></li>

            @foreach(@$departments as $department )
            <li class="menu_item">
              <a class="menu_link {{ request('category')==$department->id? 'active' : '' }} " href="{{url('/blog')}}?category={{@$department->id}}">
              <span class="menu_link-text">{{ app()->isLocale('ar')? $department->name  : $department->name_en }} </span>
            </a>
          </li>
            @endforeach
            <li class="menu_item"><a class="menu_link " href="{{url('/')}}"><span class="menu_link-text">@lang('global.front.website_name')</span></a></li>         
          </ul>
        </div>

        
        <div class="logo d-none d-lg-block"><a href="{{url('/')}}"><img src="{{image_url($site_setting->logo)}}" alt=""/></a></div>
      </div>
    </div>
  </header><!-- end:: Header -->   