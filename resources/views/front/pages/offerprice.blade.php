@extends('front.layouts.index' , ['sub_title' => __("global.front.request_a_offer_price"),'is_active'=>'offerprice' ])

@section('content')
@push('front_css')
<link rel="stylesheet" href="{{asset('front/css/bootstrap-datetimepicker.css')}}"/>
<link rel="stylesheet" href="{{asset('front/css/ion.rangeSlider.min.css')}}"/>
<link rel="stylesheet" href="{{asset('front/css/bootstrap-select.css')}}"/>

@endpush
<div class="page-header">
    <div class="container">
      <h3 class="title-page">@lang('global.front.request_a_offer_price')</h3>
    </div>
  </div>
  <div class="main-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <form class="wow fadeInUp" action="" method="post" id="offerprice" data-wow-duration="1.5s" data-wow-delay="0.1s">
                @csrf

                <?php
                $query_string = \Request::query();
                //dd(  $query_string);
                ?>
                <input type="hidden" name="marketer_hash" id="marketer_hash" value="{{ $query_string ? $query_string['m'] : ''  }}">

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="@lang('global.front.fullname')"/>
                </div>
              </div>

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
                  <input class="form-control" name="email" id="email" type="text" placeholder="@lang('global.front.email')"/>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input class="form-control" name="client_type" id="clientTypeInput" type="text" placeholder="@lang('global.front.client_type')"/>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <textarea class="form-control p-3" name="project_desc" id="project_desc" rows="5" placeholder="@lang('global.front.about_the_project')"></textarea>
                </div>
              </div>

                <div class="col-lg-12">
                <div class="widget__choice">
                    <div class="widget__choice-title">@lang('global.front.projectType')</div>
                    <div class="widget__choice-action">
                        <input type="hidden" value="" name="projectType" id="projectType" >
                    @foreach(@$projectType  as $p)
                    <button type="button"  class="widget__btn projectTypeBtn" id="{{@$p->id}}">{{ app()->isLocale('ar')? $p->name  : $p->name_en }}</button>
                    @endforeach
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="widget__choice">
                  <div class="widget__choice-title">@lang('global.front.biddingOptions')</div>
                  <div class="widget__choice-action">
                      <input type="hidden" value="" name="biddingOptions" id="biddingOptions" >
                      @foreach(@$biddingOptions as $BiddingOption)
                    <button type="button" class="widget__btn  biddingOptionsBtn" id="{{$BiddingOption->id}}">{{ app()->isLocale('ar')? $BiddingOption->name  : $BiddingOption->name_en }}</button>
                     @endforeach

                </div>
                </div>
              </div>
            
              <div class="col-lg-12">
                <div class="widget__choice mb-5">
                  <div class="widget__choice-title">@lang('global.front.estimated_budget_for_the_project')</div>
                  <div class="widget__choice-action">
                    <div class="form-group mb-0 w-100">
                      <input class="RangeSlider" type="text"/>
                      <div class="range_price_input"><span class="price">1000 @lang('global.front.sr')</span><span class="price">500,000 @lang('global.front.sr')</span></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="widget__choice">
                  <div class="widget__choice-title">@lang('global.front.projected_time_for_the_project')</div>
                  <div class="widget__choice-action"> 
                    @foreach(@$projectedTime as $pt)
                    <label class="m-checkbox">
                      <input type="radio" value="{{$pt->id}}" name="projectedTime" id="projectedTime"/><span class="checkmark"></span>
                      {{ app()->isLocale('ar')? $pt->name  : $pt->name_en }}
                    </label>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="widget__choice mt-3">
                  <div class="widget__choice-title">@lang('global.front.when_do_you_want_to_start_the_project')</div>
                  <div class="widget__choice-action"> 
                      @foreach(@$projectStartTime as $pst)
                      <label class="m-checkbox">
                        <input type="radio" value="{{$pst->id}}" name="projectStartTime" id="projectStartTime"/><span class="checkmark"></span>
                        {{ app()->isLocale('ar')? $pst->name  : $pst->name_en }}
                      </label>
                      @endforeach
                </div>
              </div>
            </div>
              <div class="col-lg-12">
                <div class="widget__choice">
                  <div class="widget__choice-title">@lang('global.front.where_did_you_get_from_us')</div>
                  <div class="widget__choice-action">
                    <input type="hidden" value="" name="connect" id="connect" >
                    @foreach(@$connect as $c)
                    <button class="widget__btn connectBtn" type="button" id="{{@$c->id}}">{{ app()->isLocale('ar')? $c->name  : $c->name_en }}</button>
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
<script src="{{asset('front/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap-select.min.js')}}"></script>

<script>
      if(document.getElementsByClassName("RangeSlider")[0]){
        var $range = $(".RangeSlider"),
        min = 1000,
        max = 500000;
      
        
      $range.ionRangeSlider({
        type: "double",
        min: min,
        max: max,
        @if(app()->isLocale('ar'))
        prettify: function (num) {
          var tmp_min = min,
            tmp_max = max,
            tmp_num = num;
      
          if (min < 0) {
            tmp_min = 0;
            tmp_max = max - min;
            tmp_num = num - min;
            tmp_num = tmp_max - tmp_num;
            return tmp_num + min;
          } else {
            num = max - num + min;
            return num;
          }
        }
        @endif
      });
      
      }

  
 

    $(document).on('click' , '.biddingOptionsBtn' , function (e) {
      $('.biddingOptionsBtn').removeClass('selected');
      $(this).addClass('selected');

      var id=$(this).attr('id');
      $('#biddingOptions').val(id);
    })

    $(document).on('click' , '.projectTypeBtn' , function (e) {
        $('.projectTypeBtn').removeClass('selected');
        $(this).addClass('selected');
  
        var id=$(this).attr('id');
        $('#projectType').val(id);
      
      })

      $(document).on('click' , '.connectBtn' , function (e) {
        $('.connectBtn').removeClass('selected');
        $(this).addClass('selected');
  
        var id=$(this).attr('id');
        $('#connect').val(id);
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
     


  var form = $("#offerprice");
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
          project_desc:{
            required:true,            
          },
          projectedTime:{
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
          project_desc:{
            required:'',            
          },
          projectedTime:{
            required:'',            
          }
          
       

      }
  });



  $('#offerprice').on('submit', function(e){
    e.preventDefault();

        var _token = $("input[name='_token']").val();
        var name = $("#name").val();
        var phone = $("#hiddenPhoneInput").val();
        var client_type = $("#clientTypeInput").val();

        var email = $("#email").val();
        var project_desc = $("#project_desc").val();

        var marketer_hash = $("#marketer_hash").val();

        var peice=$('input.RangeSlider').val();
        var splite_price = peice.split(";");

        // var price_from = 900 -splite_price[1];
        
        // var price_to =  900- splite_price[0];

        var price_from =(500000-splite_price[1]  ) + 1000;
        var price_to =  (500000-splite_price[0]  ) + 1000;

        var time_progress = $('input[name=projectedTime]:checked').val();
        var when_start = $('input[name=projectStartTime]:checked').val();
        var connect = $("#connect").val();
        var biddingOptions=$('#biddingOptions').val();
        var project_type=$('#projectType').val();

        
        if (form.valid()) {
          console.log
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
          url:'{{route("web.ajaxaddOffer")}}',
          type: "post",
          cache:false,
                 data:{_token:_token,
                     name:name, phone:phone, email:email , project_desc:project_desc ,project_type:project_type ,
                     marketer_hash:marketer_hash , price_from:price_from , price_to:price_to , time_progress:time_progress ,
                     when_start:when_start , connect:connect , client_type:client_type , project_type:project_type,biddingOptions:biddingOptions
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
                $('#offerprice')[0].reset();
                //clear fileds
                $('.connectBtn').removeClass('selected');
                 $('#connect').val('');

                 $('.projectTypeBtn').removeClass('selected');
                 $('#projectType').val('');

                 $('.biddingOptionsBtn').removeClass('selected');
                 $('#biddingOptions').val('');
                 
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
                  text:"@lang('global.front.unexpected_error')",
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