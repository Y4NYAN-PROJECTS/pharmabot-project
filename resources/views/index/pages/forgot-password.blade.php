@extends('layouts.index-mainlayout')
@section('title', 'Login Page')

@section('content')
    <div class="container p-5">
        <div class="mb-4">
            <h1>Forgot Password</h1>
            <p>
                Forgot your password? No problem. Just let us know your email address and we will
                email you a password reset link that will allow you to choose a new one.
            </p>
        </div>

        <form action="{{ route('password.email') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-12">
                    <div class="form-group position-relative has-icon-left mb-3">
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address">
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
            </div>

            <button class="btn btn-primary btn-block btn-md shadow-lg mt-4" type="submit">Email Password Reset Link</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        console.log('done')
    </script>
@endsection