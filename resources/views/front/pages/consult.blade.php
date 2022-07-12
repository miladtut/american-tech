@extends('front.layouts.index' , ['is_active'=>'consultation','sub_title'=>__('global.front.free_consultation') ])

@section('content')
@push('front_css')
<link rel="stylesheet" href="{{asset('front/css/bootstrap-datetimepicker.css')}}"/>
<link rel="stylesheet" href="{{asset('front/css/dropzone.css')}}"/>
<link rel="stylesheet" href="{{asset('front/css/bootstrap-select.css')}}"/>
@endpush
<div class="page-header">
    <div class="container">
      <h1 class="title-page"> @lang('global.front.free_consultation')</h3>
    </div>
  </div>
  <div class="main-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <form class="wow fadeInUp" id="consult_form" action="" method="POST" data-wow-duration="1.5s" data-wow-delay="0.1s">
            @csrf
            <?php
            $query_string = \Request::query();
            //dd(  $query_string);
            ?>
            <input type="hidden" name="marketer_hash" id="marketer_hash" value="{{ $query_string ? $query_string['m'] : ''  }}">

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <input class="form-control" type="text" name="name" id="name" placeholder="@lang('global.front.fullname')"/>
                </div>
              </div>
              {{--  <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-icon">
                    <input class="form-control" type="text" placeholder="000 000 000"/>
                    <div class="select-phone">
                      <select class="selectpicker" data-width="160px">
                        <option value="">652+</option>
                        <option value="">941+</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>  --}}
              
              <div class="col-lg-6 mobileNumber">
                <div class="form-group">
                  <div class="input-icon">
                    <input type="hidden" id="hiddenPhoneInput" name="hiddenPhoneInput" value="">
                    <input type="tel" id="phone" name="PhoneInput" class="form-control validateMe plchold" placeholder="   --- --- ---  " style="font-size: 22px">
                    <div class="select-phone">
                      <select class="selectpicker" id="country_code" data-width="160px">
                        @include('front.component.country')

                      </select>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-lg-6">
                <div class="form-group">
                  <input class="form-control" id="email" name="email" type="email" placeholder="@lang('global.front.email')"/>
                </div>
              </div>
              <input type="hidden" id="dateInput" name="{{$now}}" />

              <div class="col-lg-6">
                <div class="form-group">
                  <select class="selectpicker" name="type" id="type" title="@lang('global.front.consultation_type')">
                      <option value="" disabled selected></option>
                      @foreach(@$consultationType as $c)
                          <option value="{{@$c->id}}">{{ app()->isLocale('ar')? $c->name  : $c->name_en }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <textarea class="form-control p-3" id="details" name="details" rows="5" placeholder="@lang('global.front.consultation_details')"></textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>@lang('global.front.consultation_attachments_or_supporting_documents')</label>
                    <div class="div_consultation_attachments" id="div_consultation_attachments"></div>
                  <div class="dropzone" id="myDropzoneConsultation"></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="widget__choice">
                  <div class="widget__choice-title">@lang('global.front.select_the_day_and_date')</div>
                  <div class="widget__choice-action">
                    <div class="form-group">
                      <div class="main-calendar">
                        <input type="hidden" class="dateSelected" id="dateSelected" name="dateSelected">
                        <div class="vanilla-calendar" id="myCalendar"></div>
                        {{--  <div class="footer-calendar">
                          <div class="day">
                            15
                          </div>
                          <div class="d-flex flex-column align-items-center mr-3">
                            <span class="month">ديسمبر</span>
                            <span class="year">2020</span> 
                          </div>
                        </div>  --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="widget__choice">
                  <div class="widget__choice-title">@lang('global.front.select_time')</div>
                  <div class="widget__choice-action">
                    <input value="" type="hidden" id="consultationTimeInput" name="consultationTimeInput">
                    @foreach($consultationTimes as $consultationTime)
                    <button class="widget__btn btn_sm consultationTime" id="{{$consultationTime->id}}" type="button">{{$consultationTime->name}}</button>
                    @endforeach
                 
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mx-auto">
                <div class="form-group">
                  <button class="general_btn_lg" type="submit">@lang('global.front.send_request')</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@push('front_js')
<script src="{{asset('front/js/dropzone.js')}}"></script>
<script src="{{asset('front/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('front/js/calendar.js')}}" type="text/javascript"></script>
<script src="{{asset('front/js/bootstrap-select.min.js')}}"></script>

<script>
 
  
  $(document).on('click' , '.consultationTime' , function (e) {
      $('.consultationTime').removeClass('selected');
      $(this).addClass('selected');

      var id=$(this).attr('id');
      $('#consultationTimeInput').val(id);
    })

    $(document).on('change' , '#country_code' , function (e) {
      code=$('#country_code').val();
      phone=$('#phone').val();
      codeAndPhone=code+phone;
      $('#hiddenPhoneInput').val(codeAndPhone);
   })

   $(document).on('focusout' , '#phone' , function (e) {
     code=$('#country_code').val();
     phone=$('#phone').val();
     codeAndPhone=code+phone;
     $('#hiddenPhoneInput').val(codeAndPhone);
  })
  
  
   
  var form = $("#consult_form");
  jQuery.validator.addMethod("phoneSA", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length ==10
}, "");
  form.validate({
      errorPlacement: function errorPlacement(error, element) {
          element.before(error);
      },
      rules: {
          email: {
              required: true,
              email:true,
          },
          name:{
           required:true,
          },
          client_type:{
            required:true,
          },
          PhoneInput:{
            required:true,
            number:true,
            phoneSA:true,

          },
          type:{
            required:true,
          },
          details:{
            required:true,
          }
         
      },
      messages: {
          email: {
              required:'',
              email:'',
              
          },
          name:{
            required:'',
              
          },
          client_type:{
            required:'',

          },
          PhoneInput:{
            required:'',
            number:'',
          },
          type:{
            required:'',
          },
          details:{
            required:'',

          }
          
       

      }
  });



  $('#consult_form').on('submit', function(e){
    e.preventDefault();

        var _token = $("input[name='_token']").val();
        var name = $("#name").val();
        var phone = $("#hiddenPhoneInput").val();
        var email = $("#email").val();
        var consultation_type = $("#type").val();
        var consultation_details = $("#details").val();
        var attachments=$('#attachments').val();

        var  attachments = [] ;

          $("input[name='attachments[]']").each(function() {
            attachments.push($(this).val());
          });

        var date=$('#dateSelected').val();
        console.log(date);
        var time=$('#consultationTimeInput').val();
        var marketer_hash = $("#marketer_hash").val();

        if (form.valid()) {
        $.ajax({
            type: "post",
            url:'{{route("web.ajaxaddCounsult")}}',

                 data:{_token:_token,
                     name:name, phone:phone, email:email , consultation_type:consultation_type ,consultation_details:consultation_details ,
                     attachments:attachments , date:date , time:time,marketer_hash:marketer_hash
                 },
           
            success: function (data) {
              if(isJson(data)){
                data = jQuery.parseJSON(data)  ;
               }

                if(data['status']==true){

                  customSweetAlert(
                    'success',
                    '@lang("global.front.operation_accomplished_successfully")',
                    '@lang("global.front.your_request_has_been_sent_successfully")',
                    function (event) {
                    }
                );
                $('#consult_form')[0].reset();
                $('.dz-preview').empty();
                $('#div_consultation_attachments').empty();
                 
                }else{
                    if(data["data_validator"] !=null){

                         var dt = '<ul>';
                        $.each(data["data_validator"], function (key, value) {
                            dt = dt + '<li>' + value + '</li>';
                        })
                        dt =dt+ '</ul>';

                    swal({
                        title: "@lang('global.front.error')!",
                        type: "error",
                        text:"@lang('global.front.error')!",
                        html:dt,
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "oK",
                        cancelButtonText: "cancel",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    });
                 
                }else{
                  swal({
                    title: "",
                    text: data["data"],
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "oK",
                    cancelButtonText: "cancel",
                    closeOnConfirm: true,
                    closeOnCancel: true
                });
                }

            }
              

                
            },
            error: function (data)
            {
                console.log(data);
              
                swal({
                  title: "@lang('global.front.error')!",
                  type: "error",
                  text:"{{__('global.front.unexpected_error')}}",
                  showCancelButton: false,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "oK",
                  cancelButtonText: "cancel",
                  closeOnConfirm: true,
                  closeOnCancel: true
              });
           
            
            }
        });
      }
      

});

</script>



@endpush

@endsection