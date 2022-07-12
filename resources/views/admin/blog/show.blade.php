@extends('layouts.app', ['is_active'=>'blog'])

@section('content')
    <h3 class="page-title">@lang('global.blog.title_ar')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.blog.fields.title_ar')</th>
                            <td field-key='title_ar'>{{ $blog->title_ar }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.blog.fields.description_ar')</th>
                            <td field-key='description_ar'>{!! $blog->description_ar !!}</td>
                        </tr>
                    
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.blog.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
