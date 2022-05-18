@extends('admin.layout-admin')

@php
    $showHeading  = true;
    $buttonReport = false;
@endphp

@section('title', 'Role')
@section('namePageHeading', 'Roles')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('admin.add.role') }}">Add role</a>
        </div>
    </div>
@endsection