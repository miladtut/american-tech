@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" rel="stylesheet">
    <h3 class="page-title">@lang('global.consultation.title')</h3>
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
                            <th>نوع الاستشارة</th>
                            <td field-key='tags'>{{ @$offer->consultationType->name }}</td>
                        </tr>
                        
                        <tr>
                            <th> تفاصيل الاستشارة</th>
                            <td field-key='tags'>{{ @$offer->details }}</td>
                        </tr>
                        <tr>
                            <th>وقت التواصل  </th>
                            <td field-key='tags'>{{ $offer->date }} - {{ @$offer->consultationTime->name }}</td>
                        </tr>

                        @if(isset($offer->attachments))
                        @php 
                        $i=1;
                        @endphp
                        <tr>
                            <th>المرفقات</th>
                            <td field-key='tags'>
                                @if(count($offer->attachments)>0)
                                @foreach($offer->attachments as $attachment)
                                <a href="{{consultationِAttachments_url($attachment->file)}}" download="cv-{{ $attachment->file }}">
                                    تنزيل
                                 </a>
                                 @if(count($offer->attachments )>$i)
                                       ,
                                  @endif
                                  @php
                                  ++$i;
                                  @endphp                           
                                @endforeach
                                @else
                                 لا يوجد مرفقات
                                @endif
                            </td>
                          @endif
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


                    </table>

                    @if(Auth::user()->type == 'admin')                                    
  
            <div class="row">
                <div class="col-lg-3">
                    {!! Form::label('text_tr', 'حالة الاستشارة', ['class' => 'control-label']) !!}
    
                    <select class="form-control" id="status">
                        @foreach($counselingStatus as $c)
                            <option value="{{$c->id}}" {{ $c->id== $offer->status ? 'selected' :''}}>{{$c->name}} </option>
                        @endforeach
                    </select>
    
    
    
                </div>
                </div>
                <div class="row" style="margin-top: 20px">
                <div class="col-lg-3">
                    <button type="button" class="btn btn-block btn-warning btn-lg" onclick="changeStatus({{$offer->id}})">تعديل</button>
                </div>
                </div>

                </div>
            </div>
            @endif

            <p>&nbsp;</p>

            <a href="{{ route('admin.consultation.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


@section('javascript')
    @parent

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
    <script>

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });


        function changeStatus(id ){

            var checkactive = $('#checkactive').is(':checked')

            var status = $("#status").val();


            $.ajax({

                type:'POST',


                url: '{{url('/admin')}}/ajaxChangeStatusConsultation',

                data:{  id:id , status:status},

                success:function(data){

                   if(data.status){
                       $.toast({
                           text : "تم التعديل بنجاح",
                           showHideTransition : 'slide',  // It can be plain, fade or slide
                           bgColor : '#02579F',              // Background color for toast
                           textColor : '#FFF',            // text color
                           allowToastClose : false,       // Show the close button or not
                           hideAfter : 5000,              // `false` to make it sticky or time in miliseconds to hide after
                           stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                           textAlign : 'right',            // Alignment of text i.e. left, right, center
                           position : 'bottom-left'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                       })
                   }

                }

            });

        }

    </script>


@endsection

