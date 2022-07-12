@extends('layouts.app', ['is_active'=>request('parent')])

@section('content')
    <h3 class="page-title">@lang('global.systemConstants.title')</h3>
    {!! Form::open(['method' => 'POST', 'url' => url()->current(), 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        <i style="float:left"> </i>
        <div class="panel-body">


                <div id="arabi" class="tab-pane fade in active">

                        @if(request('parent')!='ConsultationTimes')
                        <div class="row" >

                        <div class="col-xs-12 form-group">
                            {!! Form::label('name', trans('global.systemConstants.fields.name').'', ['class' => 'control-label']) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                    </div>

                    <div class="row" >
                        <div class="col-xs-12 form-group">
                            {!! Form::label('name_en', trans('global.systemConstants.fields.name_en').'', ['class' => 'control-label']) !!}
                            {!! Form::text('name_en', old('name_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name_en'))
                                <p class="help-block">
                                    {{ $errors->first('name_en') }}
                                </p>
                            @endif
                        </div>

                    </div>
                    @else

                    <div class="row" >

                        <div class="col-xs-12 form-group">
                            {!! Form::label('name', trans('global.systemConstants.fields.name').'', ['class' => 'control-label']) !!}
                            {!! Form::time('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                    </div>

                    <input name="name_en" type="hidden" value="null">


                    @endif
            </div>






        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
   
@stop