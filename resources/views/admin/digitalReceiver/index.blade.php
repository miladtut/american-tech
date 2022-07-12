@extends('layouts.app', ['is_active'=>'digitalReceiver'])

@section('content')
    <h3 class="page-title">@lang('global.digitalReceiver.title')</h3>
    
    {!! Form::model($digitalReceiver, ['method' => 'PUT', 'route' => ['admin.digitalReceiver.update', $digitalReceiver->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>
        <i style="float:left">حجم الصورة المناسب 140*165 بكسل </i>

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
                    {!! Form::label('title_ar', trans('global.digitalReceiver.fields.title').'', ['class' => 'control-label']) !!}
                    {!! Form::text('title_ar', old('title_ar'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title_ar'))
                        <p class="help-block">
                            {{ $errors->first('title_ar') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title_en', trans('global.digitalReceiver.fields.title_en').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('description_ar', trans('global.digitalReceiver.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description_ar', old('description_ar'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description_ar'))
                        <p class="help-block">
                            {{ $errors->first('description_ar') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description_en', trans('global.digitalReceiver.fields.description_en').'', ['class' => 'control-label']) !!}
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
             
                    @if ($digitalReceiver->image)
                    <img src="{{image_url( $digitalReceiver->image) }}" style="height: 150px ; width: 100%" >

                      @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                    {!! Form::label('image', trans('global.digitalReceiver.fields.image').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('image', old('image')) !!}
                    <input type="file" name="file" class="form-control" accept='.jpg,.png,.jpeg'>
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


