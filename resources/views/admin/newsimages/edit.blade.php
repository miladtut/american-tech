@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.newsimages.title')</h3>
    
    {!! Form::model($newsimage, ['method' => 'PUT', 'route' => ['admin.newsimages.update', $newsimage->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('image', trans('quickadmin.newsimages.fields.image').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('image', old('image')) !!}
                    @if ($newsimage->image)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $newsimage->image) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    {!! Form::hidden('image_max_size', 2) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('news_id', trans('quickadmin.newsimages.fields.news').'', ['class' => 'control-label']) !!}
                    {!! Form::select('news_id', $news, old('news_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('news_id'))
                        <p class="help-block">
                            {{ $errors->first('news_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

