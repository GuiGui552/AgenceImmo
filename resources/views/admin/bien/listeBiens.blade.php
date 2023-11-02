@extends('layout.app')

@section('title', 'liste des biens')


@section('content') 

    <div class="px-16">
        <div class="flex justify-between items-center">
            <h1 class="py-8 text-4xl font-bold">Les biens</h1>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"><a href="{{ route('admin.biens.createBien') }}">Ajouter un bien</a></button>
        </div>
    
        <table id="myTable" class="display text-center">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Surface</th>
                    <th>Prix</th>
                    <th>Ville</th>
                    <th>Vendu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biens as $bien)
                    <tr>
                        <td>{{ $bien->titre }}</td>
                        <td>
                            {{ $bien->surface }} m²
                        </td>
                        <td>
                            {{ number_format($bien->prix, 0, ',', ' ') }} €
                        </td>
                        <td>
                            {{ $bien->ville }}
                        </td>
                        <td>
                            @if ($bien->vendu)
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-green-400">Oui</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-red-400">Non</span>
                            @endif
                        </td>
                        <td>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                <a href="{{ route('admin.biens.editBien', ['bien' => $bien->id]) }}">Modifier...</a>
                            </span>
                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                <button data-modal-target="popup-modal-deleteBien{{ $bien->id }}" data-modal-toggle="popup-modal-deleteBien{{ $bien->id }}" type="button">
                                    Supprimer...
                                </button>
                            </span>
                            @include('admin.modals.deleteBien')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
                }
            });
        });
    </script>

@endsection