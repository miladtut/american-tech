@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.offers.title')</h3>



    

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
                        <th>نوع العميل</th>
                        <th>البريد الالكتروني</th>
                        <th>تاريخ الارسال </th>


                        <th>من جهة </th>
                        <th>&nbsp;الموافقة </th>
                        <th>&nbsp;نسبة المسوق </th>
                        <th>&nbsp; المتابع </th>
                        <th>&nbsp; </th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($offers) > 0)
                        @foreach ($offers as $offer)
                            <tr data-entry-id="{{ $offer->id }}">


                                <td field-key='title'>{{ @$offer->fullname }}</td>
                                <td field-key='text'>{!! @$offer->phone !!}</td>
                                <td field-key='tags'>{{ @$offer->client_type }}</td>
                                <td field-key='tags'>{{ @$offer->email }}</td>
                                <td field-key='tags'>{{ \Carbon\Carbon::parse($offer->created_at)->toDateString() }}</td>




                                <td>

                                    @if($offer->marketer)
                                       {{ $offer->marketer->fullname }}
                                    @else
                                        الموقع
                                    @endif

                                </td>



                                <td>
                                    @if($offer->status == 1)

                                         تم الموافقة
                                        @else
                                        لم تتم بعد

                                    @endif


                                </td>

                                <td>
                                    @if($offer->status == 1)
                                        {{ $offer->cost_perc }}

                                     @else
                                        -
                                    @endif


                                </td>

                                <td>
                                    @if($offer->supervisor_id > 0)
                                        {{ $offer->supervisor->name ?? '-' }}

                                    @else
                                        -
                                    @endif


                                </td>

                                <td>
                                    @can('offer_view')
                                        <a href="{{ route('admin.offers.show',[$offer->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>

                                    <a href="{{ route('admin.offers.sendMsg.index',[$offer->id]) }}" class="btn btn-xs btn-info">@lang('global.sendMsg')</a>
                                    @endcan

                                    @can('offer_delete')
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                                                'route' => ['admin.offers.destroy', $offer->id])) !!}
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

      function checkToggle(id ){

         var checkactive =  $(this).hasClass( "active" );

          console.log (' the id is '+ id + ' and sec active is '+  checkactive);
      }



        @can('offer_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.offers.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection