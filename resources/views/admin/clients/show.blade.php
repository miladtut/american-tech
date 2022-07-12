@extends('layouts.app', ['is_active'=>'clients'])

@section('content')
    <h3 class="page-title">@lang('global.clients.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.clients.fields.name')</th>
                            <td field-key='name'>{{ $client->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clients.fields.image')</th>
                            <td field-key='image'>
                                @if($client->image)
                                    <img src="{{ asset(env('UPLOAD_PATH').'/' . $client->image) }}" withd="200">
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clients.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
