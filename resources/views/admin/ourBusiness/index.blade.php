@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app', ['is_active'=>'ourBusiness'])

@section('content')
    <h3 class="page-title">@lang('global.ourBusiness.title')</h3>
    @can('service_create')
    <p>
        <a href="{{ route('admin.ourBusiness.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan


    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($ourBusiness) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>


                        <th>@lang('global.ourBusiness.fields.title')</th>
                        <th>@lang('global.ourBusiness.fields.desciption')</th>

                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($ourBusiness) > 0)
                        @foreach ($ourBusiness as $ourBusines)
                            <tr data-entry-id="{{ $ourBusines->id }}">


                                <td field-key='title'>{{ $ourBusines->title_ar }}</td>
                                <td field-key='desciption'>
                                    @php
                                    $text=strip_tags($ourBusines->description_ar);
                                    if(strlen($text)>70){
                                        echo mb_substr($text,0,70,"utf-8") . ' ... ';
                 
                                     }else{
                                         echo $text;
                                     }
                                     @endphp
                                   </td>

                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ourBusiness.restore', $ourBusines->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ourBusiness.perma_del', $ourBusines->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>

                                    @can('service_edit')
                                    <a href="{{ route('admin.ourBusiness.edit',[$ourBusines->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('service_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ourBusiness.destroy', $ourBusines->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('service_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.services.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection