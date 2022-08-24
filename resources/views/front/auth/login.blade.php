@extends('back.layouts.auth')

@section('head')
    @include('meta::manager', [
        'title' => 'Login - ' . ($settings_g['title'] ?? env('APP_NAME')),
    ])
    <style>
form{
	padding-top: 10px;
	font-size: 14px;
	margin-top: 30px;
}

.card-title{ font-weight:300; }

.btn{
	font-size: 14px;
	margin-top:20px;
}

.login-form{
    width: 40%;
    margin-top: 50px;
}

.sign-up{
	text-align:center;
	padding:20px 0 0;
}

.alert{
	margin-bottom:-30px;
	font-size: 13px;
	margin-top:20px;
}

/* Mobile Screen */
@media (max-width: 575px) {
    .login-form{
        width: 90%;
        margin-top: 175px;
    }
  }

    </style>
@endsection

@section('master')
<div class="container">
    <div class="row justify-content-center">
        <div class="card login-form mt-10">
            <div class="card-body justify-content-center">
                <h3 class="card-title text-center">Admin Panel Login</h3>
                <div class="card-text">
                    <!--
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                    <form method="POST" action="{{ route('login') }}" class="">
                        @csrf
                        <!-- to error: add class "has-danger" -->
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control form-control-sm" id="email" autofocus name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback text-base text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <a href="{{ route('password.request') }}" style="float:right;font-size:12px;">Forgot password?</a>
                            <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback text-base text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
