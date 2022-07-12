@extends('front.layouts.index' , ['sub_title' => app()->isLocale('ar')? $service->title  : $service->title_en ,'is_active'=>'service'
,'sub_desc'=>app()->isLocale('ar')? strip_tags($service->desciption)  : strip_tags($service->desciption_en) ,

])

@section('content')
<div class="section-single-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="image-service">
            <img class="wow fadeInUp" src="{{image_url($service->image,'460x230')}}" alt="{{ app()->isLocale('ar')? $service->alt  : $service->alt_en }}" data-wow-duration="1.5s" data-wow-delay="0.1s"/></div> 

        </div>
        <div class="col-lg-7">
          <div class="content-service">
            <h3 class="service-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2"> {{ app()->isLocale('ar')? $service->title  : $service->title_en }}</h3>
            <div class="service-text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                @if(app()->isLocale('ar')) 
                {!!html_entity_decode($service->desciption)!!}
                @else  
                {!!html_entity_decode($service->desciption_en)!!} 
                 @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <div class="section-works">

    @if(count($ourBusiness)>0)      
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="title-section mb-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1">  @lang('global.front.ourBusiness')</div>
          <div class="desc-section wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2">
            @if(app()->isLocale('ar')) 
            {!!  $site_setting->text_business_ar !!}
            @else
            {!!  $site_setting->text_business_en !!}
            @endif

          </div>
        </div>
      </div>
      <div class="row">
        @foreach($ourBusiness as $ourBusines)
          @if(isset($ourBusines->busines))
        <div class="col-lg-6">
          <div class="entry-box wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2">
            <div class="entry-box-image"><a @if($ourBusines->busines->link!='') href="{{$ourBusines->busines->link}}" target="_blank" @endif >
                <picture><img src="{{image_url($ourBusines->busines->image,'225x227')}}" alt="{{ app()->isLocale('ar')? $ourBusines->busines->alt  : $ourBusines->busines->alt_en }}"/></picture></a></div>
            <div class="entry-box-content">
              <h3 class="entry-box-title"> <a @if($ourBusines->busines->link!='') href="{{$ourBusines->busines->link}}" @endif>  {{ app()->isLocale('ar')? $ourBusines->busines->title_ar  : $ourBusines->busines->title_en }}</a></h3>
              <p class="entry-box-text">
                @if(app()->isLocale('ar')) 
                {!!html_entity_decode($ourBusines->busines->description_ar)!!}
                @else  
                {!!html_entity_decode($ourBusines->busines->description_en)!!} 
                 @endif

              </p>
            </div>
          </div>
        </div>
        @endif
        @endforeach
       
      </div>
    </div>
    @endif

    <section class="section section-helpdesk py-5">
      <div class="container">
        <div class="title-section mb-3"> {{ app()->isLocale('ar')? $digitalReceiver->title_ar  : $digitalReceiver->title_en }}</div>
        <div class="desc-section">
            @if(app()->isLocale('ar')) 
            {!!html_entity_decode($digitalReceiver->description_ar)!!}
            @else  
            {!!html_entity_decode($digitalReceiver->description_en)!!} 
             @endif
        </div>
        <div class="group-btn-action mb-4 justify-content-center"><a class="btn-action btn-1" href="{{route('web.offerPrice')}}">@lang('global.front.request_the_service_now')</a></div>
      </div>
    </section>
  </div>
@endsection