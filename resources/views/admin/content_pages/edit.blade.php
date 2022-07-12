@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.content-pages.title')</h3>
    
    {!! Form::model($content_page, ['method' => 'PUT', 'route' => ['admin.content_pages.update', $content_page->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.content-pages.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('title_en', trans('quickadmin.content-pages.fields.title_en').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title_en', old('title_en'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('page_text', trans('quickadmin.content-pages.fields.page-text').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('page_text', old('page_text'), ['class' => 'form-control editor', 'placeholder' => '','id'=>'editor1']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('page_text'))
                        <p class="help-block">
                            {{ $errors->first('page_text') }}
                        </p>
                    @endif
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('page_text_en',trans('quickadmin.content-pages.fields.page-text-en').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('page_text_en', old('page_text_en'), ['class' => 'form-control editor', 'placeholder' => '','id'=>'editor2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('page_text_en'))
                        <p class="help-block">
                            {{ $errors->first('page_text_en') }}
                        </p>
                    @endif
                </div>
            </div>

          
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );


        ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
            .create( document.querySelector( '#editor3' ) )
            .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>

@stop