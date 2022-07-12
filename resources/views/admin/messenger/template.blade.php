@extends('layouts.app')

@section('content')

    <h2 style="margin-top:0px;">@yield('title')</h2>

    <div class="row" style="margin-top:15px;">

        {{--Sidebar--}}



        {{--Main content--}}
        <div class="col-xs-11" style="text-align: center; margin-right: 40px" >
            @yield('messenger-content')
        </div>
    </div>

@stop
