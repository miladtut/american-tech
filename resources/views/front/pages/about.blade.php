@extends('front.layouts.index' , ['is_active'=>'about','sub_title'=>__('global.front.aboutUs') ])

@section('content')
<div class="page-header">
    <div class="container">
      <h1 class="title-page"> @lang('global.front.who_are_we')</h1>
    </div>
  </div>
  <div class="main-content">
    <div class="container">
      <div class="section-about">
        <div class="row">
          <div class="col-lg-4">
            <div class="entry-box-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">
              <div class="entry-box-header">
                <h1 class="entry-box-title">{{ app()->isLocale('ar')? $about_us->title  : $about_us->title_en }}</h1>
              </div>
              <div class="entry-box-text">
                @if(app()->isLocale('ar'))
                {!!html_entity_decode($about_us->page_text)!!}
                @else
                {!!html_entity_decode($about_us->page_text_en)!!}
                 @endif
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="entry-box-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
              <div class="entry-box-header">
                <h1 class="entry-box-title">{{ app()->isLocale('ar')? $our_vision->title  : $our_vision->title_en }}</h1>
              </div>
              <div class="entry-box-text">
                @if(app()->isLocale('ar'))
                {!!html_entity_decode($our_vision->page_text)!!}
                @else
                {!!html_entity_decode($our_vision->page_text_en)!!}
                 @endif

              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="entry-box-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
              <div class="entry-box-header">
                <h1 class="entry-box-title">{{ app()->isLocale('ar')? $our_mission->title  : $our_mission->title_en }}</h1>
              </div>
              <div class="entry-box-text">
                @if(app()->isLocale('ar'))
                {!!html_entity_decode($our_mission->page_text)!!}
                @else
                {!!html_entity_decode($our_mission->page_text_en)!!}
                 @endif
              </div>
            </div>
          </div>
        </div>
      </div>
{{--      <div class="section pt-5 pb-0">--}}
{{--        <div class="row">--}}
{{--          <div class="col-lg-6 mx-auto">--}}
{{--            <div class="main-title page-about wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s"> @lang('global.front.text_download_profile_company') </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--          <div class="col-lg-4 mx-auto"><a class="general_btn_lg wow fadeInUp " href="{{ asset('uploads/' . $site_setting->companyFile) }}" download data-wow-duration="1.5s" data-wow-delay="0.2s"> <i class="fa fa-download" aria-hidden="true"></i> @lang('global.front.download_profile_company') </a></div>--}}
{{--        </div>--}}
{{--      </div>--}}
    </div>
  </div>
  @endsection


