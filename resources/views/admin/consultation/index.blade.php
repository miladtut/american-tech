@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.consultation.title')</h3>



    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($consultation) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>


                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>البريد الالكتروني</th>
                        <th> وقت الاستشارة</th>
                        <th>الحالة</th>
                        {{--  @if(Auth::user()->type == 'admin')  --}}
                        <th>&nbsp;</th>
                        {{--  @endif  --}}
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($consultation) > 0)
                        @foreach ($consultation as $con)
                            <tr data-entry-id="{{ $con->id }}">


                                <td field-key='title'>{{ $con->fullname }}</td>
                                <td field-key='text'>{!! $con->phone !!}</td>
                                <td field-key='tags'>{{ $con->email }}</td>
                                <td field-key='tags'>{{ $con->date }} - {{ @$con->consultationTime->name }}</td>

                                <td field-key='getStatus'> {{ @$con->getStatus->name }}</td>

                                <td>

                                    <a href="{{ route('admin.consultation.show',[$con->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    <a href="{{ route('admin.consultation.sendMsg.index',[$con->id]) }}" class="btn btn-xs btn-info">@lang('global.sendMsg')</a>

                                    @if(Auth::user()->type == 'admin')                                    
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.consultation.destroy', $con->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan

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
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.consultation.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection