<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="bg-gray-300">
        <div class="container mx-auto flex items-center justify-between p-4">
            <a href="/" class="text-2xl font-semibold">Treinaweb</a>

            <ul class="font-medium flex">
                <li class="px-4">
                    <a href="{{ route('clients.index') }}">Cadastro de Clientes</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center my-4">
            {{ $title }}
        </h1>

            {{-- Alerts --}}
            <x-alerts />


            {{-- Conteudo da pagina --}}
            {{ $slot }}

    </div>

    @stack('scripts')
</body>

</html>
