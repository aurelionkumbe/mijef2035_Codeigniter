@extends('layouts.app_auth')

@section('content')
<div class="container">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p>
                <img src="../images/logo.png" alt="" style="width: auto"/>
                <img class="pull-right rotate-y" src="../images/logo.png" alt="" style="width: auto"/>
            </p>
            <div class="panel panel-default">
                <div class="panel-heading w3-theme">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/dashboard/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn w3-theme">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>
                                @if(0)
                                <a class="btn btn-link w3-text-brown" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                              @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
