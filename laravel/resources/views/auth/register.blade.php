@extends('layouts.app')

@section('main')
    <div class="mt-5 mx-auto" style="width: 380px">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    {{--name--}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    {{--email--}}
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    {{--password--}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" type="password" class="form-control"
                               value="{{ old('password') }}">
                        @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    {{--confirm_password--}}
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input id="confirm_password" name="password_confirmation" type="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
