@extends('layouts.app', ['is_active'=>'blog'])

@section('content')
    <h3 class="page-title">@lang('global.blog.title')</h3>
    
    {!! Form::model($blog, ['method' => 'PUT', 'route' => ['admin.blog.update', $blog->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
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
                        <input type="hidden" value="{{@$blog->isPublished}}" name="isPublished" id="isPublishedBtn">
                        <input type="checkbox" name="status" value="1" class="checkbox" @if(@$blog->isPublished==1)checked="" @endif>
                      
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('department', trans('global.blog.fields.department').'', ['class' => 'control-label']) !!}
                        <select class="form-control" id="department_id" name="department_id" class="department_id">
                          <option >@lang('global.blog.fields.department')</option>
                          @foreach(@$blogDepartments as $blogDepartment)
                          <option value="{{@$blogDepartment->id}}" @if($blogDepartment->id==$blog->department_id) selected @endif>{{@$blogDepartment->name}}</option>
                          @endforeach
                        </select>

                    </div>
                </div>




                <hr>
                <h3>  صور  </h3>




                <div class="row">
                       @if($blog->images != '' )
                           <?php
                            $images = $blog->images ;


                           ?>

                           @foreach($images as $image)
                               <div class="col-lg-3" style=" margin: 15px; " id="img{{$image->id}}">

                                   <div>
                                     <img src="{{image_url($image->image)}}" style="height: 150px ; width: 100%" >
                                   </div>
                                   
                                     <div style="margin: 5px 0px ;">
                                       <input type="text" class="form-control" id="alt" name="altedit[{{$image->id}}]" value="{{$image->alt}}"  placeholder=" alt image">
                                   </div>

                                <div style="margin: 5px 0px ;">
                                       <input type="text" class="form-control" id="alt" name="altedit_en[{{$image->id}}]" value="{{$image->alt_en}}"  placeholder=" alt image English">
                                   </div>

                             
                                   <button class="btn btn-danger" type="button" onclick="confrimdelete({{$image->id}},{{  $blog->id }})">
                                       <i class="glyphicon glyphicon-close"  ></i>remove
                                   </button>
                               </div>
                           @endforeach

                        @endif
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
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="filename[]" class="form-control" accept='.jpg,.png,.jpeg'>
                            <div class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
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

               

            
        </div>


    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $(document).ready(function() {

            $(".btnlink").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $(".btnyou").click(function(){
                var html = $("#cloneyoutube").html();
                $(".increment2").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
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

  
    <script>

        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });





        function confrimdelete(id , blog ){


            console.log('blog '+ blog);

             if (confirm("Are you sure?")) {
                 // your deletion code
                 $.ajax({

                     type:'POST',
                     url:'{{url('/')}}/ajaxDeleteImageBlog',
                     data:{ blog_id:blog, image_id:id},
                     success:function(data){

                         if(data.status == true ){
                             // display error alert message bootstrap
                           $('#img'+id).remove();

                         }


                     }

                 });

             }
             return false;

         }
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


                $('#selectType').change(function(){
                    val =   $('#selectType').val();
                    if(val == 1){
                        $('#picFileSec').hide();
                        $('#videoSec').show();
                    }else{
                        $('#picFileSec').show();
                        $('#videoSec').hide();
                    }
                });

                
            </script>


@stop