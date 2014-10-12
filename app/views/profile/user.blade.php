@extends('layouts.master')

@section('title')
    User Profile
@stop

@section('PageContent')
    User Profile<br><br>


    {{--TODO: always escape output data that has been input by a user(why?)--}}
    <img src="{{ gravatar_url(Auth::user()->email, 200) }}" alt="{{ Auth::user()->email; }}"><br>
    {{ e($user->name_first) }} {{ e($user->name_last) }}<br>
    {{ e($user->email) }}<br><br>
    <a href="{{ URL::route('account-change-password') }}">Change password</a>

@stop