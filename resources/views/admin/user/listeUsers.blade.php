@extends('layout.app')

@section('title', 'listes des utilisateurs')


@section('content')

    <div class="px-16">
        <div class="flex justify-between items-center">
            <h1 class="py-8 text-4xl font-bold">Les utilisateurs</h1>
        </div>

        <table id="myTable" class="display text-center">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle(s)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <img class="w-8 h-8 rounded-full imageRound" src="{{ $user->avatarUrl() }}" alt="user photo">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->nom }}
                            @endforeach
                        </td>
                        <td>
                            {{-- <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                <a href="#">Modifier le rôle...</a>
                            </span> --}}
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded hover:text-orange-100 hover:bg-orange-800">
                                <button data-modal-target="popup-modal-editRoleUser{{ $user->id }}" data-modal-toggle="popup-modal-editRoleUser{{ $user->id }}" type="button">
                                    Modifier le role...
                                </button>
                            </span>
                            @include('admin.modals.editRoleUser')
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