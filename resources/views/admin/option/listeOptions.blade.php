@extends('layout.app')

@section('title', 'listes des options')


@section('content') 

    <div class="px-16">
        <div class="flex justify-between items-center">
            <h1 class="py-8 text-4xl font-bold">Les options</h1>
            <button type="button" data-modal-target="popup-modal-createOption" data-modal-toggle="popup-modal-createOption" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Ajouter une option</button>
            @include('admin.modals.createUpdateOption')
        </div>
    
        <table id="myTable" class="display text-center">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($options as $option)
                    <tr>
                        <td>{{ $option->nom }}</td>
                        <td>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded hover:bg-blue-800 hover:text-blue-100">
                                <button data-modal-target="popup-modal-updateOption{{ $option->id }}" data-modal-toggle="popup-modal-updateOption{{ $option->id }}" type="button">
                                    Modifier...
                                </button>
                            </span>
                            @include('admin.modals.createUpdateOption')
                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded hover:bg-red-800 hover:text-red-100">
                                <button data-modal-target="popup-modal-deleteOption{{ $option->id }}" data-modal-toggle="popup-modal-deleteOption{{ $option->id }}" type="button">
                                    Supprimer...
                                </button>
                            </span>
                            @include('admin.modals.deleteOption')
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