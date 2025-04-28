@extends('layouts.index-mainlayout')
@section('title', 'Login Page')

@section('content')
    <div class="container p-5">
        <div class="mb-4">
            <h1>Email Verification</h1>
            <p>
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <small class="text-success">
                A new verification link has been sent to the email address you provided during registration.
            </small>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <button class="btn btn-primary" type="submit">Resend Verification Email</button>
            </form>

            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn btn-sm btn-outline-secondary" type="submit">Logout</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        console.log('done')
    </script>
@endsection