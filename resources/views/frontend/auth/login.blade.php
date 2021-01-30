@extends('frontend.components.layouts')
@section('title')
    User-Login
@endsection
@section('content')

    <div class="card mt-4">

        <h5 class="card-header text-center">User Login Form</h5>
        <div class="card-body">



            @if(session('message'))
                <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
            @endif
            <form action="{{ route('user.login') }}" method="POST" >
                @csrf


                <div class="from-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your e-mail address " class="form-control @error('email') is-invalid @enderror">
                    @error('email') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                </div>

                <div class="from-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"  placeholder="Enter your password " class="form-control @error('password') is-invalid @enderror">
                    @error('password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                </div>


                <div class="from-group text-right mt-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

            </form>

        </div>

    </div>


@endsection
