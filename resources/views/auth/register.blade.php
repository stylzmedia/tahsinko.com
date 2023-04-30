@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => 'Register - ' . ($settings_g['title'] ?? env('APP_NAME')),
    ])
    <style>
        .nav_transparent {
            top: 0 !important;
            background: #617e7985;
        }

        ul.npnls.top_nav {
            color: black;
        }

        ul.npnls.top_nav li {
            list-style: none;
            display: inline-block;
        }

    </style>
@endsection

@section('master')
    <!-- Breadcrumb -->
    <nav class="flex py-5 px-5 text-gray-700 bg-sky-400 border border-gray-200 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <div class="container">
            <h2 class="text-white text-2xl font-semibold mb-5">Register</h2>
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('homepage') }}"
                        class="inline-flex items-center text-sm font-medium text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="#"
                            class="ml-1 text-sm font-medium text-white hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Register</a>
                    </div>
                </li>
            </ol>
        </div>
    </nav>
    <!-- End Breadcrumb -->

    <section class=" bg-gray-100 py-20">
        <div class="container">
            <div class="flex items-center p-4 lg:justify-center">
                <div
                    class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md">
                    <div
                        class="p-4 py-6 text-white bg-sky-400 md:w-80 md:flex-shrink-0 md:flex md:flex-col md:items-center md:justify-evenly">
                        @if ($settings_g['logo'])
                            <div class="my-3 flex justify-center items-center bg-white">
                                <a href="{{ route('homepage') }}"><img class=" w-48"
                                        src="{{ $settings_g['logo'] ?? '' }}" alt=""></a>
                            </div>
                        @else
                            <div class="my-3 text-4xl font-bold tracking-wider text-center">
                                <a href="{{ route('homepage') }}">{{$settings_g['title'] ?? env('APP_NAME')}}<br>{{ ($settings_g['slogan'] ?? '') }}</a>
                            </div>
                        @endif
                        <p class="mt-6 font-normal text-center text-gray-300 md:mt-0">

                        </p>
                        <p class="flex flex-col items-center justify-center mt-10 text-center">
                            <span>Already have account?</span>
                            <a href="{{ route('login') }}">Login now.</a>
                        </p>
                        <p class="mt-6 text-sm text-center text-gray-300">

                        </p>
                    </div>
                    <div class="p-5 bg-white md:flex-1">
                        <h3 class="my-4 text-2xl font-semibold text-gray-700">Register</h3>
                        <form method="POST" action="{{ route('register') }}" class="flex flex-col space-y-5">
                            @csrf
                            <div class="flex flex-col space-y-1">
                                <label for="name" class="text-sm font-semibold text-gray-500">Full Name</label>
                                <input type="text" id="name" autofocus
                                    class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-sky-200 @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="email" />
                                @error('name')
                                    <span class="invalid-feedback text-base text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex flex-col space-y-1">
                                <label for="email" class="text-sm font-semibold text-gray-500">Email address</label>
                                <input type="email" id="email" autofocus
                                    class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-sky-200 @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" />
                                @error('email')
                                    <span class="invalid-feedback text-base text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex flex-col space-y-1">
                                <div class="flex items-center justify-between">
                                    <label for="password" class="text-sm font-semibold text-gray-500">Password</label>
                                </div>
                                <input type="password" id="password"
                                    class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-sky-200 @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password" />

                                @error('password')
                                    <span class="invalid-feedback text-base text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="flex flex-col space-y-1">
                                <div class="flex items-center justify-between">
                                    <label for="password-confirm" class="text-sm font-semibold text-gray-500">Confirm
                                        Password</label>
                                </div>
                                <input type="password" id="password-confirm"
                                    class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-sky-200 @error('password') is-invalid @enderror"
                                    name="password_confirmation" required autocomplete="new-password" />

                            </div>

                            <div>
                                <button type="submit"
                                    class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-sky-400 rounded-md shadow hover:bg-sky-500 focus:outline-none focus:ring-sky-200 focus:ring-4">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
