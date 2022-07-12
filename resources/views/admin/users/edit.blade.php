@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>

                @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.users.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('quickadmin.users.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', trans('quickadmin.users.fields.password').'*', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <label > نوع المستخدم <span style="font-size:10px">تلميح:عندما يكون نوع المستخدم مسوق يجب ان تحدد المسوق التابع للحساب </span></label>
                    <select class="form-control" name="type" id="type">
                        <option value="admin" {{ $user->type =='admin' ? 'selected' : '' }}> مدير نظام  </option>
                        <option value="marketer" {{ $user->type =='marketer' ? 'selected' : '' }}> مسوق  </option>
                   
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group marketerDiv" style="display: none" >
                    <label >المسوق</label>
                    <select class="form-control" name="marketer_id" id="marketer_id">
                        <option value=""> يرجى اختيار المسوق </option>
                       @foreach(@$marketingteams as $marketingteam)
                         
                        <option value="{{$marketingteam->id}}"   @if(isset($user->Marketing->id)) {{ @$user->Marketing->id ==$marketingteam->id ? 'selected' : '' }}  @endif >{{@$marketingteam->fullname}}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            

            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
@parent
<script type="text/javascript">
    $( document ).ready(function() {
        TypeUser($('#type').val());
    });

    $( "#type" ).change(function() {
       TypeUser($('#type').val());
    });

    function TypeUser(type){
        $('.marketerDiv').hide();
        if(type=='admin'){
          $('.marketerDiv').hide();
        }else if(type=='marketer'){
          $('.marketerDiv').show();
        }
    }

</script>

 @stop


