@extends('layout.app')

@section('title', 'Connexion')

@section('content')

    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <section class="bg-gray-100">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
                Agence Immobilière Lorem ipsum
            </a>
            <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Connexion
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email"  class="block mb-2 text-sm font-medium text-gray-900 ">Votre email</label>
                            <input type="email" name="email" id="email" value="{{old('email')}}" autofocus autocomplete="username" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 placeholder-gray-400" placeholder="name@company.com">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" required autocomplete="current-password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 placeholder-gray-400">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm font-medium text-blue-600 hover:underline ">Mot de passe oublié ?</a>
                            @endif
                        </div>
    
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Se connecter</button>
                        <p class="text-sm font-light text-gray-500 ">
                            Vous n'avez pas encore de compte ? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline">Créé en un</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection