@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.settings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.settings.fields.address')</th>
                            <td field-key='address'>{{ $setting->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.mobile')</th>
                            <td field-key='mobile'>{{ $setting->mobile }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.email')</th>
                            <td field-key='email'>{{ $setting->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.hourwork')</th>
                            <td field-key='hourwork'>{!! $setting->hourwork !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.footertext')</th>
                            <td field-key='footertext'>{!! $setting->footertext !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.copyright')</th>
                            <td field-key='copyright'>{{ $setting->copyright }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.facebook')</th>
                            <td field-key='facebook'>{{ $setting->facebook }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.twitter')</th>
                            <td field-key='twitter'>{{ $setting->twitter }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.linkedin')</th>
                            <td field-key='linkedin'>{{ $setting->linkedin }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.petrest')</th>
                            <td field-key='petrest'>{{ $setting->petrest }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.google')</th>
                            <td field-key='google'>{{ $setting->google }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.youtube')</th>
                            <td field-key='youtube'>{{ $setting->youtube }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.instagram')</th>
                            <td field-key='instagram'>{{ $setting->instagram }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.settings.fields.titlewebsite')</th>
                            <td field-key='titlewebsite'>{{ $setting->titlewebsite }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.settings.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
