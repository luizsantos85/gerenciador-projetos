<x-layout title="Cadastrar Cliente">
    @include('clientes.form', ['action' => route('clients.store'), 'buttonText' => 'Cadastrar'])
</x-layout>
