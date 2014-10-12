@extends('layouts.master')

@section('title')
    Sign In
@stop

@section('PageContent')
    {{ Form::open(array('route' => 'account-sign-in-post', 'method' => 'post')) }}
        <!-- Email Form Input -->
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
            @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <!-- Password Form Input -->
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
            @if($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <!-- Remember Form Input -->
        <div class="form-group">
            {{ Form::label('remember', 'Remember me') }}
            {{ Form::checkbox('remember', null, ['class' => 'form-control']) }}
        </div>
        <!-- Submit button -->
        <div class="form-group">
            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        </div>
    {{ Form::close() }}

    <a href="{{ URL::route('account-forgot-password') }}">Forgot password</a><br><br>
    <a href="{{ URL::route('account-create') }}">Create Account</a>

@stop