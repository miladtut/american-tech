
@extends('front.layouts.index' , ['is_active'=>'blog','sub_title'=>__('global.front.blog')
,'sub_key_words'=>getLastTagsPost(),
])

@section('content')
<div class="main--content">
    <div class="container">
      <div class="row mb-5 ">
        <div class="col-12">
          <div class="sliderBlog owl-carousel owl-theme">
            

            @foreach(@$lastPosts as $b)
      
            <a href="{{route('web.blog.single',['id'=>$b->id])}}" class="entry-box-sliderBlog"
              @if(isset($blogObj->firstImages($b->id)->image)) style="background: url({{image_url($blogObj->firstImages($b->id)->image)}});background-size: cover;background-repeat: no-repeat;" @endif>
              
               <div class="entry-body">
                <h1 class="entry-box-title"> {{ app()->isLocale('ar')? $b->title_ar  : $b->title_en }} </h3>
                <h3 class="entry-box-desc">
                  @php
                  if(app()->isLocale('ar')){
                  $text=strip_tags (@$b->description_ar);
                  }else{
                    $text=strip_tags (@$b->description_en);
                  }
                  if(strlen($text)>100){
               echo mb_substr($text,0,100,"utf-8") . '...';
      
                   }else{
                       echo $text;
                   }
                 @endphp

                </h3>
              </div>
            </a>
        
            @endforeach
           
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          
          @foreach(@$blogs as $blog)
          <div class="entry-box-blog wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1">
            <div class="entry-box-image">
              <a href="{{route('web.blog.single',['id'=>$blog->id])}}">
                <picture>
                  @if(isset($blogObj->firstImages($blog->id)->image))
                  <img src="{{image_url($blogObj->firstImages($blog->id)->image,'215x209')}}" alt="{{ app()->isLocale('ar')? $blogObj->firstImages($blog->id)->alt  : $blogObj->firstImages($blog->id)->alt_en }}"/>
                  @endif
                </picture>
              </a>
            </div>
            <div class="entry-box-content">
              <ul class="meta_desc">
                <li><span class="icon"><i class="fal fa-clock"></i></span><span class="text">
                  {{\Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}
                </span></li>
               
                <li>
                  <span class="icon"><i class="fal fa-folder"></i></span><span class="text">
                  {{ app()->isLocale('ar')? $blog->department->name: $blog->department->name_en }}
                </span>
              </li>
                
                <li class="mr-auto"><span class="icon"><i class="fas fa-fire-alt"></i></span><span class="text">{{@$blog->numViews}}</span></li>
              </ul>
              <h1 class="entry-box-title"> <a href="{{route('web.blog.single',['id'=>$blog->id])}}">
                {{ app()->isLocale('ar')? $blog->title_ar  : $blog->title_en }} 
              </a></h3>
              <p class="entry-box-text"> 
                @php
                if(app()->isLocale('ar')){
                $text=strip_tags (@$blog->description_ar);
                }else{
                  $text=strip_tags (@$blog->description_en);
                }
                if(strlen($text)>150){
               echo mb_substr($text,0,150,"utf-8") . '...';
    
                 }else{
                     echo $text;
                 }
               @endphp
              </p>
            </div>
          </div>
       
          @endforeach
          <nav aria-label="Page navigation example" class="mb-3">
            {{ $blogs->links() }}

          </nav>
        </div>
      
        {{--  //slidbar   --}}
          @include('front.component.blog.sildbar')

      </div>
    </div>
  </div>
 

@endsection