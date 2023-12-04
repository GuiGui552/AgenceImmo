@extends('layout.app')

@section('title', 'Tous les biens')

@section('content')
    <style>
        @media (min-width: 768px) {
            .mdCarousel {
                height: 600px/* 384px */;
            }
        }
    </style>
    <div class="md:grid md:grid-cols-2 mt-11">
        <div class="ml-5 p-2">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg  mdCarousel">
                    <!-- Item -->
                    @if ($bien->images->isNotEmpty())
                        @if (count($bien->images) > 1)
                            @foreach ($bien->images as $image)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ $image->imageUrl() }}" alt="images_biens" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                </div>
                            @endforeach
                        @else
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src= "{{ $bien->images[0]->imageUrl() }}" alt="images_biens" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            </div>
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ $bien->images[0]->imageUrl() }}" alt="images_biens" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            </div>
                        @endif
                    @else
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/image_defaut.jpg') }}" alt="images_biens" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/image_defaut.jpg') }}" alt="images_biens" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        </div>
                    @endif
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    @if ($bien->images->isNotEmpty() && count($bien->images) > 1)
                        @for ($i = 0; $i < count($bien->images); $i++)
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{$i+1}}" data-carousel-slide-to="{{$i}}"></button>
                        @endfor
                    @else
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    @endif
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
            <h1 class="font-bold text-lg mt-5">Description de l'annonce:</h1>
            <p class="mt-3 text-justify">{{ $bien->description }}</p>
        </div>

        
        <div class="flex flex-col items-center">
            <h1 class="text-3xl font-bold">
                {{ $bien->titre }}
            </h1>
            <h2 class="mt-2 text-2xl">
                {{ $bien->pieces }} pièces - {{ $bien->surface }} m²
            </h2>
            <h1 class="text-blue-700 font-bold text-6xl mt-10">
                {{ number_format($bien->prix, 0, ',', ' ') }} €
            </h1>
            <hr class="text-gray-500 border my-16 w-1/2">
            <div class="grid">
                <h1 class="mb-2 text-lg font-bold">Intéressé par ce bien ?</h1>
                
                <form action="{{ route('biens.contact', $bien) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2">
                        <div class="mr-2 mb-2">
                            <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
                            <input type="text" id="prenom" name="prenom" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Prénom</label>
                            <input type="text" id="nom" name="nom" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="mr-2">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Numéro de téléphone</label>
                            <input type="text" id="phone" name="phone" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="mb-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
                            <input type="text" id="email" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Votre message</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Votre message ici..."></textarea>
                
                    <button type="button" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Envoyer</button>
                </form>

            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-8 my-8 ml-8">
        <div>
            <h1 class="font-bold text-2xl mb-5">Caractéristiques</h1>
            
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Caractéristique
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Valeur
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Surface
                            </th>
                            <td class="px-6 py-4">
                                {{ $bien->surface }} m²
                            </td>
                        </tr>

                        <tr class="bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Pièces
                            </th>
                            <td class="px-6 py-4">
                                {{ $bien->pieces }}
                            </td>
                        </tr>

                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Chambres
                            </th>
                            <td class="px-6 py-4">
                                {{ $bien->chambres }}
                            </td>
                        </tr>

                        <tr class="bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Etages
                            </th>
                            <td class="px-6 py-4">
                                {{ $bien->etages }}
                            </td>
                        </tr>

                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Pièces
                            </th>
                            <td class="px-6 py-4">
                                {{ $bien->pieces }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="mr-8">
            <h1 class="font-bold text-2xl mb-5">Options</h1>
            <ul class="text-center border border-gray-200">
                @foreach ($bien->option as $opt)
                    <li class="border py-2">{{ $opt->nom }}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection