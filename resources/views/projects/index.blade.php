@php
    use App\Helpers\Functions;
@endphp

<x-layout title="Lista de Projetos">
    <div class="flex justify-end my-3">
        <a class="bg-green-500 border rounded-md p-1 px-3 text-white" href="{{ route('projects.create') }}">Criar projeto</a>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Orçamento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data inicío
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data fim
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $project->nome }}
                    </th>
                    <td class="px-6 py-4">
                       R$ {{ Functions::formatarMoeda($project->orcamento) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ Functions::formatarData($project->data_inicio) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ Functions::formatarData($project->data_final) }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('projects.edit', $project->id) }}" class="mr-2 bg-blue-500 text-white p-1 border rounded-md hover:bg-blue-700">Editar</a>

                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-1 border rounded-md hover:bg-red-700"
                                onclick="return confirm('Are you sure you want to delete this project?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td colspan="6" class="px-6 py-4 text-center text-lg">
                        Nenhum projeto cadastrado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="my-4">
            {{ $projects->links() }}
        </div>
    </div>
</x-layout>
