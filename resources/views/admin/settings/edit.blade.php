@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.settings.title')</h3>
    
    {!! Form::model($setting, ['method' => 'PUT', 'route' => ['admin.settings.update', $setting->id] , 'files' => true,]) !!}

    <div class="panel panel-default">

        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row" >
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link active show" data-toggle="tab"
                           href="#m_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="false">
                            <i class="flaticon-settings-1"></i> إعدادات الموقع
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab"
                           href="#m_portlet_base_demo_1_2_tab_content" role="tab" aria-selected="false">
                            <i class="flaticon2-website"></i> إعدادات مواقع التواصل الإجتماعي
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab"
                           href="#m_portlet_base_demo_1_3_tab_content" role="tab" aria-selected="false">
                            <i class="flaticon-users-1"></i> بيانات الإتصال
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab"
                           href="#m_portlet_base_demo_1_4_tab_content" role="tab" aria-selected="false">
                            <i class="flaticon-users-1"></i> نصوص الصفحات 
                        </a>
                    </li>
                </ul>

            </div>

            <div class="tab-content" style="margin-top: 24px;">

                <div class="tab-pane  active " id="m_portlet_base_demo_1_1_tab_content" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('meta_title', 'عنوان الموقع', ['class' => 'control-label']) !!}
                            {!! Form::text('meta_title', old('meta_title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('meta_title'))
                                <p class="help-block">
                                    {{ $errors->first('meta_title') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('meta_title_en', 'عنوان الموقع بالانجلزية', ['class' => 'control-label']) !!}
                            {!! Form::text('meta_title_en', old('meta_title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('meta_title_en'))
                                <p class="help-block">
                                    {{ $errors->first('meta_title_en') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('meta_desc', 'الوصف', ['class' => 'control-label']) !!}
                            {!! Form::textarea('meta_desc', old('meta_desc'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('meta_desc'))
                                <p class="help-block">
                                    {{ $errors->first('meta_desc') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('meta_desc_en', 'الوصف بالانجلزية', ['class' => 'control-label']) !!}
                            {!! Form::textarea('meta_desc_en', old('meta_desc_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('meta_desc_en'))
                                <p class="help-block">
                                    {{ $errors->first('meta_desc_en') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('tags', trans('global.offers.fields.tags').'', ['class' => 'control-label']) !!}
                            {!! Form::text('key_words', old('key_words'), ['class' => '', 'id' => 'input-tags2']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('key_words'))
                                <p class="help-block">
                                    {{ $errors->first('key_words') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('tags','Tags', ['class' => 'control-label']) !!}
                            {!! Form::text('tags', old('tags'), ['class' => '', 'id' => 'input-tags']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('tags'))
                                <p class="help-block">
                                    {{ $errors->first('tags') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('copyright','نص حقوق الملكية ', ['class' => 'control-label']) !!}
                            {!! Form::text('copyright', old('copyright'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('copyright'))
                                <p class="help-block">
                                    {{ $errors->first('copyright') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('copyright_en','نص حقوق الملكية بالانجلزية', ['class' => 'control-label']) !!}
                            {!! Form::text('copyright_en', old('copyright_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('copyright_en'))
                                <p class="help-block">
                                    {{ $errors->first('copyright_en') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('hourwork','ساعات العمل', ['class' => 'control-label']) !!}
                            {!! Form::text('hourwork', old('hourwork'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('hourwork'))
                                <p class="help-block">
                                    {{ $errors->first('hourwork') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('hourwork_en','ساعات العمل بالانجلزية', ['class' => 'control-label']) !!}
                            {!! Form::text('hourwork_en', old('hourwork_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('hourwork_en'))
                                <p class="help-block">
                                    {{ $errors->first('hourwork_en') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                        
                            <a href="{{ asset('uploads/' . $setting->companyFile) }}" download>{{trans('global.settings.fields.companyFile')}}</a>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('file',  trans('global.settings.fields.companyFile').'', ['class' => 'control-label']) !!}
                                <input type="file" name="file" class="form-control">
            
                                <p class="help-block"></p>
                                @if($errors->has('file'))
                                    <p class="help-block">
                                        {{ $errors->first('file') }}
                                    </p>
                                @endif
                            </div>
                        </div>
            
                         @if($setting->logo!='')
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                     <img src="{{image_url($setting->logo)}}" width="100" alt="logo">
                                </div>
                            </div>
                            @endif

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('file_logo',  trans('global.settings.fields.logo').'', ['class' => 'control-label']) !!}
                            <input type="file" name="file_logo" class="form-control">

                            <p class="help-block"></p>
                            @if($errors->has('file_logo'))
                                <p class="help-block">
                                    {{ $errors->first('file_logo') }}
                                </p>
                            @endif
                        </div>
                    </div>
            
            

                    

                </div>
 
                {{--  ====================================================================================== --}}

                <div class="tab-pane" id="m_portlet_base_demo_1_2_tab_content" role="tabpanel">

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('facebook', trans('global.settings.fields.facebook').'', ['class' => 'control-label']) !!}
                            {!! Form::text('facebook', old('facebook'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('facebook'))
                                <p class="help-block">
                                    {{ $errors->first('facebook') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('twitter', trans('global.settings.fields.twitter').'', ['class' => 'control-label']) !!}
                            {!! Form::text('twitter', old('twitter'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('twitter'))
                                <p class="help-block">
                                    {{ $errors->first('twitter') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('linkedin', trans('global.settings.fields.linkedin').'', ['class' => 'control-label']) !!}
                            {!! Form::text('linkedin', old('linkedin'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('linkedin'))
                                <p class="help-block">
                                    {{ $errors->first('linkedin') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('instagram', trans('global.settings.fields.instagram').'', ['class' => 'control-label']) !!}
                            {!! Form::text('instagram', old('instagram'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('instagram'))
                                <p class="help-block">
                                    {{ $errors->first('instagram') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('behance', 'behance', ['class' => 'control-label']) !!}
                            {!! Form::text('behance', old('behance'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('behance'))
                                <p class="help-block">
                                    {{ $errors->first('behance') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
                    
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('snapchat', 'snapchat', ['class' => 'control-label']) !!}
                            {!! Form::text('snapchat', old('snapchat'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('snapchat'))
                                <p class="help-block">
                                    {{ $errors->first('snapchat') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
                   
        
                 


                </div>

                {{--  ====================================================================================== --}}

                <div class="tab-pane" id="m_portlet_base_demo_1_3_tab_content" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('mobile', trans('global.settings.fields.mobile').'', ['class' => 'control-label']) !!}
                            {!! Form::text('mobile', old('mobile'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('mobile'))
                                <p class="help-block">
                                    {{ $errors->first('mobile') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('email', trans('global.settings.fields.email').'', ['class' => 'control-label']) !!}
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('whatsapp', 'whatsapp', ['class' => 'control-label']) !!}
                            {!! Form::text('whatsapp', old('whatsapp'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('whatsapp'))
                                <p class="help-block">
                                    {{ $errors->first('whatsapp') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('address','عنوانا', ['class' => 'control-label']) !!}
                            {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('address'))
                                <p class="help-block">
                                    {{ $errors->first('address') }}
                                </p>
                            @endif
                        </div>
                    </div>
        
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('address_en','عنوانا بالانجلزية', ['class' => 'control-label']) !!}
                            {!! Form::text('address_en', old('address_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('address_en'))
                                <p class="help-block">
                                    {{ $errors->first('address_en') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    
                </div>

                {{--  ====================================================================================== --}}


                <div class="tab-pane" id="m_portlet_base_demo_1_4_tab_content" role="tabpanel">

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('text_services_ar', 'نص خدماتنا بالعربية', ['class' => 'control-label']) !!}
                            {!! Form::textarea('text_services_ar', old('text_services_ar'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('text_services_ar'))
                                <p class="help-block">
                                    {{ $errors->first('text_services_ar') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('text_services_en','نص خدماتنا بالانجليزية', ['class' => 'control-label']) !!}
                            {!! Form::textarea('text_services_en', old('text_services_en'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('text_services_en'))
                                <p class="help-block">
                                    {{ $errors->first('text_services_en') }}
                                </p>
                            @endif
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('text_business_ar','نص اعمالنا بالعربية ', ['class' => 'control-label']) !!}
                            {!! Form::textarea('text_business_ar', old('text_business_ar'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('text_business_ar'))
                                <p class="help-block">
                                    {{ $errors->first('text_business_ar') }}
                                </p>
                            @endif
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('text_business_en','نص أعمالنا بالانجليزية', ['class' => 'control-label']) !!}
                            {!! Form::textarea('text_business_en', old('text_business_en'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('text_business_en'))
                                <p class="help-block">
                                    {{ $errors->first('text_business_en') }}
                                </p>
                            @endif
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



    <link rel="stylesheet" href="{{url('selectize.css')}}">
    <!--[if IE 8]><script src="{{url('js/es5.js')}}"></script><![endif]-->

    <script src="{{url('js/standalone/selectize.js')}}"></script>
    <script>
        $('#input-tags').selectize({
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });
        $('#input-tags2').selectize({
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });
        $('#input-tags_tr').selectize({
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

@stop