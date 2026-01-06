<x-layout title="Cadastrar Projeto">
    @include('projects.form', ['action' => route('projects.store'), 'btnText' => 'Cadastrar', 'clients' => $clients])
</x-layout>
