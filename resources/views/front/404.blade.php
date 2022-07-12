@extends('front.layouts.index',['title'=>' الصفحة غير موجودة|'.@$settings->valueOf('title_ar')])

@section('content')
@push('front_css')
<style>
    .navbar-sticky{
        display: none;
    }
    
</style>
@endpush
<nav class="main-breadcrumb" aria-label="breadcrumb" style="margin-top: 40px">
        <div class="container">
            <ol class="breadcrumb justify-content-center" style="margin-top: 30px;">
                <li class="breadcrumb-item active" aria-current="page"><a>  الصفحة المدخلة غير موجودة</a></li>
            </ol>
        </div>
    </nav>
    <div class="main-content">
        <div class="container">
            <div class="page-not-found">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="image mb-5 mb-lg-0">
                                    <img src="{{asset('front/img/404.jpg')}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text">
                                    <h2 class="mb-3">الصفحة المدخلة غير موجودة</h2>
                                    <h5>الصفحة التي تبحث عنها غير موجودة , يمكنك العودة <a href="{{url('/')}}">للرئيسية </a> او اعادة البحث مجدداً عن الصفحة المطلوبة</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
