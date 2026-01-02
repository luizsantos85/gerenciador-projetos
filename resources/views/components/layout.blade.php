<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    {{-- Menu Top Bar --}}
    <x-menu-top-bar />

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
