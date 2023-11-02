@extends('layout.app')

@section('title', 'Ajout d\'un bien')


@section('content') 

    <div class="px-16">
        <h1 class="py-8 text-4xl font-bold">Ajout d'un bien</h1>
        @include('admin.form.formBien')
    </div>


@endsection