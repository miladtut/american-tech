

<div id="load" style="display: none;" ><img id="loading-image" src="{{ asset('front/images/ajax-loader.gif') }}"
    /><br></div>

    
<footer class="main-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="title-footer-2">@lang('global.front.more_read')</div>
          @foreach($moreReaderPosts as $moreReaderPost)
          <div class="widget__item-5">
            <p class="widget__item-date"><i class="far fa-clock"></i>
              {{\Carbon\Carbon::parse($moreReaderPost->created_at)->format('Y-m-d')}}
            </p>
            <h4 class="widget__item-title">
              <a href="{{route('web.blog.single',['id'=>$moreReaderPost->id])}}">
                {{ app()->isLocale('ar')? $moreReaderPost->title_ar  : $moreReaderPost->title_en }} 
              </a>
            </h4>
          </div>
          @endforeach
        </div>
        <div class="col-lg-4">
          <div class="title-footer-2 mt-4 mt-lg-0">@lang('global.front.more_read')</div>
          <div class="list-image-most-read">
            @foreach($moreReaderPosts as $moreReaderPost)
            <div class="widget__item-6">
              <div class="widget__item-image">
                <a href="{{route('web.blog.single',['id'=>$moreReaderPost->id])}}">
                  @if(isset($blogObj->firstImages($moreReaderPost->id)->image))
                  <img src="{{image_url($blogObj->firstImages($moreReaderPost->id)->image,'110x98')}}" alt="{{ app()->isLocale('ar')? $blogObj->firstImages($moreReaderPost->id)->alt  : $blogObj->firstImages($moreReaderPost->id)->alt_en }}"/>
                  @endif              
                  </a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="col-lg-4">
          <div class="logo mb-3 mt-4 mt-lg-5 pt-lg-5"><img src="{{image_url($site_setting->logo)}}" alt=""/></div>
          <h6 class="desc-website mb-4">
            @if(app()->isLocale('ar')) 
            {!!  $site_setting->meta_desc !!}
            @else
            {!!  $site_setting->meta_desc_en !!}
            @endif
          </h6>
        </div>
      </div>
    </div>
  </footer>
  
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
  </div><!-
