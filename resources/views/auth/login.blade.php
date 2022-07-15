@extends('layouts.auth')

@section('content')

    <div  style="margin-top: -100px; margin-bottom: 20px">
      <img src="{{image_url($site_setting->logo)}}" style="height: 160px; margin:auto; display: block">
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">تسجيل الدخول</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('login') }}" id="formCreate">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}" >

                        <div class="form-group">
                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">
                                <input type="text"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}" placeholder=" البريد اللكتروني">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password" placeholder="كلمة المرور">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ route('auth.password.reset') }}">نسيت كلمة المرور</a>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label>
                                    <input type="checkbox"
                                           name="remember"> تذكرني
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"
                                        class="btn btn-primary"
                                        style="margin-right: 15px;">
                                    @lang('quickadmin.qa_login')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

    <script>
        $.validator.setDefaults({
            errorElement: "span",
            errorClass: "help-block",
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $("#formCreate").validate({
            rules: {

                username:{
                    required:true ,
                },
                password:{
                    required:true ,
                }



            },
            messages: {

                'username': {
                    required: "هذا الحقل مطلوب",
                },
                'password': {
                    required: "هذا الحقل مطلوب",
                },

            }
        });

    </script>
@endsection





