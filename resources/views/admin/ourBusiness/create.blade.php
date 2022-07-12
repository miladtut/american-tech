@extends('layouts.app', ['is_active'=>'ourBusiness'])

@section('content')
    <h3 class="page-title">@lang('global.ourBusiness.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.ourBusiness.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        <i style="float:left">حجم الصورة المناسب 227*225 بكسل </i>
        <div class="panel-body">

                <div id="arabi" class="tab-pane fade in active">
                    <div class="row" >
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title_ar', trans('global.ourBusiness.fields.title').'', ['class' => 'control-label']) !!}
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
                            {!! Form::label('title_en', trans('global.ourBusiness.fields.title_en').'', ['class' => 'control-label']) !!}
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
                            {!! Form::label('description_ar', trans('global.ourBusiness.fields.desciption').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description_ar', old('description_ar'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
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
                            {!! Form::label('description_en', trans('global.ourBusiness.fields.desciption_en').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description_en', old('description_en'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('description_en'))
                                <p class="help-block">
                                    {{ $errors->first('description_en') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    
                    <div class="row" >
                        <div class="col-xs-12 form-group">
                            {!! Form::label('link', 'رابط العمل ', ['class' => 'control-label']) !!}
                            {!! Form::url('link', old('link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('link'))
                                <p class="help-block">
                                    {{ $errors->first('link') }}
                                </p>
                            @endif
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label >الخدمات التابع لها </label>
                            <select class="form-control select2" name="service_id[]" multiple style="widht:70%">
                                <option value="" selected disabled>يرجى اختيار الخدمات</option>
                                @foreach(@$services as $service)
                                <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                            </select>
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
        
        $(".js-example-rtl").select2({
  dir: "rtl"
});


    </script>
  

   

@stop