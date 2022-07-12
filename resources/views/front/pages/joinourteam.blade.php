@extends('front.layouts.index' , ['is_active'=>'joinOurTeam','sub_title'=>__('global.front.join_the_team') ])

@section('content')
@push('front_css')
<link rel="stylesheet" href="{{asset('front/css/bootstrap-datetimepicker.css')}}"/>
<!--<link rel="stylesheet" href="{{asset('front/css/intlTelInput.css')}}"/>-->
<link rel="stylesheet" href="{{asset('front/css/dropzone.css')}}"/>
<link rel="stylesheet" href="{{asset('front/css/bootstrap-select.css')}}"/>
@endpush
<div class="page-header">
    <div class="container">
      <h1 class="title-page"> @lang('global.front.join_the_team')</h1>
    </div>
  </div>
  <div class="main-content">
    <div class="container">
      <div class="section-join">
        <div class="row">
          <div class="col-lg-7 mx-auto">
            <ul class="nav nav-pills mb-4 tab-join wow fadeInUp" id="pills-tab" data-wow-duration="1.5s" data-wow-delay="0.1s">
              <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#pills-1">@lang('global.front.marketing_department') </a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#pills-2">@lang('global.front.company_team') </a></li>
            </ul>
            <div class="tab-content wow fadeInUp" id="pills-tabContent" data-wow-duration="1.5s" data-wow-delay="0.2s">
              <div class="tab-pane fade show active" id="pills-1"> 
                <form  action="" method="post" id="Marketer-form" >
                    @csrf
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control" name="name" id="name_marketer" type="text" placeholder="@lang('global.front.fullname')"/>
                      </div>
                    </div>
                    {{--  <div class="col-lg-6">
                      <div class="form-group">
                        <div class="input-icon">
                          <input class="form-control" type="text" placeholder="000 000 000"/>
                          <div class="select-phone">
                            <select class="selectpicker" data-width="40px">
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
                    <input type="tel" id="phone" name="PhoneInput_market" class="form-control validateMe plchold" placeholder="   --- --- ---  " style="font-size: 22px">
                    <div class="select-phone">
                      <select class="selectpicker" id="country_code" data-width="160px">
                        @include('front.component.country')

                      </select>
                    </div>
                  </div>
                </div>
              </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <input class="form-control" name="email" id="email_marketer" type="text" placeholder="@lang('global.front.email')"/>
                      </div>
                    </div>
                    <div class="col-lg-7 mx-auto">
                      <div class="form-group">
                        <button class="general_btn_lg" type="submit">@lang('global.front.send_request')</button>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-group mb-3 mt-3">
                        <input class="form-control" id="link_marketer" name="link_marketer" type="text" placeholder="@lang('global.front.url')"/>
                        <div class="input-group-prepend"><span class="input-group-text copy-link">@lang('global.front.copyLink')</span></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="pills-2">
                <form action="" id="Member-form" class="Member-form" method="POST">
                    @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control" name="name" id="name" type="text" placeholder="@lang('global.front.fullname')"/>
                      </div>
                    </div>
                    {{--  <div class="col-lg-6">
                      <div class="form-group">
                        <div class="input-icon">
                          <input class="form-control" type="text" placeholder="000 000 000"/>
                          <div class="select-phone">
                            <select class="selectpicker" data-width="40px">
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
                            <input type="hidden" id="hiddenPhoneInput2" name="hiddenPhoneInput2" value="">
                            <input type="tel" id="phone2" name="PhoneInput_member" class="form-control validateMe plchold" placeholder="   --- --- ---  " style="font-size: 22px">
                            <div class="select-phone">
                              <select class="selectpicker" id="country_code2" data-width="160px">
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
                        <input class="form-control datetimepicker  text-left" name="bod" id="bod" type="text" placeholder="@lang('global.front.choose_date')"/>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control" type="text" name="place" id="place" placeholder="@lang('global.front.place_residence')"/>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control" type="text" name="education" id="education" placeholder="@lang('global.front.qualification')"/>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control" name="job_desc" id="job_desc" type="text" placeholder="@lang('global.front.job_description')"/>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control" name="link_work" id="link_work" type="text" placeholder="@lang('global.front.business_link')"/>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control" name="experince" id="experince" type="text" placeholder="@lang('global.front.years_experience')"/>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control" name="salary_limit" id="salary_limit" type="text" placeholder="@lang('global.front.minimum_expected_salary')"/>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="widget__choice">
                        <div class="widget__choice-title">@lang('global.front.choose_work_system')</div>
                        <div class="widget__choice-action"> 
                            @foreach(@$workingHours as $workHour)
                          <label class="m-checkbox">
                            <input type="radio" value="{{@$workHour->id}}" name="type_job" id="type_job"/><span class="checkmark"></span>
                            {{ app()->isLocale('ar')? $workHour->name  : $workHour->name_en }}  
                          </label>
                          @endforeach                       
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="widget__choice">
                        <div class="widget__choice-title"> @lang('global.front.attach_cv')</div>
                        <div class="widget__choice-action"> 
                          <input type="hidden" value="" id="inputCV" name="inputCV">
                          <div class="dropzone" id="myDropzoneCV"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-7 mx-auto">
                      <div class="form-group mt-2">
                        <button class="general_btn_lg" type="submit">@lang('global.front.send_request') </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@push('front_js')
<script src="{{asset('front/js/dropzone.js')}}"></script>
<script src="{{asset('front/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap-datetimepicker.min.js')}}"></script>

<script>
 
  
  $(".copy-link").click(function(event){
      copy();
        });

        function copy()
        {
            var copyText = document.getElementById("link_marketer");
            console.log('copy link');
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  
            /* Copy the text inside the text field */
            document.execCommand("copy");
        }

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
     
      

      $(document).on('change' , '#country_code2' , function (e) {
        code=$('#country_code2').val();
        phone=$('#phone2').val();
        codeAndPhone=code+phone;
        $('#hiddenPhoneInput2').val(codeAndPhone);
     })

     $(document).on('focusout' , '#phone2' , function (e) {
       code=$('#country_code2').val();
       phone=$('#phone2').val();
       codeAndPhone=code+phone;
       $('#hiddenPhoneInput2').val(codeAndPhone);
    })
    

  var Marketer_form = $("#Marketer-form");
  jQuery.validator.addMethod("phoneSA", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length == 10
}, "");
  Marketer_form.validate({
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
          PhoneInput_market:{
            required:true,
            number:true,
            phoneSA:true,
          },
        
         
      },
      messages: {
          email: {
              required:'',
              email:'',
              
          },
          name:{
            required:'',
              
          },
          PhoneInput_market:{
            required:'',
            number:'',
          },
        
          
       

      }
  });



  $('#Marketer-form').on('submit', function(e){
    e.preventDefault();

        var _token = $("input[name='_token']").val();
        var name = $("#name_marketer").val();

        var phone = $("#hiddenPhoneInput").val();

        var email = $("#email_marketer").val();
      
        if (Marketer_form.valid()) {
        $.ajax({
            type: "post",
            url:'{{route("web.ajaxAddMarketer")}}',

            data:{_token:_token,name:name, phone:phone, email:email},

           
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
                $('#link_marketer').val(data.data);
                 
                $("#name_marketer").val('');

                $("input[name='PhoneInput_market']").val('');
        
                 $("#email_marketer").val('');

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

//////////////////////////////////////////end submit marketer form////////////////////////////////////////////



var member_form = $("#Member-form");
member_form.validate({
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
        place:{
            required:true,
        },
        bod:{
            required:true,
        },
        education:{
            required:true,
        },
        job_desc:{
            required:true,
        },
        experince:{
            required:true, 
        },
        salary_limit:{
            required:true,
        },
        type_job:{
            required:true,
        },
        link_work:{
            required:true,
            url:true,

        },
        PhoneInput_member:{
          required:true,
          number:true,
          phoneSA:true,
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
        place:{
            required:'',
        },
        bod:{
            required:'',
        },
        education:{
            required:'',
        },
        job_desc:{
            required:'',
        },
        experince:{
            required:'', 
        },
        salary_limit:{
            required:'',
        },
        type_job:{
            required:'',
        },
        link_work:{
            required:'',
            url:'',
        },
        PhoneInput_member:{
          required:'',
          number:'',
        }

      
        
     

    }
});



$('#Member-form').on('submit', function(e){
  e.preventDefault();

      var _token = $("input[name='_token']").val();
      var name = $("#name").val();
          var phone = $("#phone2").val();
          var email = $("#email").val();
          var place = $("#place").val();
          var bod = $("#bod").val();
          var education = $("#education").val();
          var job_desc = $("#job_desc").val();
          var experince = $("#experince").val();
          var link_work=$('#link_work').val();
          var salary_limit = $("#salary_limit").val();
          var type_job = $("#type_job").val();
          var cv=$('#inputCV').val();
    
      if (member_form.valid()) {
      $.ajax({
          type: "post",
          url:'{{route("web.ajaxAddTeamMmber")}}',


          data:{_token:_token,name:name,phone:phone,email:email,place:place,bod:bod,education:education,
            job_desc:job_desc,experince:experince,education:education,job_desc:job_desc,experince:experince,
            link_work:link_work,salary_limit:salary_limit,type_job:type_job,cv:cv
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
              $('#Member-form')[0].reset();
                            $('#inputCV').val('');

              $('.dz-preview').empty();

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