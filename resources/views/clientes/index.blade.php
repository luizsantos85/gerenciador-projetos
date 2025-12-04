<x-layout title="Lista de Clientes">
    <div class="flex justify-end my-3">
        <a class="bg-green-500 border rounded-md p-1 px-3 text-white" href="{{ route('clients.create') }}">Criar cliente</a>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Endereço
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Projetos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $cliente->nome }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $cliente->endereco }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $cliente->descricao }}
                    </td>
                    <td class="px-6 py-4">
                        @forelse ($cliente->projects as $projeto)
                        @if ($loop->last)
                        {{ $projeto->nome }}
                        @else
                        {{ $projeto->nome }}{{ ', ' }}
                        @endif
                        @empty
                        Nenhum projeto
                        @endforelse
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('clients.edit', $cliente->id) }}" class="mr-3 text-blue-600 hover:underline">Editar</a>

                        <form action="{{ route('clients.destroy', $cliente->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Are you sure you want to delete this client?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td colspan="4" class="px-6 py-4 text-center text-lg">
                        Nenhum cliente cadastrado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="my-4">
            {{ $clientes->links() }}
        </div>
    </div>
</x-layout>
