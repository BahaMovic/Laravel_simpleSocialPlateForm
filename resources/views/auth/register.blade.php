@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Male</label>

                            <div class="col-md-6">
                                <input id="gender" type="radio" value="1" class="form-control" name="gender" >

                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Female</label>

                            <div class="col-md-6">
                                <input id="gender" type="radio" value="0" class="form-control" name="gender" >

                               
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="sport" class="col-md-4 control-label">Sport </label>

                            <div class="col-md-6">
                                <input type="hidden" value="0" name="sport">
                                <input id="sport" type="checkbox" value="1" class="form-control" name="sport" >
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="art" class="col-md-4 control-label">Art </label>

                            <div class="col-md-6">
                                <input type="hidden" value="0" name="art">
                                <input id="art" type="checkbox" value="1" class="form-control" name="art" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="education" class="col-md-4 control-label">Education </label>

                            <div class="col-md-6">
                                <input type="hidden" value="0" name="education">
                                <input id="education" type="checkbox" value="1" class="form-control" name="education" >
                            </div>
                        </div>


                     

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
