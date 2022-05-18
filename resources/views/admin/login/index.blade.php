{{-- ke thua layout-login blade --}}
@extends('admin.layout-login')
{{-- truyen bien sang view cha --}}
@section('title', 'admin')

@push('stylesheets')
<link href="{{ asset('admin/css/login.css') }}" rel="stylesheet">
@endpush


{{-- day view con sang view cha --}}
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    </div>
                    {{-- show error message--}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- thong bao loi ko ton tai tai khoan --}}
                    @if(session('invalidLogin'))
                        <div class="alert alert-danger">{{ session('invalidLogin') }}</div>
                    @endif

                    <form class="user" method="post" action="{{ route('admin.handle.login') }}" role="form">
                        {{-- render token trong input hidden --}}
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                id="exampleInputEmail" name="emailUser" aria-describedby="emailHelp"
                                placeholder="Enter Email Address...">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Password" name="passwordUser">
                        </div>
                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                    Me</label>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                        {{-- <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                        </a> --}}
                    </form>
                    {{-- <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="register.html">Create an Account!</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('admin/js/login.js') }}"></script>
@endpush