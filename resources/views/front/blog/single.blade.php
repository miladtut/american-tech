@extends('front.layouts.index' , ['is_active'=>'blog','sub_title'=>app()->isLocale('ar')? $blog->title_ar  : $blog->title_en 
,'sub_key_words'=>app()->isLocale('ar')? $blog->tags_ar  : $blog->tags_en ,
'sub_desc'=>app()->isLocale('ar')? strip_tags($blog->description_ar)  : strip_tags($blog->description_en) ,
])

@section('content')

      <div class="main--content">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="single-blog">
                <div class="single-blog-header">
                  <nav class="main-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/blog')}}"><i class="fas fa-home pl-1"></i><span>@lang('global.front.home') </span></a></li>
                      <li class="breadcrumb-item">
                        <a href="{{url('/blog')}}?category={{@$blog->department_id}}">
                          {{ app()->isLocale('ar')? $blog->department->name: $blog->department->name_en }}    
                      </a>
                    </li>
                    </ol>
                  </nav>
                  <ul class="single-blog-tags">
                    @php
                    if(app()->isLocale('ar')){
                      $tags=explode (',',@$blog->tags_ar);
                      }else{
                        $tags=explode(',',@$blog->tags_en);
                      }
                     
                    @endphp
                    @if(count($tags)>0)
                    @foreach(@$tags as $tag)
                    <li>{{$tag}}</li>
                    @endforeach
                    @endif
                  </ul>
                  <h1 class="single-blog-title">
                    {{ app()->isLocale('ar')? $blog->title_ar  : $blog->title_en }} 
                  </h1>
                </div>
                <div class="single-blog-image">
                  <div class="sliderSingleBlog owl-carousel owl-theme">
                    @foreach(@$blog->images as $image)
                    <div class="image-slider-container">
                      <img src="{{image_url($image->image,'750x317')}}" alt="{{ app()->isLocale('ar')? $image->alt  : $image->alt_en }}"/></div>
                    @endforeach
                  </div>
                </div>
                <div class="single-blog-content">
                  <ul class="single-blog-meta">
                    <li><i class="fal fa-clock"></i>
                      {{\Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}
                    </li>
                    <li><i class="fal fa-folder"></i>
                      {{ app()->isLocale('ar')? $blog->department->name: $blog->department->name_en }}
                    </li>
                  </ul>
                  <div class="single-blog-text">
                    @php
                    if(app()->isLocale('ar')){
                    $text=@$blog->description_ar;
                    }else{
                      $text=@$blog->description_en;
                    }
                      echo $text;
                   @endphp
                  </div>
                </div>
                <div class="single-blog-footer">
                  <p class="title-share">@lang('global.front.share_post') </p>
                  <ul class="single-blog-share">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}"   target="_blank"><img src="{{asset('front/images/svgIcon/facebook.svg')}}" alt=""/></a></li>
                    <li><a href="http://www.twitter.com/share?u={{Request::url()}}"><img src="{{asset('front/images/svgIcon/twitter.svg')}}" alt=""/></a></li>
                    <li><a href="https://api.whatsapp.com/send?text={{Request::url()}}"  target="_blank"><img src="{{asset('front/images/svgIcon/whatsapp.svg')}}" alt=""/></a></li>
                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{Request::url()}}"  target="_blank"><img src="{{asset('front/images/svgIcon/linkedin.svg')}}" alt=""/></a></li>
                    <li><a href="http://pinterest.com/pin/create/button/?url={{Request::url()}}"  target="_blank"><img src="{{asset('front/images/svgIcon/pinterest.svg')}}" alt=""/></a></li>
                  </ul>
                </div>
              </div>
              <div class="next_and_prev_post">
                <div class="row">
                  @php
                  $post=$blogObj->previousPost($blog->id);
                  @endphp
                  <div class="col-lg-6">
                    @if($post!='')
                    <div class="prev_post"> 
                        <a href="{{route('web.blog.single',['id'=>$post->id])}}">
                          <div class="icon">
                          <img src="{{asset('front/images/svgIcon/arrow2.svg')}}" alt=""/>
                        </div>
                        </a>
                      <div class="text">
                        <a href="{{route('web.blog.single',['id'=>$post->id])}}">{{ app()->isLocale('ar')? $post->title_ar: $post->title_en }}    
                        </a>
                      </div>
                    </div>
                    @endif
                  </div>
                  @php
                  $post=$blogObj->nextPost($blog->id);
                  @endphp
                  <div class="col-lg-6">
                    @if($post!='')
                    <div class="next_post"> 
                        <a href="{{route('web.blog.single',['id'=>$post->id])}}">
                          <div class="icon">
                        <img src="{{asset('front/images/svgIcon/arrow2.svg')}}" alt=""/>
                      </div>
                      </a>
                      <div class="text">
                      
                        <a href="{{route('web.blog.single',['id'=>$post->id])}}">{{ app()->isLocale('ar')? $post->title_ar: $post->title_en }}    
                        </a>
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="related-posts">
                @if(count($postsRelated)>0)
                <h3 class="related-posts-title">@lang('global.front.postsRelated')</h3>
                <div class="row">
                  @foreach(@$postsRelated as $postRelated)
                  <div class="col-lg-6">
                    <div class="entry-box-blog-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1">
                      <div class="entry-box-image">
                        <a href="{{route('web.blog.single',['id'=>$postRelated->id])}}">
                          @if(isset($blogObj->firstImages($postRelated->id)->image))
                          <picture><img src="{{image_url($blogObj->firstImages($postRelated->id)->image)}}" alt="{{ app()->isLocale('ar')? $blogObj->firstImages($postRelated->id)->alt  : $blogObj->firstImages($postRelated->id)->alt_en }}"/></picture>
                          @endif
                        </a></div>
                      <div class="entry-box-content">
                        <h3 class="entry-box-title">
                           <a href="{{route('web.blog.single',['id'=>$postRelated->id])}}">
                            {{ app()->isLocale('ar')? $postRelated->title_ar  : $postRelated->title_en }}  
                          </a>
                          </h3>
                        <ul class="meta_desc">
                          <li>
                            <span class="icon"><i class="fal fa-clock"></i></span><span class="text">
                              {{\Carbon\Carbon::parse($postRelated->created_at)->format('Y-m-d')}}
                            </span>
                          </li>
                          <li>
                            <span class="icon"><i class="fal fa-folder"></i></span><span class="text">
                              {{ app()->isLocale('ar')? $postRelated->department->name: $postRelated->department->name_en }}    
                          </span>
                        </li>
                          <li><span class="icon"><i class="far fa-eye"></i></span><span class="text">{{@$postRelated->numViews}}</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                @endif
              </div>
            </div>
  
             {{--  //slidbar   --}}
          @include('front.component.blog.sildbar')

          </div>
        </div>
      </div>


      @endsection