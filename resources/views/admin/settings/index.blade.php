@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.settings.title')</h3>
    @can('setting_create')
    <p>
        <a href="{{ route('admin.settings.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.settings.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.settings.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($settings) > 0 ? 'datatable' : '' }} @can('setting_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('setting_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.settings.fields.address')</th>
                        <th>@lang('global.settings.fields.mobile')</th>
                        <th>@lang('global.settings.fields.email')</th>
                        <th>@lang('global.settings.fields.hourwork')</th>
                        <th>@lang('global.settings.fields.footertext')</th>
                        <th>@lang('global.settings.fields.copyright')</th>
                        <th>@lang('global.settings.fields.facebook')</th>
                        <th>@lang('global.settings.fields.twitter')</th>
                        <th>@lang('global.settings.fields.linkedin')</th>
                        <th>@lang('global.settings.fields.petrest')</th>
                        <th>@lang('global.settings.fields.google')</th>
                        <th>@lang('global.settings.fields.youtube')</th>
                        <th>@lang('global.settings.fields.instagram')</th>
                        <th>@lang('global.settings.fields.titlewebsite')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($settings) > 0)
                        @foreach ($settings as $setting)
                            <tr data-entry-id="{{ $setting->id }}">
                                @can('setting_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='address'>{{ $setting->address }}</td>
                                <td field-key='mobile'>{{ $setting->mobile }}</td>
                                <td field-key='email'>{{ $setting->email }}</td>
                                <td field-key='hourwork'>{!! $setting->hourwork !!}</td>
                                <td field-key='footertext'>{!! $setting->footertext !!}</td>
                                <td field-key='copyright'>{{ $setting->copyright }}</td>
                                <td field-key='facebook'>{{ $setting->facebook }}</td>
                                <td field-key='twitter'>{{ $setting->twitter }}</td>
                                <td field-key='linkedin'>{{ $setting->linkedin }}</td>
                                <td field-key='petrest'>{{ $setting->petrest }}</td>
                                <td field-key='google'>{{ $setting->google }}</td>
                                <td field-key='youtube'>{{ $setting->youtube }}</td>
                                <td field-key='instagram'>{{ $setting->instagram }}</td>
                                <td field-key='titlewebsite'>{{ $setting->titlewebsite }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.settings.restore', $setting->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.settings.perma_del', $setting->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('setting_view')
                                    <a href="{{ route('admin.settings.show',[$setting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('setting_edit')
                                    <a href="{{ route('admin.settings.edit',[$setting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('setting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.settings.destroy', $setting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="19">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('setting_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.settings.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection