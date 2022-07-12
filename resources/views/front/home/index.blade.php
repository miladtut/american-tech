@extends('front.layouts.index' , ['is_active'=>'home','sub_title'=>__('global.front.home') ])

@section('content')

<div class="hero" style="background: url({{image_url(@$slider->image)}});background-repeat: no-repeat;background-size: cover;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto">
        <div class="hero-content">
          <h1 class="hero-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">{{ app()->isLocale('ar')? @$slider->title  : $slider->title_en }}            <br/></h1>
          <h3 class="hero-entry-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">{{ app()->isLocale('ar')? @$slider->subtitle  : $slider->subtitle_en }}</h3>
          <div class="hero-action">
            <a class="hero-btn wow fadeInUp" href="{{route('web.offerPrice')}}" data-wow-duration="1.5s" data-wow-delay="0.3s">@lang('global.front.start_now')</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- end:: hero -->    

<section class="section section--about">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-1 order-lg-0">
        <div class="image-about mb-3 mb-lg-0 text-center">
          <img class="wow fadeInRight lazyload" src="{{image_url(@$about->image,'450x395')}}" alt="{{ app()->isLocale('ar')? $about->alt  : $about->alt_en }}" data-wow-duration="1.5s" data-wow-delay="0.1s"/>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="content-about pr-lg-5">
          <h3 class="title-about  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.1s">@lang('global.front.get_to_know_us') </h3>
          <h5 class="entry-title-about wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.1s">{{ app()->isLocale('ar')? $about->title  : $about->title_en }}</h5>
          <p class="text-about wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.2s">
            @if(app()->isLocale('ar')) 
            {!!html_entity_decode($about->description_ar)!!}
            @else  
            {!!html_entity_decode($about->description_en)!!} 
             @endif
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
@if(count ($services) > 1)
<section class="section section-service" id="ourBusinessAndServices">
  <div class="container">
    <h2 class="title-section mb-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">@lang('global.front.ourServices')</h2>
    <h6 class="desc-section mb-5 mb-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">
      @if(app()->isLocale('ar')) 
      {!!  $site_setting->text_services_ar !!}
      @else
      {!!  $site_setting->text_services_en !!}
      @endif
    </h6>
    <div class="row  ">
    
      @foreach($services as $service)
      <div class="col-lg-3 col-sm-6">
        <a class="widget__item-1 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" href="{{url('/') . '/servicedetails/' .$service->id}}">
          <div class="widget__item-image">
            <div class="widget__item-image"><img src="{{image_url($service->image_thumbnail,'69x70')}}" class="lazyload" alt="{{ app()->isLocale('ar')? $service->alt_file_thumbnail  : $service->alt_file_thumbnail_en }}"/></div>
          </div>
          <h3 class="widget__item-title">{{ app()->isLocale('ar')? $service->title  : $service->title_en }}</h3>
          <p class="widget__item-text">
             @php
            if(app()->isLocale('ar')){
            $text=strip_tags (@$service->desciption);
            }else{
              $text=strip_tags (@$service->desciption_en);

            }

            if(strlen($text)>70){
               echo mb_substr($text,0,70,"utf-8") . '...';

             }else{
                 echo $text;
             }
           @endphp
          </p>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
<section class="section section-service" id="ourBusiness">
  <div class="container">
    <h2 class="title-section mb-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">@lang('global.front.ourBusiness')</h2>
    <h6 class="desc-section mb-5 mb-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">
    </h6>
    <div class="row  ">

      @foreach($business as $item)
        <div class="col-lg-3 col-sm-6">
          <a class="widget__item-1 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" href="{{$item->link}}">
            <div class="widget__item-image">
              <div class="widget__item-image"><img src="{{image_url($item->image,'69x70')}}" class="lazyload" alt="{{ app()->isLocale('ar')? $item->alt  : $item->alt_en }}"/></div>
            </div>
            <h3 class="widget__item-title">{{ app()->isLocale('ar')? $item->title_ar  : $item->title_en }}</h3>
            <p class="widget__item-text">
              @php
                if(app()->isLocale('ar')){
                $text=strip_tags (@$item->description_ar);
                }else{
                  $text=strip_tags (@$item->description_en);

                }

                if(strlen($text)>70){
                   echo mb_substr($text,0,70,"utf-8") . '...';

                 }else{
                     echo $text;
                 }
              @endphp
            </p>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
<section class="section section-information">
  <div class="container">
    <h2 class="title-section mb-5 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">@lang('global.front.we_have_a_lot')</h2>
    <div class="row">
      @php $i=1;@endphp
      @foreach($statistics as $statistic)
      @php if($i>4){$i=1;}  @endphp
      <div class="col-lg-3 col-6">
        <div class="widget__item-2 widget-{{$i}} wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
          <h3 class="widget__item-title">{{ app()->isLocale('ar')? $statistic->title_ar  : $statistic->title_en }}</h3>
          <div class="widget__item-content">
            <div class="widget__item-icon">
              <img src="{{image_url($statistic->image,'60x60')}}" class="lazyload" alt="{{ app()->isLocale('ar')? $statistic->alt  : $statistic->alt_en }}"/>
            </div>
            <h3 class="widget__item-number">{{@$statistic->number}}</h3>
          </div>
        </div>
      </div>
      @php $i++ @endphp
      @endforeach
    </div>
    <div class="row align-items-center mt-4">
      <div class="col-lg-5 ml-auto mb-4 mb-lg-0">
        <div class="title-information wow fadeInUp text-center text-lg-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
          @if(app()->isLocale('ar')) 
          {!!html_entity_decode($buildProject->title)!!}
          @else  
          {!!html_entity_decode($buildProject->title_en)!!} 
           @endif
        </div>
        <p class="text-information wow fadeInUp text-center text-lg-left" data-wow-duration="1.5s" data-wow-delay="0.2s">
          @if(app()->isLocale('ar')) 
          {!!html_entity_decode($buildProject->description)!!}
          @else  
          {!!html_entity_decode($buildProject->description_en)!!} 
           @endif
        </p>
        <div class="text-center text-lg-left">
          <a href="{{route('web.offerPrice')}}" class="btn-general wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">@lang('global.front.request_now')</a>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="image d-none d-lg-block text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
          <img src="{{image_url(@$buildProject->image,'650x450')}}" alt="{{ app()->isLocale('ar')? $buildProject->alt  : $buildProject->alt_en }}" class="lazyload">
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section section-testimonial">
  <div class="container">
    <h2 class="title-section mb-5 text-white wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">@lang('global.front.customerOpinions')</h2>
    <div class="row">

      @foreach($customerOpinions as $customerOpinion)
      <div class="col-lg-4">
        <div class="widget__item-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">
          <p class="widget__item-desc">
            @if(app()->isLocale('ar')) 
            {!!html_entity_decode($customerOpinion->description_ar)!!}
            @else  
            {!!html_entity_decode($customerOpinion->description_en)!!} 
             @endif
          </p>
          <div class="widget__item-profile">
            <div class="widget__item-image">
              <img src="{{image_url($customerOpinion->image,'60x60')}}" class="lazyload" alt="{{ app()->isLocale('ar')? $customerOpinion->alt  : $customerOpinion->alt_en }}"/>
            </div>
            <div class="d-flex flex-column">
              <h5 class="widget__item-title">{{ app()->isLocale('ar')? $customerOpinion->name_ar  : $customerOpinion->name_en }} </h5>
              <h6 class="widget__item-job">{{ app()->isLocale('ar')? $customerOpinion->specialization_ar  : $customerOpinion->specialization_en }}</h6>
            </div>
          </div>
        </div>
      </div>
        @endforeach

    </div>
  </div>
</section>
<section class="section section-partners">
  <div class="container">
    <div class="title-section wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">
      @lang('global.front.successPartners')
    </div>
    <div class="sliderPartners  owl-carousel owl-theme wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
   
      @foreach($clients as $client)
      <div class="widget__item-4">
        <div class="widget__item-image">
          <a href="">
            <img src="{{image_url($client->image,'100')}}" class="lazyload" alt="{{ app()->isLocale('ar')? $client->alt  : $client->alt_en }}"/>
          </a>
        </div>
      </div>
      
      @endforeach
    </div>
  </div>
</section>
<section class="section section-req">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-2">
        <div class="image d-none d-lg-block wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">
          <img src="{{image_url(@$digitalReceiver->image,'165x140')}}" alt="{{ app()->isLocale('ar')? $digitalReceiver->alt  : $digitalReceiver->alt_en }}">
        </div>
      </div>
      <div class="col-lg-7 my-4 my-lg-0">
        <h3 class="title-req wow fadeInUp text-center text-lg-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
          {{ app()->isLocale('ar')? $digitalReceiver->title_ar  : $digitalReceiver->title_en }}
        </h3>
        <p class="text-req wow fadeInUp text-center text-lg-left" data-wow-duration="1.5s" data-wow-delay="0.2s">
          {{ app()->isLocale('ar')? $digitalReceiver->description_ar  : $digitalReceiver->description_en }}
        </p>
      </div>
      <div class="col-lg-3 text-center text-lg-left">
        <a href="{{route('web.offerPrice')}}" class="btn-general wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">@lang('global.front.submit_your_request')</a>
      </div>
    </div>
  </div>
</section>
  @push('front_js') 
       <script src="{{asset('front/js/lazyload.js')}}"></script>
     
  <script>
  $( document ).ready(function() {
    $("img.lazyload").lazyload();

});
  </script>

 @endpush

@endsection