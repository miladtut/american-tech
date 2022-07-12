@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.offers.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.offers.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('image', trans('global.offers.fields.image').'', ['class' => 'control-label']) !!}
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
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('workname', trans('global.offers.fields.workname').'', ['class' => 'control-label']) !!}
                            {!! Form::text('workname', old('workname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('workname'))
                                <p class="help-block">
                                    {{ $errors->first('workname') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('typework', trans('global.offers.fields.type').'', ['class' => 'control-label']) !!}
                            {!! Form::text('typework', old('typework'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('typework'))
                                <p class="help-block">
                                    {{ $errors->first('typework') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('text', trans('global.offers.fields.text').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('text', old('text'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('text'))
                                <p class="help-block">
                                    {{ $errors->first('text') }}
                                </p>
                            @endif
                        </div>
                    </div>

                </div>
                <div id="english" class="tab-pane fade">

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
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('workname_en', trans('global.offers.fields.workname').'', ['class' => 'control-label']) !!}
                            {!! Form::text('workname_en', old('workname_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('workname_en'))
                                <p class="help-block">
                                    {{ $errors->first('workname_en') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('typework_en', trans('global.offers.fields.type').'', ['class' => 'control-label']) !!}
                            {!! Form::text('typework_en', old('typework_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('typework_en'))
                                <p class="help-block">
                                    {{ $errors->first('typework_en') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('text_en', trans('global.offers.fields.text').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('text_en', old('text_en'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('text_en'))
                                <p class="help-block">
                                    {{ $errors->first('text_en') }}
                                </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div id="turki" class="tab-pane fade">
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
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('workname_tr', trans('global.offers.fields.workname').'', ['class' => 'control-label']) !!}
                            {!! Form::text('workname_tr', old('workname_tr'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('workname_tr'))
                                <p class="help-block">
                                    {{ $errors->first('workname_tr') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('typework_tr', trans('global.offers.fields.type').'', ['class' => 'control-label']) !!}
                            {!! Form::text('typework_tr', old('typework_tr'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('typework_tr'))
                                <p class="help-block">
                                    {{ $errors->first('typework_tr') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('text_tr', trans('global.offers.fields.text').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('text_tr', old('text_tr'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('text_tr'))
                                <p class="help-block">
                                    {{ $errors->first('text_tr') }}
                                </p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>



            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>



    <link rel="stylesheet" href="{{url('css/selectize.css')}}">
    <!--[if IE 8]><script src="{{url('js/es5.js')}}"></script><![endif]-->

    <script src="{{url('js/standalone/selectize.js')}}"></script>
    <script>
        $('#input-tags').selectize({
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });
    </script>


@endsection