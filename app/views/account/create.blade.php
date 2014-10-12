@extends('layouts.master')

@section('title')
    Account Create
@stop

@section('PageContent')

{{ Form::open(array('route' => 'account-create-post', 'method' => 'post')) }}

    <!-- Firstname Form Input -->
    <div class="form-group">
        {{ Form::label('firstname', 'First name:') }}
        {{ Form::text('firstname', null, ['class' => 'form-control']) }}
        @if($errors->has('firstname'))
            <div class="error">{{ $errors->first('firstname') }}</div>
        @endif
    </div>
    <!-- Lastname Form Input -->
    <div class="form-group">
        {{ Form::label('lastname', 'Last name:') }}
        {{ Form::text('lastname', null, ['class' => 'form-control']) }}
        @if($errors->has('lastname'))
            <div class="error">{{ $errors->first('lastname') }}</div>
        @endif
    </div>
    <!-- Email Form Input -->
    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'This will be your login ID']) }}
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
    <!-- Verifypassword Form Input -->
    <div class="form-group">
        {{ Form::label('verifyPassword', 'Verify Password:') }}
        {{ Form::password('verifyPassword', ['class' => 'form-control']) }}
        @if($errors->has('verifyPassword'))
            <div class="error">{{ $errors->first('verifyPassword') }}</div>
        @endif

    </div>
    <div class="form-group">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary', 'value' => 'Create Account']) }}
    </div>

{{ Form::close() }}
@stop