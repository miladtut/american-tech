@extends('layouts.app', ['is_active'=>'statistics'])

@section('content')
    <h3 class="page-title">@lang('global.statistics.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.statistics.fields.title')</th>
                            <td field-key='title'>{{ $statistics->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.statistics.fields.number')</th>
                            <td field-key='desciption'>{!! $statistics->number !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.statistics.fields.image')</th>
                            <td field-key='image'>@if($statistics->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $statistics->image) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.statistics.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
