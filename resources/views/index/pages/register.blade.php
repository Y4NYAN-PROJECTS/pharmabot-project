@extends('layouts.index-mainlayout')
@section('title', 'Home Page')

@section('content')
    <div class="container px-5">
        <div class="d-flex align-items-center">
            <div class="col pl-0">
                <h1>Register as <strong id="title"></strong>.</h1>
                <p class="mb-0">Kindly complete the details below.</p>
            </div>
        </div><br>

        <form action="{{ route('register') }}" method="post">
            @csrf

            {{-- [ Reusable/s ] --}}
            @include('index.reusables.radio')

            {{-- [ Hidden Input/s ] --}}
            <input type="hidden" name="usertype" value="admin">

            <div class="row">
                <div class="col-12">
                    <div class="form-group position-relative has-icon-left mb-3">
                        <input type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>

                        @error('first_name')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group position-relative has-icon-left mb-3">
                        <input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>

                        @error('last_name')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group position-relative has-icon-left mb-3">
                        <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope-at"></i>
                        </div>

                        @error('email')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- [ Reusable/s ] --}}
                @include('index.reusables.inputs')

                <div class="col-12">
                    <div class="form-group position-relative has-icon-left mb-3">
                        <input type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Retype Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>

                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary btn-md shadow-lg w-100" type="submit">Register</button>
                </div>
            </div>
        </form>

        <div class="text-center mt-3">
            <p class="text-gray-600">
                Already have an account? <a href="{{ route('login') }}" class="font-bold">Login Now!</a>
            </p>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var usertype = document.getElementsByName('user_type');
            var title = document.getElementById('title');

            usertype.forEach(function (radio) {
                if (radio.checked) {
                    title.textContent = radio.value;
                }

                radio.addEventListener('change', function () {
                    if (this.checked) {
                        title.textContent = this.value;
                    }
                });
            });
        });
    </script>
@endsection