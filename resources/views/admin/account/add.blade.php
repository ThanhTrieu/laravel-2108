@extends('admin.layout-admin')

@php
    $showHeading  = false;
    $buttonReport = false;
@endphp

@section('title', 'Add account')
@section('namePageHeading', 'Add acount')

@push('stylesheets')
<link href="{{ asset('admin/css/select2/select2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-primary my-3" href="{{ route('admin.add.account') }}">Add account</a>

        <form action="{{ route('admin.handle.add.account') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>username</label>
                <input type="text" class="form-control form-control-user"
                    name="username">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="password" class="form-control form-control-user"
                    name="password">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" class="form-control form-control-user"
                    name="email">
            </div>
            <div class="form-group">
                <label>phone</label>
                <input type="text" class="form-control form-control-user"
                    name="phone">
            </div>
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" class="form-control form-control-user"
                    name="fullname">
            </div>
            <div class="form-group">
                <label>address</label>
                <input type="text" class="form-control form-control-user"
                    name="address">
            </div>
            <div class="form-group">
                <label>birthday</label>
                <input type="date" class="form-control form-control-user"
                    name="birthday" data-date-format="DD MMMM YYYY">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control form-control-user">
                    <option value="0"> Nu </option>
                    <option value="1"> Nam </option>
                </select>
            </div>
            <div class="form-group">
                <label>Avatar</label>
                <input type="file" class="form-control form-control-user"
                    name="avatar">
            </div>
            <div class="form-group">
                <label>Roles</label>
                <select class="form-control form-control-user js-multiple-roles" name="roles[]" multiple="multiple">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit"> Create Account</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-multiple-roles').select2();
    });
</script>
@endpush