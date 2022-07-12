@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app', ['is_active'=>'customerOpinions'])

@section('content')
    <h3 class="page-title">@lang('global.customerOpinions.title')</h3>
    @can('service_create')
    <p>
        <a href="{{ route('admin.customerOpinions.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan


    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($customerOpinions) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>


                        <th>@lang('global.customerOpinions.fields.name')</th>
                        <th>@lang('global.customerOpinions.fields.desciption')</th>

                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($customerOpinions) > 0)
                        @foreach ($customerOpinions as $customerOpinion)
                            <tr data-entry-id="{{ $customerOpinion->id }}">


                                <td field-key='title'>{{ $customerOpinion->name_ar }}</td>
                                <td field-key='desciption'>
                                    @php
                                    $text=strip_tags ($customerOpinion->description_ar);
                                    if(strlen($text)>70){
                                        echo mb_substr($text,0,70,"utf-8") . '...';
                 
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
                                        'route' => ['admin.customerOpinions.restore', $customerOpinion->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.customerOpinions.perma_del', $customerOpinion->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>

                                    @can('service_edit')
                                    <a href="{{ route('admin.customerOpinions.edit',[$customerOpinion->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('service_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.customerOpinions.destroy', $customerOpinion->id])) !!}
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