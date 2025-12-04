<x-layout title="Cadastrar Cliente">
    @include('clientes.form', ['action' => route('clients.store'), 'btnText' => 'Cadastrar'])
</x-layout>
