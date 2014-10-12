@extends('layouts.master')

@section('title')
    Forgot Password
@stop

@section('PageContent')

    {{ Form::open(['route' => 'account-forgot-password-post', 'method' => 'post']) }}
        <!-- Email Form Input -->
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
            @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="form-group">
            {{ Form::submit('Recover', ['class' => 'btn btn-primary']) }}
        </div>
    {{ Form::close() }}

@stop