@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.team.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.team.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">


            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('image', trans('quickadmin.news.fields.image').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('image', old('image')) !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    {!! Form::hidden('image_max_size', 10) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
            </div>


            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#arabi">عربي</a></li>
                <li><a data-toggle="tab" href="#english">انجليزي</a></li>
                <li><a data-toggle="tab" href="#turki">تركي</a></li>

            </ul>

            <div class="tab-content">
                <div id="arabi" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('name', trans('quickadmin.team.fields.name').'', ['class' => 'control-label']) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title', trans('global.offers.fields.title').'', ['class' => 'control-label']) !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('title'))
                                <p class="help-block">
                                    {{ $errors->first('title') }}
                                </p>
                            @endif
                        </div>
                    </div>


                </div>
                <div id="english" class="tab-pane fade">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('name_en', trans('quickadmin.team.fields.name').'', ['class' => 'control-label']) !!}
                            {!! Form::text('name_en', old('name_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name_en'))
                                <p class="help-block">
                                    {{ $errors->first('name_en') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title_en', trans('global.offers.fields.title').'', ['class' => 'control-label']) !!}
                            {!! Form::text('title_en', old('title_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('title_en'))
                                <p class="help-block">
                                    {{ $errors->first('title_en') }}
                                </p>
                            @endif
                        </div>
                    </div>





                </div>

                <div id="turki" class="tab-pane fade">

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('name_tr', trans('quickadmin.team.fields.name').'', ['class' => 'control-label']) !!}
                            {!! Form::text('name_tr', old('name_tr'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name_tr'))
                                <p class="help-block">
                                    {{ $errors->first('name_tr') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title_tr', trans('global.offers.fields.title').'', ['class' => 'control-label']) !!}
                            {!! Form::text('title_tr', old('title_tr'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('title_tr'))
                                <p class="help-block">
                                    {{ $errors->first('title_tr') }}
                                </p>
                            @endif
                        </div>
                    </div>


                </div>
            </div>








            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop




