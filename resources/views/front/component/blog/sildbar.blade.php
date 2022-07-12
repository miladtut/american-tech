<div class="col-lg-4">
          <div class="widget-blog wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2">
            <div class="widget-blog-header">
              <ul class="nav nav-pills tab-post" id="pills-tab">
                <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#pills-1">@lang('global.front.popular')</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#pills-2">@lang('global.front.last')</a></li>
              </ul>
            </div>
            <div class="widget-blog-body">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-1"> 
                
                 @foreach(@$moreReaderPosts as $moreReaderPost)
                  <div class="widget-post">
                    <div class="widget-post-image">
                      <a href="{{route('web.blog.single',['id'=>$moreReaderPost->id])}}">
                        @if(isset($blogObj->firstImages($moreReaderPost->id)->image))
                        <img src="{{image_url($blogObj->firstImages($moreReaderPost->id)->image,'55x40')}}" alt="{{ app()->isLocale('ar')? $blogObj->firstImages($moreReaderPost->id)->alt  : $blogObj->firstImages($moreReaderPost->id)->alt_en }} "/>
                        @endif
                      </a>
                    </div>
                    <div class="widget-post-content">
                      <h5 class="widget-post-title"> 
                        <a href="{{route('web.blog.single',['id'=>$moreReaderPost->id])}}">
                          {{ app()->isLocale('ar')? $moreReaderPost->title_ar  : $moreReaderPost->title_en }} 
                          </a>
                        </h5>
                      <p class="widget-post-date"><i class="fal fa-clock"></i>
                        {{\Carbon\Carbon::parse($moreReaderPost->created_at)->format('Y-m-d')}}
                      </p>
                    </div>
                  </div>
                  @endforeach
                
                </div>

                <div class="tab-pane fade" id="pills-2">
                 
                  @foreach(@$lastPosts as $lastPost)
                  <div class="widget-post">
                    <div class="widget-post-image">
                      <a href="{{route('web.blog.single',['id'=>$lastPost->id])}}">
                        @if(isset($blogObj->firstImages($lastPost->id)->image))
                        <img src="{{image_url($blogObj->firstImages($lastPost->id)->image,'55x40')}}" alt="{{ app()->isLocale('ar')? $blogObj->firstImages($lastPost->id)->alt  : $blogObj->firstImages($lastPost->id)->alt_en }}"/>
                        @endif
                      </a>
                    </div>
                    <div class="widget-post-content">
                      <h5 class="widget-post-title"> 
                        <a href="{{route('web.blog.single',['id'=>$lastPost->id])}}">
                          {{ app()->isLocale('ar')? $lastPost->title_ar  : $lastPost->title_en }} 
                          </a>
                        </h5>
                      <p class="widget-post-date"><i class="fal fa-clock"></i>
                        {{\Carbon\Carbon::parse($lastPost->created_at)->format('Y-m-d')}}
                      </p>
                    </div>
                  </div>
                  @endforeach
                
               
                  
                </div>
              </div>
            </div>
          </div>
          <div class="widget-blog-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2">
            <div class="widget-blog-header">
              <div class="widget-blog-header-title">@lang('global.front.more_read')</div>
              <div class="widget-blog-header-icon"> <i class="far fa-file-alt"></i></div>
            </div>
            <div class="widget-blog-body">
              <div class="sliderPost owl-carousel owl-theme">
                
                @foreach(@$moreReaderPosts as $moreReaderPost)
                <div class="entry-box-blog-2">
                  <div class="entry-box-image">
                    <a href="{{route('web.blog.single',['id'=>$moreReaderPost->id])}}">
                      @if(isset($blogObj->firstImages($moreReaderPost->id)->image))
                      <picture><img src="{{image_url($blogObj->firstImages($moreReaderPost->id)->image,'360x198')}}" alt="{{ app()->isLocale('ar')? $blogObj->firstImages($moreReaderPost->id)->alt  : $blogObj->firstImages($moreReaderPost->id)->alt_en }}"/></picture>
                      @endif
                    </a>
                  </div>
                  <div class="entry-box-content">
                    <h3 class="entry-box-title"> 
                      <a href="{{route('web.blog.single',['id'=>$moreReaderPost->id])}}">
                        {{ app()->isLocale('ar')? $moreReaderPost->title_ar  : $moreReaderPost->title_en }} 
                        </a>
                      </h3>
                    <p class="widget-post-date"><i class="fal fa-clock"></i>
                      {{\Carbon\Carbon::parse($moreReaderPost->created_at)->format('Y-m-d')}}
                    </p>
                  </div>
                </div>
                @endforeach
              

              </div>
            </div>
          </div>
        </div>