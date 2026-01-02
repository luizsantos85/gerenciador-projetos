<x-layout title="Lista de funcionários">
    <div class="flex justify-end my-3">
        <a class="bg-green-500 border rounded-md p-1 px-3 text-white" href="{{route('employees.create')}}">Criar funcionário</a>
    </div>

    <div class="">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-3 py-3">
                        CPF
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Endereço
                    </th>
                    <th scope="col" class="px-3 py-3 w-36 sticky right-0 bg-gray-50 dark:bg-gray-700 z-20">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $employee->nome }}
                        @if($employee->data_demissao)
                            <span class="text-gray-500">(Demitido)</span>
                        @endif
                    </th>
                    <td class="px-3 py-4">
                        {{ $employee->cpf }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $employee->address?->formattedAddress ?? 'Endereço não informado' }}
                    </td>
                    <td class="px-3 py-4 w-36 sticky right-0 bg-white dark:bg-gray-800 z-10 whitespace-nowrap">
                        @php
                            $isFired = !is_null($employee->data_demissao);
                            $action = $isFired ? 'employees.reissue' : 'employees.fire';
                            $text = $isFired ? 'Reativar' : 'Demitir';
                            $msg = $isFired ? 'Confirma reativação deste funcionário?' : 'Confirma demissão deste funcionário?';
                        @endphp

                        <a href="{{ $isFired ? '#' : route('employees.edit', $employee->id) }}" class="mr-2 {{ $isFired ? 'bg-gray-500' : 'bg-blue-500' }} text-white p-1 border rounded-md hover:bg-blue-700" >Editar</a>

                        <form action="{{ route($action, $employee->id) }}" method="POST" class="inline-block mr-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-orange-500 text-white p-1 border rounded-md hover:bg-orange-700"
                                onclick="return confirm({{ json_encode($msg) }})">
                                {{ $text }}
                            </button>
                        </form>

                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline-block mr-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-1 border rounded-md hover:bg-red-700"
                                onclick="return confirm('Are you sure you want to delete this employee?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center">
                        Nenhum funcionário encontrado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="my-4">
            {{ $employees->links() }}
        </div>
    </div>

</x-layout>

