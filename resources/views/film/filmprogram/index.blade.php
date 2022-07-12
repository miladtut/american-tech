@inject('request', 'Illuminate\Http\Request')
@extends('layouts.appfilm')

@section('content')
    <h3 class="page-title">  البرنامج</h3>
    @can('offer_create')
    <p>
        <a href="{{ route('admin.film.filmprogram.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>
    @endcan


    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($filmprogram) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>


                        <th> العنوان </th>
                        <th> التفاصيل </th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($filmprogram) > 0)
                        @foreach ($filmprogram as $data)
                            <tr data-entry-id="{{ $data->id }}">


                                <td field-key='title'>{!!   $data->title  !!}</td>
                                <td field-key='title'>{!!   $data->text  !!}</td>

                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.film.filmprogram.restore', $data->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.film.filmprogram.perma_del', $data->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('offer_view')
                                    <a href="{{ route('admin.film.filmprogram.show',[$data->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('offer_edit')
                                    <a href="{{ route('admin.film.filmprogram.edit',[$data->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('offer_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.film.filmprogram.destroy', $data->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('offer_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.film.filmprogram.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection