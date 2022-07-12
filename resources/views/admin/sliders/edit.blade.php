@extends('layouts.app', ['is_active'=>'sliders'])

@section('content')
    <h3 class="page-title">@lang('global.slider.title')</h3>
    
    {!! Form::model($slider, ['method' => 'PUT', 'route' => ['admin.sliders.update', $slider->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

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
                    {!! Form::label('title', trans('global.slider.fields.title').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('title_en', trans('global.slider.fields.title_en').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('subtitle', trans('global.slider.fields.subtitle').'', ['class' => 'control-label']) !!}
                    {!! Form::text('subtitle', old('subtitle'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('subtitle'))
                        <p class="help-block">
                            {{ $errors->first('subtitle') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('subtitle_en', trans('global.slider.fields.subtitle_en').'', ['class' => 'control-label']) !!}
                    {!! Form::text('subtitle_en', old('subtitle_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('subtitle_en'))
                        <p class="help-block">
                            {{ $errors->first('subtitle_en') }}
                        </p>
                    @endif
                </div>
            </div>

         

            <div class="uploadVieo" >
            <div class="row">
                <div class="col-xs-12 form-group">
             
                    @if ($slider->image)
                        <img src="{{image_url($slider->image)}}" width="200">

                      @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                    {!! Form::label('file', trans('global.slider.fields.image').'', ['class' => 'control-label']) !!}
                    {!! Form::file('file', ['class' => 'form-control','accept'=>'.jpg,.png,.jpeg']) !!}
                    {!! Form::hidden('video_max_size', 10) !!}
                    <p class="help-block"></p>
                    @if($errors->has('file'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

    
@stop

@section('javascript')
@parent
<script type="text/javascript">

</script>

 @stop
