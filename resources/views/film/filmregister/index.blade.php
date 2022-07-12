@inject('request', 'Illuminate\Http\Request')
@extends('layouts.appfilm')

@section('content')
    <h3 class="page-title">  المسجلون في الموقع</h3>



    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($filmregister) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>


                        <th> الاسم </th>
                        <th> الموبايل </th>
                        <th> الايميل </th>
                        <th> المهنة </th>
                        <th> المؤسسة </th>
                        <th> ملاحظة </th>

                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($filmregister) > 0)
                        @foreach ($filmregister as $data)
                            <tr data-entry-id="{{ $data->id }}">


                                <td field-key='title'>{!!   $data->name  !!}</td>
                                <td field-key='title'>{!!   $data->mobile  !!}</td>
                                <td field-key='title'>{!!   $data->email  !!}</td>
                                <td field-key='title'>{!!   $data->job  !!}</td>
                                <td field-key='title'>{!!   $data->company  !!}</td>
                                <td field-key='title'>{!!   $data->notes  !!}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.film.filmregister.restore', $data->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.film.filmregister.perma_del', $data->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('offer_view')
                                    <a href="{{ route('admin.film.filmregister.show',[$data->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan

                                    @can('offer_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.film.filmregister.destroy', $data->id])) !!}
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
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.film.filmregister.mass_destroy') }}'; @endif
        @endcan

        $('.table-striped').dataTable({
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: -1,
            dom: 'Bfrtip',
            buttons:[
                {
                    extend: 'excel',
                    text: 'اكسل',
                    exportOptions: {
                        columns: [1,2,3]
                    },
                    title: ' المسجلون في الفعالية'
                },

                {
                    extend: 'print',
                    text: 'طباعة',
                    exportOptions: {
                        columns:[1,2,3]
                    },
                    title: '  المسجلون في الفعالية'
                }
            ]
        });
    </script>
@endsection