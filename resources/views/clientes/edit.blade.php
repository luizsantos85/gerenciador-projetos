<x-layout title="Editar Cliente">
    @include('clientes.form', ['action' => route('clients.update',$client->id), 'btnText' => 'Atualizar', 'client' => $client])
</x-layout>
