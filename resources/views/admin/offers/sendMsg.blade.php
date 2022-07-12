@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.offers.title')</h3>
    
    {!! Form::model($item, ['method' => 'POST', 'route' => ['admin.offers.sendMsg.send'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.msgs')
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
        

             
                @if(count($item->msg)>0)
                <div class="row"><div class="col-md-12"><h2 class="text-center">الرسائل السابقة</h2></div>
                  </div>
                @foreach(@$item->msg as $m)
                <div class="row">
                    <div class="col-md-6 text-right">
                         <i class="fa fa-user"></i> <span> {{@$m->getUser->name}}  </span>
                        </div>

                        <div class="col-md-6 text-left">
                        {{@$m->created_at}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                         @php echo $m->text @endphp
                        </div>
                    </div>
                        
                        <br>
                        <hr>
                    @endforeach
                @endif
                
                <div class="row">

                <input type="hidden" name="email" value="{{$item->email}}">
                <input type="hidden" name="id" value="{{$item->id}}">
                <div class="col-xs-12 form-group">
                    {!! Form::label('msg', trans('global.offers.fields.msg').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('msg', '',['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('msg'))
                        <p class="help-block">
                            {{ $errors->first('msg') }}
                        </p>
                    @endif
                </div>
            </div>

            

          
            
        </div>
    </div>

    {!! Form::submit(trans('global.send'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

    
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

@endsection