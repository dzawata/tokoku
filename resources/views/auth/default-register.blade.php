@extends('layouts.app')

@section('title', 'Register')

@section('content')

        <div class="page-content page-auth mt-5" id="register">
            <div class="section-store-auth" data-aos="fade-up">
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                    <h2>
                        Memulai untuk jual beli <br />
                        dengan cara terbaru
                    </h2>
                    <form class="mt-3">
                        <div class="form-group">
                        <label>Full Name</label>
                        <input
                            type="text"
                            class="form-control is-valid"
                            aria-describedby="nameHelp"
                            v-model="name"
                            autofocus
                        />
                        </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input
                            type="email"
                            class="form-control is-invalid"
                            aria-describedby="emailHelp"
                            v-model="email"
                        />
                        </div>
                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" />
                        </div>
                        <div class="form-group">
                        <label>Store</label>
                        <p class="text-muted">
                            Apakah anda juga ingin membuka toko?
                        </p>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                            class="custom-control-input"
                            type="radio"
                            name="is_store_open"
                            id="openStoreTrue"
                            v-model="is_store_open"
                            :value="true"
                            />
                            <label class="custom-control-label" for="openStoreTrue"
                            >Iya, boleh</label
                            >
                        </div>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                            class="custom-control-input"
                            type="radio"
                            name="is_store_open"
                            id="openStoreFalse"
                            v-model="is_store_open"
                            :value="false"
                            />
                            <label
                            makasih
                            class="custom-control-label"
                            for="openStoreFalse"
                            >Enggak, makasih</label
                            >
                        </div>
                        </div>
                        <div class="form-group" v-if="is_store_open">
                        <label>Nama Toko</label>
                        <input
                            type="text"
                            class="form-control"
                            aria-describedby="storeHelp"
                        />
                        </div>
                        <div class="form-group" v-if="is_store_open">
                        <label>Kategori</label>
                        <select name="category" class="form-control">
                            <option value="" disabled>Select Category</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4">
                        Sign Up Now
                        </button>
                        <button type="submit" class="btn btn-signup btn-block mt-2">
                        Back to Sign In
                        </button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

@endsection