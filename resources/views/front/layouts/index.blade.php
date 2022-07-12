<!doctype html>
<html class="no-js" lang="en" >

@include('front.layouts.css')

<body >
 
    <div class="main-wrapper">

    @if(@$is_active=='blog')

    @include('front.layouts.header_blog')

    @else
    @include('front.layouts.header')

    @endif

    
    @yield('content')

    

    @if(@$is_active=='blog')

    @include('front.layouts.footer_blog')
    
    @else
    @include('front.layouts.footer')

    @endif

</div>
{{--<a href="https://api.whatsapp.com/send/?phone={{$site_setting->mobile}}&text&type=phone_number&app_absent=0‬" class="float" target="_blank">--}}
{{--    <i class="fa fa-whatsapp my-float"></i>--}}
{{--</a>--}}
@include('front.layouts.scripts')
</body>
</html> 
