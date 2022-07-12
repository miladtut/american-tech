
<div id="load" style="display: none;" ><img id="loading-image" src="{{ asset('front/images/ajax-loader.gif') }}"/><br></div>



<footer class="main-footer" id="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h3 class="title-footer">@lang('global.front.websiteLink') </h3>
        <ul class="link-footer">
          <li><a href="{{route('web.index')}}">@lang('global.front.home')</a></li>
          <li><a href="{{route('web.about')}}">@lang('global.front.aboutUs')</a></li>
          <li><a href="{{route('web.joinOurTeam')}}">@lang('global.front.join_the_team') </a></li>
          <li><a href="{{route('web.offerPrice')}}">@lang('global.front.offers_and_packages')</a></li>
          <li><a href="{{route('web.consult')}}">@lang('global.front.free_consultation')</a></li>
          <li><a href="{{route('web.blog.index')}}">@lang('global.front.blog')</a></li>
        </ul>
      </div>
      <div class="col-lg-3">
        <h3 class="title-footer">@lang('global.front.connect_with_us')</h3>
        <ul class="list-contact">
          <li class="item-contact pr-4"><span class="item-contact-icon"><i class="fas fa-map-marker-alt"></i></span><span class="item-contact-text">
            @if(app()->isLocale('ar')) 
            {{$site_setting->address}}
            @else
            {{$site_setting->address_en}}
            @endif
          </span>
        </li>
          <li class="item-contact"><a href="#"><span class="item-contact-icon"><i class="fas fa-phone-alt"></i></span><span class="item-contact-text ">{{$site_setting->mobile}} <br>
            @if(app()->isLocale('ar')) 
            {!!  $site_setting->hourwork !!}
            @else
            {!!  $site_setting->hourwork_en !!}
            @endif
          </span>
        </a></li>
          <li class="item-contact"><a href="mailto:{{$site_setting->email}}"><span class="item-contact-icon"><i class="fas fa-envelope"></i></span><span class="item-contact-text ">{{$site_setting->email}}</span></a></li>
        </ul>
      </div>
      <div class="col-lg-3">
        <h3 class="title-footer">@lang('global.front.follow_us_on')</h3>
        <ul class="social-media mt-3">
          @if($site_setting->facebook != '')
        <li><a class="fa" href="{{$site_setting->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a></li>
        @endif

        @if($site_setting->twitter != '')
        <li><a class="tw" href="{{$site_setting->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
        @endif
       
        @if($site_setting->whatsapp!='')
        <li><a class="pi" href="{{$site_setting->whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
        @endif

        @if($site_setting->instagram != '')
        <li><a class="pi" href="{{$site_setting->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
        @endif

        @if($site_setting->snapchat != '')
        <li><a class="in" href="{{$site_setting->snapchat}}" target="_blank"><i class="fab fa-snapchat-ghost"></i></a></li>
        @endif
        
       
       @if($site_setting->linkedin != '')
        <li><a class="in" href="{{$site_setting->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
        @endif 
        
          @if($site_setting->behance != '')
        <li><a class="in" href="{{$site_setting->behance}}" target="_blank"><i class="fab fa-behance"></i></a></li>
        @endif 
        




        </ul>
      </div>
      <div class="col-lg-3 pr-lg-0">
        <h3 class="title-footer">@lang('global.front.mailing_list')</h3>
        <p class="text-white mb-3 text-subscripe">
          @lang('global.front.subscribe_with_us_to_receive_all_that_is_new')  
        </p>
          <form class="mailingListSubscriptions_form form-subscripe" id="mailingListSubscriptions_form" method="post" action="" >
            @csrf
          <div class="form-group">
            <input type="text" name="email" id="email" class="form-control" placeholder="@lang('global.front.email')">
          </div>
          <div class="form-group">
            <button class="btn-general w-100"> @lang('global.front.send')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</footer><!-- end:: main-footer -->  

<!-- begin:: copy-right -->
<div class="copy-right">
  <div class="container">
    <p class="text-center">
      @if(app()->isLocale('ar')) 
      {!!  $site_setting->copyright !!}
      @else
      {!!  $site_setting->copyright_en !!}
      @endif
    </p>
  </div>
</div><!-- end:: copy-right -->  
