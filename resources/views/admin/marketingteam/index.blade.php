@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.marketingteam.title')</h3>
    <p>
        <a href="{{ route('admin.marketingteam.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($offers) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>


                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>البريد الالكتروني</th>
                        <th> كود الرابط </th>
                        <th>  تاريخ التسجيل </th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($offers) > 0)
                        @foreach ($offers as $offer)
                            <tr data-entry-id="{{ $offer->id }}">


                                <td field-key='title'>{{ $offer->fullname }}</td>
                                <td field-key='text'>{!! $offer->phone !!}</td>
                                <td field-key='tags'>{{ $offer->email }}</td>
                                <td field-key='tags'>{{ $offer->code }}</td>
                                <td field-key='tags'>{{ \Carbon\Carbon::parse($offer->created_at)->toDateString() }}</td>


                                <td>
                                    @can('offer_view')
                                    <a href="{{ route('admin.marketingteam.show',[$offer->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan

                                    @can('offer_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.marketingteam.destroy', $offer->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                <td field-key='tags'>

                                    @if($offer->user_id == '' )

                                    <a href="{{ route('admin.usersmarketer.create',[ 'id' => $offer->id]) }}" class="btn btn-lg btn-primary">

                                            اضافة مستخدم
                                    </a>
                                    @else
                                        <a href="{{ route('admin.usersmarketer.edit',[ 'id' => $offer->id]) }}" class="btn btn-md btn-warning"> تعديل المستخدم
                                        </a>
                                    @endif

                                </td>

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
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.marketingteam.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection