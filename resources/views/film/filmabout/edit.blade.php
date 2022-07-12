@extends('layouts.appfilm')

@section('content')
    <h3 class="page-title">حول الفعالية</h3>
    
    {!! Form::model($data, ['method' => 'PUT', 'route' => ['admin.film.filmabout.update', $data->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">



            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('about', 'النص عن الفعالية', ['class' => 'control-label']) !!}
                    {!! Form::textarea('about', old('about'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('about'))
                        <p class="help-block">
                            {{ $errors->first('about') }}
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




    <link rel="stylesheet" href="{{url('css/selectize.css')}}">
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
    </script>


@stop