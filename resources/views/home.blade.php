@extends('layout.app')

@section('title', 'Accueil')

@section('content')

    <div class="bg-slate-200 text-center py-4">
        <h1 class="text-4xl font-bold">Agence Immobilière Lorem ipsum</h1>
        <p class="mt-3 mx-24">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis accusantium aliquam sit dignissimos quasi quod iste sed veritatis, laudantium laboriosam nihil neque magni, repudiandae quam cupiditate fugit culpa asperiores necessitatibus?</p>
    </div>

    <div class="mt-14 px-28 py-5 font-bold text-2xl">
        <h2>Les derniers biens ajoutés:</h2>
    </div>

    <div class="md:grid md:grid-cols-4">
        @foreach ($biens as $bien)
            <div class="mx-3 p-2 shadow-md">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
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
                                    <img src="{{ $bien->images[0]->imageUrl() }}" alt="images_biens" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
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

                <div class="flex justify-between items-center">
                    <a href="{{ route('biens.show', ['bien' => $bien->id]) }}" class="text-blue-500 underline font-bold">{{$bien->titre}}</a>
                    <p><i class="fa-solid fa-camera"></i>&nbsp;{{ count($bien->images) }}</p>
                </div>
                <p>{{ $bien->surface }} m² - {{ $bien->ville }} ({{ $bien->code_postal }})</p>
                <p class="text-blue-700 font-bold text-3xl">{{ number_format($bien->prix, 0, ',', ' ') }} €</p>
            </div>
        @endforeach
    </div>
    
@endsection