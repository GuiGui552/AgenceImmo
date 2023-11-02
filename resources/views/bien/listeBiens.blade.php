@extends('layout.app')

@section('title', 'Tous les biens')

@section('content')

    <div class="mt-14 px-28 py-5 font-bold text-2xl">
        <h2>Tous les biens:</h2>
    </div>

    <form id="searchForm" class="flex justify-center items-center">
        <input type="number" name="min_surface" id="min_surface" placeholder="Surface minimum" class="mr-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        <input type="number" name="max_piece" id="max_piece" placeholder="Pièces maximum" class="mr-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        <input type="number" name="max_price" id="max_price" placeholder="Prix maximum" class="mr-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        <input type="text" name="keyword" id="keyword" placeholder="Mot clé" class="mr-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
            Rechercher
        </button>
        <a href="{{ route('biens.listeBiens') }}">
            <button id="resButton" type="button" style="display: none" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                Rénitialiser le filtre
            </button>
        </a>
    </form>    

    <div id="results" class="md:grid md:grid-cols-4">
        @include('bien.parcoursBiens')
    </div>

    <script>
        $(document).ready(function() {
            $('#searchForm').submit(function(event) {
                event.preventDefault();
                let maxPrice = $('#max_price').val();
                let minSurface = $('#min_surface').val();
                let maxPiece = $('#max_piece').val();
                let keyWord = $('#keyword').val(); 
                $('#resButton').show();

                $.ajax({
                    type: 'GET',
                    url: '{{ route("biens.search") }}',
                    data: { max_price: maxPrice, min_surface: minSurface, max_piece:maxPiece, keyword:keyWord },
                    success: function(response) {
                        console.log(response);
                        $('#results').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection