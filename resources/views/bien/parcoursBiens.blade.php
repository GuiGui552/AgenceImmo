
@foreach ($biens as $bien)
    <div class="mx-3 p-2 shadow-md">
        <div class="relative w-full">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item -->
                @if ($bien->images->isNotEmpty())
                    <div class="duration-700 ease-in-out">
                        <img src="{{ $bien->images[0]->imageUrl() }}" alt="images_biens" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    </div>
                @else
                    <div class="duration-700 ease-in-out">
                        <img src="{{ asset('images/image_defaut.jpg') }}" alt="images_biens" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    </div>
                @endif
            </div>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('biens.show', ['bien' => $bien->id]) }}" class="text-blue-500 underline font-bold">{{$bien->titre}}</a>
            <p><i class="fa-solid fa-camera"></i>&nbsp;{{ count($bien->images) }}</p>
        </div>
        <p>{{ $bien->surface }} m² - {{ $bien->ville }} ({{ $bien->code_postal }})</p>
        <p class="text-blue-700 font-bold text-3xl">{{ number_format($bien->prix, 0, ',', ' ') }} €</p>
    </div>
@endforeach