

@extends('layouts.web')


@section('content')

    <div class="offset-md-3 col-md-6">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Join us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf



                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} b2" id="recipient-name" placeholder="* Name" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-12 form-group">
                                <input id="email" placeholder="* E-mail" type="email" class="b2 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif


                            </div>
                            <div class="col-md-12 form-group">
                                <input id="password" placeholder="* Password" type="password" class="b2 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">

                                <input type="password" class="form-control b2" id="recipient-name" name="password_confirmation"  placeholder="* confirm password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="col-md-12 form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">College*</label>
                                    <select class="form-control b2" id="exampleFormControlSelect1" name="colloge">

                                        <option value = "1">Faculty of Education</option>
                                        <option value = "2">Faculty of medicine	</option>
                                        <option value = "3">Faculty of Computer Science and Information Technology	</option>


                                        <option value = "4">College of Business Administration	</option>
                                        <option value = "5">Preparatory Year	</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary full-regi">Join us</button>
                </div>
                </form>
            </div>
        </div>
    </div>




@endsection





