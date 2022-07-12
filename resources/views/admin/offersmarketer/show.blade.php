@extends('layouts.app')

@section('content')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" rel="stylesheet">
    <h3 class="page-title">@lang('global.offers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">


                        <tr>
                            <th> نوع العميل</th>
                            <td field-key='tags'>{{ @$offer->client_type }}</td>
                        </tr>

                        <tr>
                            <th> متوسط السعر  </th>
                            <td field-key='tags'>{{ @$offer->price_from }}  - {{ $offer->price_to }}   ريال </td>
                        </tr>

                        <tr>
                            <th> مدة العمل المطلوبة</th>
                            <td field-key='tags'>{{ @$offer->time_progress }}</td>
                        </tr>

                        <tr>
                            <th>  نوع المشروع</th>
                            <td field-key='tags'>{{ @$offer->project_type }}</td>
                        </tr>

                        <tr>
                            <th> وصف المشروع </th>
                            <td field-key='tags'>{{ @$offer->project_desc }}</td>
                        </tr>

                        <tr>
                            <th> البداية في المشروع </th>
                            <td field-key='tags'>{{ @$offer->when_start }}</td>
                        </tr>

                        <tr>
                            <th> من أين وصلت الينا ؟ </th>
                            <td field-key='tags'>{{ @$offer->from_where_connect }}</td>
                        </tr>


                        <tr>
                            <th> الطلب من خلال  </th>
                            <td field-key='tags'>
                                   @if($offer->marketer)
                              المسوق :   {{ $offer->marketer->fullname }}
                                       @else
                                        الموقع
                                    @endif
                            </td>
                        </tr>


                        <tr>
                            <th>  الموافقة على الطلب    </th>
                            <td field-key='tags'>

                                @if($offer->status == 1)
                                      تم الموافقة

                                    @else
                                   لم يتم الموافقة بعد

                                @endif

                            </td>
                        </tr>







                        @if($offer->marketer)
                            <th>  نسبة المسوق    </th>
                            <td field-key='tags'>


                                   {{$offer->status==1 ? $offer->cost_perc : '' }}



                            </td>
                        @else
                        @endif



                        <tr>

                        </tr>




                    </table>
                </div>
            </div>

            <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="row" style="margin-top: 20px">

            </div>

            <style>
                .switch {
                    position: relative;
                    display: inline-block;
                    width: 60px;
                    height: 34px;
                }

                .switch input {
                    opacity: 0;
                    width: 0;
                    height: 0;
                }

                .slider {
                    position: absolute;
                    cursor: pointer;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background-color: #ccc;
                    -webkit-transition: .4s;
                    transition: .4s;
                }

                .slider:before {
                    position: absolute;
                    content: "";
                    height: 26px;
                    width: 26px;
                    left: 4px;
                    bottom: 4px;
                    background-color: white;
                    -webkit-transition: .4s;
                    transition: .4s;
                }

                input:checked + .slider {
                    background-color: #009933;
                }

                input:focus + .slider {
                    box-shadow: 0 0 1px #009933;
                }

                input:checked + .slider:before {
                    -webkit-transform: translateX(26px);
                    -ms-transform: translateX(26px);
                    transform: translateX(26px);
                }

                /* Rounded sliders */
                .slider.round {
                    border-radius: 34px;
                }

                .slider.round:before {
                    border-radius: 50%;
                }
            </style>

            <p>&nbsp;</p>

            <a href="{{ route('admin.offers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


