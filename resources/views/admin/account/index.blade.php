@extends('admin.layout-admin')

@php
    $showHeading  = false;
    $buttonReport = false;
@endphp

@section('title', 'Account')
@section('namePageHeading', 'Account')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary my-3" href="{{ route('admin.add.account') }}">Add account</a>
        </div>
    </div>
@endsection