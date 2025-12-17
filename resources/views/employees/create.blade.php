<x-layout title="Cadastrar funcionário">
    @include('employees.form', ['action' => route('employees.store'), 'btnText' => 'Cadastrar'])
</x-layout>
