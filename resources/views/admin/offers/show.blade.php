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
                            <th> نوع العميل</th>
                            <td field-key='tags'>{{ $offer->client_type }}</td>
                        </tr>

                        <tr>
                            <th> خيارات عرض السعر </th>
                            <td field-key='tags'>{{ @$offer->biddingOption->name}}</td>
                        </tr>


                        <tr>
                            <th> متوسط السعر  </th>
                            <td field-key='tags'>{{ $offer->price_from }}  - {{ $offer->price_to }}   ريال </td>
                        </tr>

                        <tr>
                            <th> مدة العمل المطلوبة</th>
                            <td field-key='tags'>{{ @$offer->projectedTime->name }}</td>
                        </tr>

                        <tr>
                            <th>  نوع المشروع</th>
                            <td field-key='tags'>{{ @$offer->projectType->name }}</td>
                        </tr>

                        <tr>
                            <th> وصف المشروع </th>
                            <td field-key='tags'>{{ $offer->project_desc }}</td>
                        </tr>

                        <tr>
                            <th> البداية في المشروع </th>
                            <td field-key='tags'>{{ @$offer->projectStartTime->name }}</td>
                        </tr>

                        <tr>
                            <th> من أين وصلت الينا ؟ </th>
                            <td field-key='tags'>{{ @$offer->connect->name }}</td>
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

                                <label class="switch">
                                    <input type="checkbox" name="checkactive" id="checkactive" {{ $offer->status == 1 ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>

                            </td>
                        </tr>



                        @if($offer->marketer)
                            <th>  نسبة المسوق    </th>
                            <td field-key='tags'>
                                <div class="form-group">

                                    <input type="text" class="form-control" value="{{$offer->status==1 ? $offer->cost_perc : '' }}" id="exampleInputEmail1" placeholder=" rsa " name="price" id="price">
                                </div>


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
                {!! Form::label('text_tr', 'مشرف اداري للمشروع', ['class' => 'control-label']) !!}

                <select class="form-control" id="supervisor_id">
                    <option value="0">لا يوجد</option>
                    @foreach($supervisors as $supervisor)
                        <option value="{{$supervisor->id}}" {{ $supervisor->id== $offer->supervisor_id ? 'selected' :''}}>{{$supervisor->name}} </option>
                    @endforeach
                </select>



            </div>
            </div>
            <div class="row" style="margin-top: 20px">
            <div class="col-lg-3">
                <button type="button" class="btn btn-block btn-warning btn-lg" onclick="changeOffer({{$offer->id}})">تعديل</button>
            </div>
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


@section('javascript')
    @parent

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
    <script>

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });


        function changeOffer(id ){

            var checkactive = $('#checkactive').is(':checked')

            var price = $("input[name=price]").val();
            var supervisor_id = $("#supervisor_id").val();

            console.log('checkactive is '+ checkactive);



            $.ajax({

                type:'POST',

                url: '{{url('/admin')}}/ajaxChangeOffer',

                data:{price:price, checkactive:checkactive , id:id , supervisor_id:supervisor_id},

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
