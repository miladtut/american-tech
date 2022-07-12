@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.mailingList.title')</h3>
    @can('service_create')
    <p>
        <a href="{{ route('admin.mailingList.export') }}" target="_blank"  class="btn btn-success">@lang('global.export_excel')</a>
        
    </p>
    @endcan


    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($mailingList) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>


                        <th>@lang('global.mailingList.fields.email')</th>
                        <th>@lang('global.date_created')</th>

                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($mailingList) > 0)
                        @foreach ($mailingList as $mail)
                            <tr data-entry-id="{{ $mail->id }}">


                                <td field-key='title'>{{ $mail->email }}</td>
                                <td field-key='created_at'>{!! $mail->created_at !!}</td>

                            
                                
                                 <td>

                                    <a href="{{ route('admin.mailingList.sendMsg.index',[$mail->id]) }}" class="btn btn-xs btn-info">@lang('global.sendMsg')</a>
                              
                                </td>  
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