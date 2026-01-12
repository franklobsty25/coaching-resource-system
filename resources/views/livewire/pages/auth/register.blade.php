<?php

use App\Models\User;
use App\RoleEnum;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        $user->assignRole(RoleEnum::User->value);

        Auth::login($user);

        $this->redirectRoute('welcome');
    }
}; ?>
<x-slot:title>Register</x-slot>
<div>
    <form class="app-form p-3" wire:submit="register">
        <div class="mb-3 text-center">
            <h3>Create Account</h3>
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                   placeholder="Enter your name" wire:model="name">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                   placeholder="Enter your email" wire:model="email">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                   placeholder="Enter your password" wire:model="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                   placeholder="Confirm your password"
                   id="password_confirmation" required autocomplete="new-password" wire:model="password_confirmation">
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <button type="submit" role="button" class="btn btn-primary w-100">Register</button>
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
            <a href="{{ route('login') }}"
               class="text-secondary text-decoration-underline">{{ __('Already registered?') }}</a>
        </div>
    </form>
    {{--    <form wire:submit="register">--}}
    {{--        <!-- Name -->--}}
    {{--        <div>--}}
    {{--            <x-input-label for="name" :value="__('Name')" />--}}
    {{--            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />--}}
    {{--            <x-input-error :messages="$errors->get('name')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <!-- Email Address -->--}}
    {{--        <div class="mt-4">--}}
    {{--            <x-input-label for="email" :value="__('Email')" />--}}
    {{--            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />--}}
    {{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <!-- Password -->--}}
    {{--        <div class="mt-4">--}}
    {{--            <x-input-label for="password" :value="__('Password')" />--}}

    {{--            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"--}}
    {{--                            type="password"--}}
    {{--                            name="password"--}}
    {{--                            required autocomplete="new-password" />--}}

    {{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <!-- Confirm Password -->--}}
    {{--        <div class="mt-4">--}}
    {{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

    {{--            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"--}}
    {{--                            type="password"--}}
    {{--                            name="password_confirmation" required autocomplete="new-password" />--}}

    {{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <div class="flex items-center justify-end mt-4">--}}
    {{--            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>--}}
    {{--                {{ __('Already registered?') }}--}}
    {{--            </a>--}}

    {{--            <x-primary-button class="ms-4">--}}
    {{--                {{ __('Register') }}--}}
    {{--            </x-primary-button>--}}
    {{--        </div>--}}
    {{--    </form>--}}
</div>
