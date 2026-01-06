<nav class="bg-gray-300">
    <div class="container mx-auto flex items-center justify-between p-4">
        <a href="/" class="text-2xl font-semibold">Treinaweb</a>

        <ul class="font-medium flex">
            <li class="px-3">
                <a href="{{ route('clients.index') }}">Clientes</a>
            </li>
            <li class="px-3">
                <a href="{{ route('employees.index') }}">Funcionários</a>
            </li>
            <li class="px-3">
                <a href=" {{route('projects.index')}} ">Projetos</a>
            </li>
        </ul>
    </div>
</nav>
