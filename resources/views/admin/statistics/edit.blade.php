@extends('layouts.app', ['is_active'=>'statistics'])

@section('content')
    <h3 class="page-title">@lang('global.statistics.title')</h3>
    
    {!! Form::model($statistics, ['method' => 'PUT', 'route' => ['admin.statistics.update', $statistics->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>
        <i style="float:left">حجم الصورة المناسب 60*60 بكسل </i>
        <div class="panel-body">
            <div id="arabi" class="tab-pane fade in active">
                <div class="row" >
                    <div class="col-xs-12 form-group">
                        {!! Form::label('title_ar', trans('global.statistics.fields.title').'', ['class' => 'control-label']) !!}
                        {!! Form::text('title_ar', old('title_ar'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('title_ar'))
                            <p class="help-block">
                                {{ $errors->first('title_ar') }}
                            </p>
                        @endif
                    </div>

                </div>


                <div class="row" >
                    <div class="col-xs-12 form-group">
                        {!! Form::label('title_en', trans('global.statistics.fields.title_en').'', ['class' => 'control-label']) !!}
                        {!! Form::text('title_en', old('title_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('title_en'))
                            <p class="help-block">
                                {{ $errors->first('title_en') }}
                            </p>
                        @endif
                    </div>

                </div>

                
                <div class="row" >
                    <div class="col-xs-12 form-group">
                        {!! Form::label('number', trans('global.statistics.fields.number').'', ['class' => 'control-label']) !!}
                        {!! Form::text('number', old('number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('number'))
                            <p class="help-block">
                                {{ $errors->first('number') }}
                            </p>
                        @endif
                    </div>

                </div>




                <hr>
                <h3>  صورة </h3>




                <div class="row">
                    
                               <div class="col-lg-3" style=" margin: 15px; " id="img{{$statistics->image}}">

                                   <div>
                                     <img src="{{image_url($statistics->image)}}" style="height: 150px ; width: 100%" >
                                   </div>

                               </div>
                       
                </div>


                <div id="picFileSec" >
                    <hr>
                    <h3> تعديل صورة  </h3>


                    <div class="row" >
                    <div class="col-xs-12 form-group">
                    <div class="" >
                        <input type="file" name="file" class="form-control" accept='.jpg,.png,.jpeg'>

                    </div>
                    </div>
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
  

@stop