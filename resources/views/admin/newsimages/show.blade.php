@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.newsimages.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.newsimages.fields.image')</th>
                            <td field-key='image'>@if($newsimage->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $newsimage->image) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.newsimages.fields.news')</th>
                            <td field-key='news'>{{ $newsimage->news->title or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.newsimages.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
