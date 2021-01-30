@extends('frontend.components.layouts')
@section('title')
    User-Registration
@endsection
@section('content')

<div class="card mt-4">

    <h5 class="card-header text-center">User Registration Form</h5>
    <div class="card-body">

     {{--   @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif--}}

        @if(session('message'))
            <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
        @endif

        <form action="{{ route('user.registration') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="from-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name"  value="{{old('name')}}" placeholder="Enter your name " class="form-control @error('name') is-invalid @enderror">
                @error('name') <span class="text-danger font-italic">{{ $message }}</span> @enderror
            </div>
            <div class="from-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Enter your e-mail address " class="form-control @error('email') is-invalid @enderror">
                @error('email') <span class="text-danger font-italic">{{ $message }}</span> @enderror
            </div>
            <div class="from-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"  placeholder="Enter your password " class="form-control @error('password') is-invalid @enderror">
                @error('password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
            </div>
            <div class="from-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="password_confirmation" placeholder="Enter your confirm password " class="form-control">

            </div>
            <div class="from-group ">
                <label for="photo">Profile Photo</label>
                <input type="file" id="photo" name="photo"  class="form-control @error('photo') is-invalid @enderror">
                @error('photo') <span class="text-danger font-italic">{{ $message }}</span> @enderror
            </div>
            <div class="from-group text-right mt-2">
               <button type="submit" class="btn btn-primary">Registration</button>
            </div>

        </form>

    </div>

</div>


@endsection
