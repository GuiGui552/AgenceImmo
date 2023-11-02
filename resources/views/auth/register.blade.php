@extends('layout.app')

@section('title', 'Connexion')

@section('content') 

    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                Agence Immobilière Lorem ipsum
            </a>
            <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Créer un compte
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{route('register')}}" method="POST">
                        @csrf
                        <!-- Name -->
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Votre nom</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" required autofocus autocomplete="name" placeholder="John Doe" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 placeholder-gray-400">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Votre email</label>
                            <input type="email" name="email" id="email" placeholder="name@company.com" required value="{{old('email')}}" autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 placeholder-gray-400">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Votre mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" required autocomplete="new-password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 placeholder-gray-400">
                            @error('password')
                                {{$message}}
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirmer votre mot de passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" required autocomplete="new-password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 placeholder-gray-400">
                            @error('password_confirmation')
                                {{$message}}
                            @enderror
                        </div>


                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Créer un compte</button>
                        <p class="text-sm font-light text-gray-500">
                            Vous avez déjà un compte ? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Connectez-vous ici</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection