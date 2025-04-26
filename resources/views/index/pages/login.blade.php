@extends('layouts.index-mainlayout')
@section('title', 'Login Page')

@section('content')
    <div class="container p-5">
        <div class="mb-4">
            <h1>Log in as <strong id="title"></strong>.</h1>
            <p>Log in with your data that you entered during registration.</p>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            {{-- [ Reusable/s ] --}}
            @include('index.reusables.radio')

            {{-- [ Hidden Input/s ] --}}
            <input type="hidden" name="usertype" value="admin">

            <div class="row">
                {{-- [ Reusable/s ] --}}
                @include('index.reusables.inputs')

                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-gray-600" for="rememberme">
                                Keep me logged in
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>
                        @endif
                    </div>

                    <button class="btn btn-primary btn-block btn-md shadow-lg mt-4">Log in</button>
                </div>
            </div>
        </form>

        <div class="text-center mt-3">
            <p class="text-gray-600">
                Don't have an account? <a href="{{ route('register') }}" class="font-bold">Register Now!</a>
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