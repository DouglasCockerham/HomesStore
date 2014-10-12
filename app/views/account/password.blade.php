@extends('layouts.master')

@section('title')
    Change Password
@stop

@section('PageContent')
    {{ Form::open(array('route' => 'account-change-password-post', 'method' => 'post')) }}

        <!-- Oldpassword Form Input -->
        <div class="form-group">
            {{ Form::label('oldPassword', 'Old Password:') }}
            {{ Form::password('oldPassword', ['class' => 'form-control']) }}
            @if($errors->has('oldPassword'))
                <div class="error">{{ $errors->first('oldPassword') }}</div>
            @endif
        </div>
        <!-- Newpassword Form Input -->
        <div class="form-group">
            {{ Form::label('newPassword', 'New Password:') }}
            {{ Form::password('newPassword', ['class' => 'form-control']) }}
            @if($errors->has('newPassword'))
                <div class="error">{{ $errors->first('newPassword') }}</div>
            @endif
        </div>
        <!-- VerifyPassword Form Input -->
        <div class="form-group">
            {{ Form::label('verifyPassword', 'Verify New Password:') }}
            {{ Form::password('verifyPassword', ['class' => 'form-control']) }}
            @if($errors->has('verifyPassword'))
                <div class="error">{{ $errors->first('verifyPassword') }}</div>
            @endif
        </div>
        <div class="form-group">
            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        </div>
    {{ Form::close() }}
@stop
