@extends('layout.app')

@section('title', 'Mot de passe oublié')

@section('content') 

    <section class="bg-gray-100">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
                Agence Immobilière Lorem ipsum
            </a>
            <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Rénitialisation du mot de passe
                    </h1>
                    <div class="mb-4 text-sm text-gray-600">
                        <p>Mot de passe oublié ? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau.</p>
                    </div>
                    <form class="space-y-4 md:space-y-6" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email"  class="block mb-2 text-sm font-medium text-gray-900 ">Votre email</label>
                            <input type="email" name="email" id="email" value="{{old('email')}}" autofocus autocomplete="username" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 placeholder-gray-400" placeholder="name@company.com">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Envoyer le lien de rénitialisation</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection