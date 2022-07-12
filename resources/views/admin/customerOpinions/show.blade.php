@extends('layouts.app', ['is_active'=>'customerOpinions'])

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
                            <th>@lang('global.ourBusiness.fields.title')</th>
                            <td field-key='title'>{{ $ourBusiness->title_ar }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.ourBusiness.fields.desciption')</th>
                            <td field-key='desciption'>{!! $ourBusiness->description_ar !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.ourBusiness.fields.image')</th>
                            <td field-key='image'>@if($ourBusiness->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $ourBusiness->image) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.ourBusiness.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
