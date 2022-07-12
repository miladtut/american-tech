@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.news.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.news.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">



            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slug', 'Url ', ['class' => 'control-label']) !!}
                    {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => '' , 'required' => true]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
            </div>

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






                <div id="arabi" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title', trans('quickadmin.news.fields.title').'', ['class' => 'control-label']) !!}
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
                            {!! Form::label('short_text', trans('quickadmin.news.fields.short_text').'', ['class' => 'control-label']) !!}
                            {!! Form::text('short_text', old('short_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('short_text'))
                                <p class="help-block">
                                    {{ $errors->first('short_text') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('details', trans('quickadmin.news.fields.details').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('details', old('details'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('details'))
                                <p class="help-block">
                                    {{ $errors->first('details') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('tags', trans('global.offers.fields.tags').'', ['class' => 'control-label']) !!}
                            {!! Form::text('tags', old('tags'), ['class' => '', 'id' => 'input-tags']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('tags'))
                                <p class="help-block">
                                    {{ $errors->first('tags') }}
                                </p>
                            @endif
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('category_id', trans('global.media.fields.type').'', ['class' => 'control-label']) !!}
                            {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control ' , 'id'=>'selectType']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('category_id'))
                                <p class="help-block">
                                    {{ $errors->first('category_id') }}
                                </p>
                            @endif
                        </div>
                    </div>

            </div>






            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
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



    <link rel="stylesheet" href="{{url('selectize.css')}}">
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
        $('#input-tags_en').selectize({
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });
        $('#input-tags_tr').selectize({
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