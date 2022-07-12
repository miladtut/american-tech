@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.team.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.team.fields.name')</th>
                            <td field-key='title'>{{ $team->name }}</td>
                        </tr>
                        <tr>
                            <th> الهاتف</th>
                            <td field-key='details'>{!! $team->phone !!}</td>
                        </tr>
                        <tr>
                            <th> البريد الالكتروني</th>
                            <td field-key='details'>{!! $team->email !!}</td>
                        </tr>
                        <tr>
                            <th>  تاريخ الميلاد</th>
                            <td field-key='details'>{!! $team->bod !!}</td>
                        </tr>

                        <tr>
                            <th>    مكان الاقامة</th>
                            <td field-key='details'>{!! $team->place !!}</td>
                        </tr>

                        <tr>
                            <th>   المؤهل العلمي   </th>
                            <td field-key='details'>{!! $team->education !!}</td>
                        </tr>


                        <tr>
                            <th>    الوصف الوظيفي  </th>
                            <td field-key='details'>{!! $team->job_desc !!}</td>
                        </tr>

                        <tr>
                            <th>    رابط الاعمال   </th>
                            <td field-key='details'>
                                <a href="{{ $team->link_work}}" target="_blank" >
                                    الرابط
                                  </a>
                            </td>
                        </tr>
                        <tr>
                            <th>    عدد سنوات الخبرة  </th>
                            <td field-key='details'>{!! $team->experince !!}</td>
                        </tr>


                        <tr>
                            <th>     الحد الادنى للراتب  </th>
                            <td field-key='details'>{!! $team->salary_limit !!}</td>
                        </tr>

                        <tr>
                            <th>    نظام العمل  </th>
                            <td field-key='details'>{{@$team->workSystem->name}}</td>
                        </tr>

                        @if($team->file != null)
                        <tr>
                            <th>     السيرة الذاتية  </th>
                            <td field-key='details'>
                                <a href="{{cv_url( $team->file)}}" download="cv-{{ $team->name }}">
                                  تنزيل
                                </a>
                            </td>
                        </tr>
                            @endif

                    </table>
                </div>
            </div><!-- Nav tabs -->

            <p>&nbsp;</p>

            <a href="{{ route('admin.team.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
