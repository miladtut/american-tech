@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.media.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.media.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('global.media.fields.title').'', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('type', trans('global.media.fields.type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('type', $enum_type, old('type'), ['class' => 'form-control ' , 'id'=>'selectType']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('type'))
                        <p class="help-block">
                            {{ $errors->first('type') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group" id="secPrimary">
                    {!! Form::label('file', trans('global.media.fields.file').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('file', old('file')) !!}
                    {!! Form::file('file', ['class' => 'form-control']) !!}
                    {!! Form::hidden('file_max_size', 115) !!}
                    <p class="help-block"></p>
                    @if($errors->has('file'))
                        <p class="help-block">
                            {{ $errors->first('file') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group" id="secUrl" style="display: none">
                    {!! Form::label('url', 'رابط يوتيوب', ['class' => 'control-label']) !!}
                    {!! Form::text('url', old('url'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('url'))
                        <p class="help-block">
                            {{ $errors->first('url') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
@section('javascript')

    <script>
        $(document).ready(function () {

            mm = $('#selectType').val();

            if (mm == 'video') {
                $('#secPrimary').css('display','none');
                $('#secUrl').css('display','block');
            } else {
                $('#secUrl').css('display','none');
                $('#secPrimary').css('display','block');
            }


            $('#selectType').on('change', function(v) {
                //console.log('change vd'+ mm);
                if (this.value == 'video'){
                    $('#secPrimary').css('display','none');
                    $('#secUrl').css('display','block');
                }else{
                    $('#secUrl').css('display','none');
                    $('#secPrimary').css('display','block');
                }
            });

        });

        </script>

    @endsection
