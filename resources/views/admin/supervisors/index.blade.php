@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">مشرفي ادارة المشاريع</h3>
    @can('news_create')
    <p>
        <a href="{{ route('admin.supervisors.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan




    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($supervisors) > 0 ? 'datatable' : '' }} @can('news_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                   
                        <th>@lang('quickadmin.category.fields.title')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($supervisors) > 0)
                        @foreach ($supervisors as $supervisor)
                            <tr data-entry-id="{{ $supervisor->id }}">
                              

                                <td field-key='title'>{{ $supervisor->name }}</td>

                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('news_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.supervisors.restore', $supervisor->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                        <td>
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.supervisors.perma_del', $supervisor->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}

                                </td>
                                @else
                                <td>

                                    @can('news_edit')
                                    <a href="{{ route('admin.supervisors.edit',[$supervisor->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                    @endcan


                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.supervisors.perma_del', $supervisor->id])) !!}
                                        {!! Form::submit('حذف', array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}



                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>


    </script>
@endsection