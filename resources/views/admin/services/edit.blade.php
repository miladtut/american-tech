@extends('layouts.app', ['is_active'=>'services'])

@section('content')
    <h3 class="page-title">@lang('global.services.title')</h3>
    
    {!! Form::model($service, ['method' => 'PUT', 'route' => ['admin.services.update', $service->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>
        {{--  <i style="float:left">حجم الصورة المناسب 230*460 بكسل </i>  --}}
        <div class="panel-body">
            <div id="arabi" class="tab-pane fade in active">
                <div class="row" >
                    <div class="col-xs-12 form-group">
                        {!! Form::label('title', trans('global.services.fields.title').'', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('title'))
                            <p class="help-block">
                                {{ $errors->first('title') }}
                            </p>
                        @endif
                    </div>

                </div>

                <div class="row" >
                    <div class="col-xs-12 form-group">
                        {!! Form::label('title_en', trans('global.services.fields.title_en').'', ['class' => 'control-label']) !!}
                        {!! Form::text('title_en', old('title_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('title_en'))
                            <p class="help-block">
                                {{ $errors->first('title_en') }}
                            </p>
                        @endif
                    </div>

                </div>                

                {{--  <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('slug','Url Slug', ['class' => 'control-label']) !!}
                        {!! Form::text('slug', old('slug'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('slug'))
                            <p class="help-block">
                                {{ $errors->first('slug') }}
                            </p> 
                        @endif
                    </div>
                </div>  --}}




                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('desciption', trans('global.services.fields.desciption').'', ['class' => 'control-label']) !!}
                        {!! Form::textarea('desciption', old('desciption'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('desciption'))
                            <p class="help-block">
                                {{ $errors->first('desciption') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('desciption_en', trans('global.services.fields.desciption_en').'', ['class' => 'control-label']) !!}
                        {!! Form::textarea('desciption_en', old('desciption_en'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('desciption_en'))
                            <p class="help-block">
                                {{ $errors->first('desciption_en') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('isShow', trans('global.services.fields.isShow').'', ['class' => 'control-label']) !!}
                        <input type="hidden" value="{{@$service->isShow}}" name="isShow" id="isShowBtn">
                        <input type="checkbox" name="status" value="{{@$service->isShow}}" class="checkbox" @if(@$service->isShow==1) checked="" @endif>
                      
                    </div>
                </div>



                <hr>
                <h3>  صور للخدمة </h3>

                <div class="row">
                       @if($service->image != ''  )
                      
                               <div class="col-lg-5" style=" margin: 15px; ">
                                   <div>
                                     <img src="{{image_url($service->image)}}" style="height: 150px ; width: 100%" >
                                   </div>
                               </div>
                        @endif

                        @if($service->image_thumbnail != ''  )
                      
                        <div class="col-lg-5" style=" margin: 15px; ">
                            <div>
                              <img src="{{image_url($service->image_thumbnail)}}" style="height: 150px ; width: 100%" >
                            </div>
                        </div>
                 @endif
                </div>

                    <hr>
                    <h3> اضافة صور للخدمة </h3>
                    
                <div class="row" >
                   
                    <div class="col-lg-6">
                   {!! Form::label('file_main', 'الصورة الاساسية (حجم الصورة المناسب 230*460 بكسل)', ['class' => 'control-label']) !!}
                    <input type="file" name="file_main" class="form-control" accept='.jpg,.png,.jpeg'>
                  
                    </div>
                  
                    <div class="col-lg-6">
                        {!! Form::label('file_thumbnail', 'الصورة المصغرة (حجم الصورة المناسب 70*70 بكسل)', ['class' => 'control-label']) !!}
                         <input type="file" name="file_thumbnail" class="form-control" accept='.jpg,.png,.jpeg'>
                       
                    </div>

                </div>
                
                <div class="row" >
                        <div class="col-xs-3 form-group">
                            {!! Form::label('alt','alt (عربي)', ['class' => 'control-label']) !!}
                            {!! Form::text('alt', old('alt'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('alt'))
                                <p class="help-block">
                                    {{ $errors->first('alt') }}
                                </p>
                            @endif
                        </div>
                          <div class="col-xs-3 form-group">
                            {!! Form::label('alt_en','alt (الانجليزية)', ['class' => 'control-label']) !!}
                            {!! Form::text('alt_en', old('alt_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('alt_en'))
                                <p class="help-block">
                                    {{ $errors->first('alt_en') }}
                                </p>
                            @endif
                        </div>
                        
                        
                        

                   
                     <div class="col-xs-3 form-group">
                            {!! Form::label('alt_file_thumbnail','alt (عربي)', ['class' => 'control-label']) !!}
                            {!! Form::text('alt_file_thumbnail', old('alt_file_thumbnail'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('alt_file_thumbnail'))
                                <p class="help-block">
                                    {{ $errors->first('alt_file_thumbnail') }}
                                </p>
                            @endif
                        </div>
                        
                          <div class="col-xs-3 form-group">
                            {!! Form::label('alt_file_thumbnail_en','alt (الانجليزية)', ['class' => 'control-label']) !!}
                            {!! Form::text('alt_file_thumbnail_en', old('alt_file_thumbnail_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('alt_file_thumbnail_en'))
                                <p class="help-block">
                                    {{ $errors->first('alt_file_thumbnail_en') }}
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
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>

    <script>
    
        $(".checkbox").Sswitch({
          onSwitchChange: function() {
            // Your magic
            if($('#isShowBtn').val()==1){
                $('#isShowBtn').val(0)
            }else{
                $('#isShowBtn').val(1)
            }
          }
        });
        </script>

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

            <script type="text/javascript">
            </script>


@stop