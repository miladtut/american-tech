@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.settings.title')</h3>

    {!! Form::model($setting, ['method' => 'PUT', 'route' => ['admin.settings.settingsprofile', $setting->id]]) !!}


    <div class="panel panel-default">






        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bank_iban', 'Iban Bank Account', ['class' => 'control-label']) !!}
                    {!! Form::text('bank_iban', Auth::user()->bank_iban, ['class' => 'form-control', 'placeholder' => '' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bank_iban'))
                        <p class="help-block">
                            {{ $errors->first('bank_iban') }}
                        </p>
                    @endif
                </div>
            </div>












            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    </form>
@stop

@section('javascript')

@stop