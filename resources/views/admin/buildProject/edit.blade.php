@extends('layouts.app', ['is_active'=>'build_projects'])

@section('content')
    <h3 class="page-title">@lang('global.build_projects.title')</h3>
    
    {!! Form::model($build_projects, ['method' => 'PUT', 'route' => ['admin.build_projects.update', $build_projects->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>
        <i style="float:left">حجم الصورة المناسب 450*650 بكسل </i>

        <div class="panel-body">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('global.build_projects.fields.title').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('title', old('title'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
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
                    {!! Form::label('title_en', trans('global.build_projects.fields.title_en').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('title_en', old('title_en'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
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
                    {!! Form::label('description', trans('global.build_projects.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description_en', trans('global.build_projects.fields.description_en').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description_en', old('description_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description_en'))
                        <p class="help-block">
                            {{ $errors->first('description_en') }}
                        </p>
                    @endif
                </div>
            </div>



         
          
            <div class="row">
                <div class="col-xs-12 form-group">
             
                    @if ($build_projects->image)
                    <img src="{{image_url( $build_projects->image) }}" style="height: 150px ; width: 100%" >

                      @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                    {!! Form::label('image', trans('global.build_projects.fields.image').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('image', old('image')) !!}
                    {!! Form::file('file', ['class' => 'form-control','accept'=>'.jpg,.png,.jpeg']) !!}
                    {!! Form::hidden('image_max_size', 10) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
            </div>
            
               <div class="row" >
                        <div class="col-xs-6 form-group">
                            {!! Form::label('alt','alt (عربي)', ['class' => 'control-label']) !!}
                            {!! Form::text('alt', old('alt'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('alt'))
                                <p class="help-block">
                                    {{ $errors->first('alt') }}
                                </p>
                            @endif
                        </div>
                       
                        
                        <div class="col-xs-6 form-group">
                            {!! Form::label('alt_en','alt (الانجليزية)', ['class' => 'control-label']) !!}
                            {!! Form::text('alt_en', old('alt_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('alt_en'))
                                <p class="help-block">
                                    {{ $errors->first('alt_en') }}
                                </p>
                            @endif
                        </div>


            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
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
@stop
