@extends('layouts\master')
@section('title')Support
@stop

@section('PageContent')
{{ Form::open(['url' => 'support/store']) }}

    <!-- Name Form Input -->
    <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <!-- Email Form Input -->
    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>
    <!-- Body Form Input -->
    <div class="form-group">
        {{ Form::label('body', 'Your message:') }}
        {{ Form::text('body', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>

{{ Form::close() }}
@stop