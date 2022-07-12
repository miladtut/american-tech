@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.marketingteam.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>الاسم</th>
                            <td field-key='title'>{{ $offer->fullname}}</td>
                        </tr>
                        <tr>
                            <th>رقم الهاتف</th>
                            <td field-key='text'>{!! $offer->phone !!}</td>
                        </tr>
                        <tr>
                            <th>البريد الالكتروني</th>
                            <td field-key='tags'>{{ $offer->email }}</td>
                        </tr>


                        <tr>
                            <th> كود الرابط </th>
                            <td field-key='tags'>{{ $offer->code }}</td>
                        </tr>
                        <tr>
                            <th>  Iban Bank Account </th>
                            <td field-key='tags'>
                                @php
                                if($offer->user_id > 0 ){
                                   $user = \App\User::where('id' , $offer->user_id)->first();
                                   $bank = $user->bank_iban;
                                }else{
                                $bank = '' ;
                                }

                                @endphp

                                {{$bank}}


                            </td>
                        </tr>




                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.marketingteam.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
