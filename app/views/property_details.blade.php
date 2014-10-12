@extends('layouts.master')

@section('title')MLS Search
@stop

@section('bodyId')search
@stop

@section('PageContent')


{{--{{ var_dump($MLSProperty) }}--}}

    <ul>
    @foreach($MLSPropertyField as $key => $value)
        <li>{{ $key . ':    ' . $value }}</li>
    @endforeach
    </ul>

@stop