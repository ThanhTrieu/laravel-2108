{{-- ke thua layout-login blade --}}
@extends('admin.layout-login')
{{-- truyen bien sang view cha --}}
@section('title', 'switch role user')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Choose role</h1>
                        @if(session('errorSwitchRole'))
                            <p class="text-danger">{{ session('errorSwitchRole') }}</p>
                        @endif
                        @foreach($roles as $role)
                            <div class="row border-bottom">
                                <div class="col-sm-12 col-md-10">
                                    <p class="text-left p-b-0">{{ $role->name }}</p>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <form action="{{ route('admin.handle.switch.role',['id'=>$role->id]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Go</button>
                                    </form>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection