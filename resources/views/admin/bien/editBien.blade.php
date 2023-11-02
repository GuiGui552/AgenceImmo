@extends('layout.app')

@section('title', 'Modification d\'un bien')


@section('content') 

    <div class="px-16">
        <h1 class="py-8 text-4xl font-bold">Modification d'un bien</h1>
        @include('admin.form.formBien')
    </div>


@endsection