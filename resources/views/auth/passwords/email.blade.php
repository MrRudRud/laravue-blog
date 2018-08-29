@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="notification is-success">
        {{ session('status') }}
    </div>
@endif

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-50">
        <div class="card">
            <div class="card-content">
                <form action="{{route('password.email')}}" method="POST" role="form">
                    {{ csrf_field() }}
                    <h1 class="title">Forgot Password?</h1>
                    <div class="field">
                        <lebel for="email"class="label">Email Address</lebel>
                        <p class="control">
                        <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        </p>
                        @if ($errors->has('email')) 
                            <p class="help is-danger">{{$errors->first('email')}}</p>
                        @endif                        
                    </div>
                    <button class="button is-primary is-outline is-fullwidth m-t-30">Get Link Reset</button>
                </form>
            </div> <!-- End of .Card-Content -->
        </div> <!--end of .card-->
        <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted"> <i class="fa fa-caret-left m-r-10"></i> Bact to Login</a></h5>
    </div>
</div>


{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
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
