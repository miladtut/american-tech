@extends('layouts.appfilm')

@section('content')
    <h3 class="page-title">الشريك</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>

                            <td field-key='title'>{!! $data->name !!} </td>
                            <td field-key='title'>{!! $data->title !!} </td>
                        </tr>

                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.film.filmpartner.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
