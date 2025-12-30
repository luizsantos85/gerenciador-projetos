<x-layout title="Editar funcionário">
    @include('employees.form', ['action' => route('employees.update', $employee), 'btnText' => 'Salvar', 'employee' => $employee, 'states' => $states])
</x-layout>
