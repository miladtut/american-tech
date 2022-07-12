@extends('layouts.app', ['is_active'=>'services'])

@section('content')
    <h3 class="page-title">@lang('global.services.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.services.fields.title')</th>
                            <td field-key='title'>{{ $service->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.services.fields.desciption')</th>
                            <td field-key='desciption'>{!! $service->desciption !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.services.fields.image')</th>
                            <td field-key='image'>@if($service->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $service->image) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.services.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
