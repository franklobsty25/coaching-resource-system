<?php

use App\Livewire\Forms\LoginForm;
use App\RoleEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $isValid = Auth::user()->hasRole(RoleEnum::User->value);

        if ($isValid) {
            $this->redirectRoute('welcome');
        }

        $this->redirectIntended(default: route('dashboard', absolute: false));
    }
}; ?>
<x-slot:title>Login</x-slot>
<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form class="app-form" wire:submit="login">
        <div class="mb-3 text-center">
            <h3>Login to your Account</h3>
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control @error('form.email') is-invalid @enderror" id="email"
                   wire:model="form.email">
            @error('form.email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control @error('form.password') is-invalid @enderror" id="password"
                   wire:model="form.password">
            @error('form.password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="formCheck1" wire:model="form.remember">
            <label class="form-check-label" for="formCheck1">remember me</label>
            <a href="{{ route('password.request') }}" class="float-end text-black">Forgot Password</a>
        </div>
        <div>
            <button type="submit" role="button" class="btn btn-primary w-100">Login</button>
        </div>
        <div class="app-divider-v justify-content-center">
            <p>OR</p>
        </div>
        <div class="mb-3">
            <div class="text-center">
                <button type="button" class="btn btn-primary icon-btn b-r-5 m-1"><i
                        class="ti ti-brand-facebook text-white"></i></button>
                <button type="button" class="btn btn-danger icon-btn b-r-5 m-1"><i
                        class="ti ti-brand-google text-white"></i></button>
                <button type="button" class="btn btn-dark icon-btn b-r-5 m-1"><i
                        class="ti ti-brand-github text-white"></i></button>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('register') }}" class="text-secondary text-decoration-underline">Don't have an account,
                Create account.</a>
        </div>
    </form>

    {{--    <form wire:submit="login">--}}
    {{--        <!-- Email Address -->--}}
    {{--        <div>--}}
    {{--            <x-input-label for="email" :value="__('Email')" />--}}
    {{--            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />--}}
    {{--            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <!-- Password -->--}}
    {{--        <div class="mt-4">--}}
    {{--            <x-input-label for="password" :value="__('Password')" />--}}

    {{--            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"--}}
    {{--                            type="password"--}}
    {{--                            name="password"--}}
    {{--                            required autocomplete="current-password" />--}}

    {{--            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <!-- Remember Me -->--}}
    {{--        <div class="block mt-4">--}}
    {{--            <label for="remember" class="inline-flex items-center">--}}
    {{--                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
    {{--                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
    {{--            </label>--}}
    {{--        </div>--}}

    {{--        <div class="flex items-center justify-end mt-4">--}}
    {{--            @if (Route::has('password.request'))--}}
    {{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>--}}
    {{--                    {{ __('Forgot your password?') }}--}}
    {{--                </a>--}}
    {{--            @endif--}}

    {{--            <x-primary-button class="ms-3">--}}
    {{--                {{ __('Log in') }}--}}
    {{--            </x-primary-button>--}}
    {{--        </div>--}}
    {{--    </form>--}}
</div>
