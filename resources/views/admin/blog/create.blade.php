@extends('layouts.app', ['is_active'=>'blog'])

@section('content')
    <h3 class="page-title">@lang('global.blog.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.blog.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        <i style="float:left">حجم الصورة المناسب 315*750 بكسل </i>
        <div class="panel-body">
                <div id="arabi" class="tab-pane fade in active">
                    <div class="row" >
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title_ar', trans('global.blog.fields.title_ar').'', ['class' => 'control-label']) !!}
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
                            {!! Form::label('title_en', trans('global.blog.fields.title_en').'', ['class' => 'control-label']) !!}
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
                            {!! Form::label('description_ar', trans('global.blog.fields.description_ar').'', ['class' => 'control-label']) !!}
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
                            {!! Form::label('description_en', trans('global.blog.fields.description_en').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description_en', old('description_en'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
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
                            {!! Form::label('tags_ar', trans('global.blog.fields.tags_ar').'', ['class' => 'control-label']) !!}
                            {!! Form::text('tags_ar', old('tags_ar'), ['class' => '', 'id' => 'input_tags_ar']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('tags_ar'))
                                <p class="help-block">
                                    {{ $errors->first('tags_ar') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('tags_en', trans('global.blog.fields.tags_en').'', ['class' => 'control-label']) !!}
                            {!! Form::text('tags_en', old('tags_en'), ['class' => '', 'id' => 'input_tags_en']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('tags_en'))
                                <p class="help-block">
                                    {{ $errors->first('tags_en') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('isPublished', trans('global.blog.fields.isPublished').'', ['class' => 'control-label']) !!}
                            <input type="hidden" value="1" name="isPublished" id="isPublishedBtn">
                            <input type="checkbox" name="status" value="1" class="checkbox" checked="">
                          
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('department', trans('global.blog.fields.department').'', ['class' => 'control-label']) !!}
                            <select class="form-control" id="department_id" name="department_id" class="department_id">
                              <option>@lang('global.blog.fields.department')</option>
                              @foreach(@$blogDepartments as $blogDepartment)
                              <option value="{{@$blogDepartment->id}}">{{@$blogDepartment->name}}</option>

                              @endforeach
                            </select>

                        </div>
                    </div>


            

                    <div id="picFileSec" >
                    <hr>
                    <h3> اضافة صور  </h3>



                            <div class="input-group control-group increment" >
                                <input type="file" name="filename[]" class="form-control" accept='.jpg,.png,.jpeg'>
                                <div class="input-group-btn">
                            <button class="btn btn-success btnlink" style="    width: 82px;" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                                
                                  <div class="col-lg-4">
                                   <input type="input" name="alt[]" class="form-control" placeholder="Alt Image">
                                </div>
                                
                                  <div class="col-lg-4">
                                   <input type="input" name="alt_en[]" class="form-control" placeholder="Alt Image English">
                                </div>
                            
                            </div>

                            <div class="clone hide">
                                <div class="control-group input-group divImage" style="margin-top:10px">
                                    <input type="file" name="filename[]" class="form-control" accept='.jpg,.png,.jpeg' >
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger removeImage" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                    
                                  <div class="col-lg-4">
                                   <input type="input" name="alt[]" class="form-control" placeholder="Alt Image">
                                </div>
                                
                                  <div class="col-lg-4">
                                   <input type="input" name="alt_en[]" class="form-control" placeholder="Alt Image English">
                                </div>

                                  
                                </div>
                            </div>
                    </div>

                    <div id="videoSec">

                   
                   

                    </div>






            </div>






        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $(document).on('click', '.btnAddImage', function () {
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $(document).on('click', '.removeImage', function () {
         $(this).closest('.divImage').remove();
        });

        
        
        $(document).ready(function() {

            $(".btnlink").click(function(){
                var html = $(".clone").html();
              
                $(".increment").after(html);
            });          

        });

    </script>
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    
    <link rel="stylesheet" href="{{url('selectize.css')}}">
    <!--[if IE 8]><script src="{{url('js/es5.js')}}"></script><![endif]-->

    <script src="{{url('js/standalone/selectize.js')}}"></script>
    <script>
        $('#input_tags_ar').selectize({
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });

        $('#input_tags_en').selectize({
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

    <script>
    
        $(".checkbox").Sswitch({
          onSwitchChange: function() {
            // Your magic
            if($('#isPublishedBtn').val()==1){
                $('#isPublishedBtn').val(0)
            }else{
                $('#isPublishedBtn').val(1)
            }
          }
        });
        </script>
        <!--end::Page
    <script type="text/javascript">
    

    

    </script>

@stop