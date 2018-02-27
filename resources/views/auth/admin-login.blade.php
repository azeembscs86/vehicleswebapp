@extends('layouts.app')

@section('content')

<div class="login-logo">
    <b>Admin</b>login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      @if ($errors->has('email'))
      <div class="bs-example">
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> Invalid Email Address/Password.
    </div>
</div>
      @endif
     <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
  {{ csrf_field() }}
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
           @if ($errors->has('password'))
                                     <div class="alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


@endsection


