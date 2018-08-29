@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-50">
        <div class="card">
            <div class="card-content">
                <form action="{{route('register')}}" method="POST" role="form">
                    {{ csrf_field() }}
                    <h1 class="title">Join The Community</h1>
                    <div class="field">
                        <lebel for="name"class="label">Name</lebel>
                        <p class="control">
                        <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name" id="name" placeholder="your name" value="{{ old('name') }}" required>
                        </p>
                        @if ($errors->has('email')) 
                            <p class="help is-danger">{{$errors->first('email')}}</p>
                        @endif                        
                    </div>                    
                    <div class="field">
                        <lebel for="email"class="label">Email Address</lebel>
                        <p class="control">
                        <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        </p>
                        @if ($errors->has('email')) 
                            <p class="help is-danger">{{$errors->first('email')}}</p>
                        @endif                        
                    </div>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <lebel for="password"class="label">Password</lebel>
                                <p class="control">
                                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" id="password" placeholder="************" required>
                                </p>
                                @if ($errors->has('password')) 
                                    <p class="help is-danger">{{$errors->first('password')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <lebel for="password"class="label">Confirm Password</lebel>
                                <p class="control">
                                    <input class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" type="password" name="password" id="password" placeholder="************" required>
                                </p>
                                @if ($errors->has('password_confirmation')) 
                                    <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="button is-primary is-outline is-fullwidth m-t-30">Register</button>
                </form>
            </div> <!-- End of .Card-Content -->
        </div> <!--end of .card-->
        <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted">Already have an Account?</a></h5>
    </div>
</div>

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
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
</div> --}}
@endsection
