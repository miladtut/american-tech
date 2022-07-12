@extends('admin.messenger.template')

@section('title', $topic->subject)

@section('messenger-content')

    <div class="row">


        <div class="col-md-12">
            <div class="list-group" style="margin-top:8px;">

                    <div class="row list-group-item">
                        <div class="row">
                            <div style="float: right; text-align: right" class="col col-xs-10 {{ (in_array($topic->id, $unreadMessages)?"unread":false) }}">
                                <span> البريد الالكتروني  : </span>      {{ $topic->email }}
                            </div>
                            <div class="col col-xs-2" style="float: left">
                                {{  $topic->created_at->diffForHumans()/*format('d F Y h:i')*/ }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-xs-10 "style="float: right; text-align: right">
                                <span>   الاسم :</span>        {{ $topic->name }}
                            </div>
                        </div>
                        <div class="row" style="padding-left:15px;">
                            <div class="col col-xs-12" style="float: right; text-align: right">
                                <strong> الرسالة  :  </strong>
                            </div>
                            <div style="float: right; text-align: right; padding: 10px"class="col col-xs-12">
                                {{ $topic->content }}
                            </div>
                        </div>
                    </div>


            </div>

        </div>
    </div>

    <style>
        .messenger-table tr:first-child td {
            border-top: 0 !important;
        }

        .unread {
            font-weight: bold;
        }

        .list-group-item {
            border-top: 0;
            border-bottom: 0;
        }

        .list-group-item:first-child {
            border-top: 1px solid #ddd;
        }

        .list-group-item:last-child {
            border-bottom: 1px solid #ddd;
        }

        .list-group-item:hover {
            background-color: #eee;
        }
    </style>

@endsection