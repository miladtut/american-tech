@extends('layouts.app', ['is_active'=>'customerOpinions'])

@section('content')
    <h3 class="page-title">@lang('global.customerOpinions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.customerOpinions.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        <i style="float:left">حجم الصورة المناسب 115*115 بكسل </i>
        <div class="panel-body">
                <div id="arabi" class="tab-pane fade in active">
                    <div class="row" >
                        <div class="col-xs-12 form-group">
                            {!! Form::label('name_ar', trans('global.customerOpinions.fields.name').'', ['class' => 'control-label']) !!}
                            {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name_ar'))
                                <p class="help-block">
                                    {{ $errors->first('name_ar') }}
                                </p>
                            @endif
                        </div>

                    </div>

                    <div class="row" >
                        <div class="col-xs-12 form-group">
                            {!! Form::label('name_en', trans('global.customerOpinions.fields.name_en').'', ['class' => 'control-label']) !!}
                            {!! Form::text('name_en', old('name_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name_en'))
                                <p class="help-block">
                                    {{ $errors->first('name_en') }}
                                </p>
                            @endif
                        </div>

                    </div>


                    <div class="row" >
                        <div class="col-xs-12 form-group">
                            {!! Form::label('specialization_ar', trans('global.customerOpinions.fields.specialization').'', ['class' => 'control-label']) !!}
                            {!! Form::text('specialization_ar', old('specialization_ar'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('specialization_ar'))
                                <p class="help-block">
                                    {{ $errors->first('specialization_ar') }}
                                </p>
                            @endif
                        </div>

                    </div>

                    <div class="row" >
                        <div class="col-xs-12 form-group">
                            {!! Form::label('specialization_en', trans('global.customerOpinions.fields.specialization_en').'', ['class' => 'control-label']) !!}
                            {!! Form::text('specialization_en', old('specialization_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('specialization_en'))
                                <p class="help-block">
                                    {{ $errors->first('specialization_en') }}
                                </p>
                            @endif
                        </div>

                    </div>





                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('description_ar', trans('global.customerOpinions.fields.desciption').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description_ar', old('description_ar'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                            {!! Form::label('description_en', trans('global.customerOpinions.fields.desciption_en').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description_en', old('description_en'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('description_en'))
                                <p class="help-block">
                                    {{ $errors->first('description_en') }}
                                </p>
                            @endif
                        </div>
                    </div>

                                 <div id="picFileSec" >
                    <hr>
                    <h3>  صورة  </h3>


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
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
         
    </script>

@stop