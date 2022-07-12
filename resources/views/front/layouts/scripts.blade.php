

  <script src="{{asset('front/js/jquery.min.js')}}"></script>
  <script src="{{asset('front/js/jqueryValidate.min.js')}}"></script>
  <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('front/js/wow.min.js')}}"></script>
  <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
  {{-- <script src="{{asset('front/js/ticker.js')}}"></script> --}}
  <script src="{{asset('front/js/counter.js')}}"></script> 
  <script src="{{asset('front/js/sweetalert2.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('front/js/custom.sweet.js')}}" type="text/javascript"></script>
   @stack('front_js')
  <script src="{{asset('front/js/function.js')}}"></script> 

  <script>
    var formMailingListSubscriptions = $("#mailingListSubscriptions_form");
  
    
    formMailingListSubscriptions.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            email: {
                required: true,
                email:true,
            },
           
        },
        messages: {
            email: {
                required:'',
                email:'',
                
            },
         
  
        }
    });
  
  
    $('#mailingListSubscriptions_form').on('submit', function(e){
      e.preventDefault();
  
          var _token = $("input[name='_token']").val();
          var email = $("input[name='email']").val();
            
          if (formMailingListSubscriptions.valid()) {
          $.ajax({
              url: "{{route('web.mailingListSubscriptions')}}",
              type: "post",
             
              data:{_token:_token,email:email},
             
              success: function (data) {
                if(isJson(data)){
                    data = jQuery.parseJSON(data)  ;
                   }

                  if(data['status']==true){
  
                    customSweetAlert(
                      'success',
                      '{{__("global.front.operation_accomplished_successfully")}}',
                      '{{__("global.front.your_request_has_been_sent_successfully")}}',
                      function (event) {
                      }
                  );
                  
                   
                     $("input[name='email']").val('');            
                  }else{
                      if(data["data_validator"] !=null){
  
                           var dt = '<ul>';
                          $.each(data["data_validator"], function (key, value) {
                              dt = dt + '<li>' + value + '</li>';
                          })
                          dt =dt+ '</ul>';
  
                      swal({
                          title: "{{__('global.front.error')}}",
                          type: "error",
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
                    title: "{{__('global.front.error')}}",
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

  
  function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
  

    var sliderPartners = $('.sliderPartners');
    sliderPartners.owlCarousel({
    margin:30,
    items: 4,
    smartSpeed: 650,
    loop: true,
    autoplay: true,
    autoplayTimeout: 6000,
    slideTransition: 'linear',
    nav: true,
    dots: false,
    rtl: {{ app()->isLocale('ar')? 'true' : 'false' }},
    mouseDrag: true,
    navText: ["<span><img src='/front/images/svgIcon/arrow.svg'></span>", "<span><img src='/front/images/svgIcon/arrow.svg'></span>"],
    responsive: {
    0: {
    items: 1,
    },
    600: {
    items: 3,
    },
    1000: {
    items: 4,
    },
    1400: {
    items: 4,
    },
    }
    });

    var sliderPost = $('.sliderPost');
    sliderPost.owlCarousel({
    margin:10,
    smartSpeed: 650,
    loop: true,
    autoplay: true,
    autoplayTimeout: 6000,
    slideTransition: 'linear',
    nav: true,
    dots: false,
    rtl: {{ app()->isLocale('ar')? 'true' : 'false' }},
    mouseDrag: true,
    navText: ["<span><img src='/front/images/svgIcon/arrow2.svg'></span>", "<span><img src='/front/images/svgIcon/arrow2.svg'></span>"],
    responsive: {
    0: {
    items: 1,
    },
    600: {
    items: 1,
    },
    1000: {
    items: 1,
    },
    }
    });


    var sliderSingleBlog = $('.sliderSingleBlog');
    sliderSingleBlog.owlCarousel({
    margin:5,
    smartSpeed: 650,
    loop: true,
    autoplay: true,
    autoplayTimeout: 6000,
    slideTransition: 'linear',
    nav: true,
    dots: true,
    rtl: {{ app()->isLocale('ar')? 'true' : 'false' }},
    mouseDrag: true,
    navText: ["<span><img src='/front/images/svgIcon/arrow2.svg'></span>", "<span><img src='/front/images/svgIcon/arrow2.svg'></span>"],
    responsive: {
    0: {
    items: 1,
    },
    600: {
    items: 1,
    },
    1000: {
    items: 1,
    },
    }
    });


    var sliderBlog = $('.sliderBlog');
    sliderBlog.owlCarousel({
    margin:5,
    smartSpeed: 650,
    loop: true,
    autoplay: true,
    autoplayTimeout: 6000,
    slideTransition: 'linear',
    nav: true,
    dots: false,
    rtl: {{ app()->isLocale('ar')? 'true' : 'false' }},
    mouseDrag: true,
    navText: ["<span><img src='/front/images/svgIcon/arrow2.svg'></span>", "<span><img src='/front/images/svgIcon/arrow2.svg'></span>"],
    responsive: {
    0: {
    items: 1,
    },
    600: {
    items: 1,
    },
    1000: {
    items: 1,
    },
    }
    });

    if (document.getElementById('myDropzoneCV')) {
      var myDropzone = new Dropzone("#myDropzoneCV", {
        url: "/file/post", maxFiles: 1,
        acceptedFiles: "application/pdf,.jpeg,.jpg,.png",
        maxFilesize: 2, // MB
        init: function () {
          this.on("success", function (file, responseText) {
            if(responseText.status){
              $('#inputCV').val(responseText.data);
            }else{
              file.previewElement.remove();
              swal({
                title: "@lang('global.front.error')!",
                type: "error",
                text:responseText.data,
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "oK",
                cancelButtonText: "cancel",
                closeOnConfirm: true,
                closeOnCancel: true
            });
            }
  
          });
          this.on("removedfile", function(file, response, formData) {
            file.previewElement.remove();
            removeFile(file);
        });
        }, dictDefaultMessage: "<span class='icon'><img src='/front/images/svgIcon/file.svg'></span><span class='text'>{{__('global.front.attach_file_here')}}</span>"
      });
    }
  
    if (document.getElementById('myDropzoneConsultation')) {
      var myDropzoneConsultation = new Dropzone("#myDropzoneConsultation", {
        url: "/file/post",
        acceptedFiles: "application/pdf,.jpeg,.jpg,.png",
        maxFilesize: 4, // MB
        init: function () {
          this.on("success", function (file, responseText) {
                if(responseText.status){
                  $('#div_consultation_attachments').append('<input type="hidden" id="" name="attachments[]" value="' + responseText.data + '">');
                }else{
                  file.previewElement.remove();
                  swal({
                    title: "@lang('global.front.error')!",
                    type: "error",
                    text:responseText.data,
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "oK",
                    cancelButtonText: "cancel",
                    closeOnConfirm: true,
                    closeOnCancel: true
                });
                }
          });
          this.on("removedfile", function(file, response, formData) {
            file.previewElement.remove();
            removeFile(file);
        });
  
        }, dictDefaultMessage: "<span class='icon'><img src='/front/images/svgIcon/file.svg'></span><span class='text'>{{__('global.front.attach_file_here')}}</span>"
      });
    }
  
    function removeFile(file) {
      var  name = file.name;
      if (window.images !== undefined && window.images.length > 0) {
          window.images.forEach(function (currentValue, index, arr) {
              if (name === currentValue.file_name) {
                  window.images.splice(index, 1);
                  console.log(window.images);
              }
          });
      }
  }

  </script>