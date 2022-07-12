@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.media.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.media.fields.title')</th>
                            <td field-key='title'>{{ $medium->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.type')</th>
                            <td field-key='type'>{{ $medium->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.file')</th>
                            <td field-key='file'>@if($medium->file)<a href="{{ asset(env('UPLOAD_PATH').'/' . $medium->file) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.media.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
