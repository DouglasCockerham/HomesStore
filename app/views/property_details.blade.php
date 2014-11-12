@extends('layouts.master')

@section('title')MLS Search
@stop

@section('bodyId')search
@stop

@section('PageHeader')

@stop

@section('PageContent')

    <ul style="list-style-type: none">
    @foreach($MLSPropertyFields as $key => $value)
        <li>{{ $key . ':    ' . $value }}</li>
    @endforeach
    </ul>

@stop