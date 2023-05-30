@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 text-center">
    <div class="text-2xl my-5">{{ __('Verify Your Email Address') }}</div>
    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
    @endif

    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
    <p class="mt-3">{{ __('If you did not receive the email') }}:</p>
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="mt-10 max-w-sm bg-green-500 w-full hover:bg-green-600 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">{{ __('click here to request another') }}</button>.
    </form>
</div>



{{-- 
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
--}}

@endsection
