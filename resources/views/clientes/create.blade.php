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
                    <a href="/clientes">Cadastro de Clientes</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center my-4">
            Cadastrar novo Cliente
        </h1>

        @if ($errors->any())
            <div class="flex justify-between items-center p-2 bg-red-500 text-white border-2 border-red-500 rounded-sm">
                <span class="text-xs">Erros de validação</span>
                <ul class="flex flex-col mt-1">
                @foreach($errors->all() as $error)
                    <li class="text-sm text-center">{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="/clientes" class="max-w-6xl mx-auto">
            @csrf
            <div class="mb-5">
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do cliente</label>
                <input type="text" id="nome" name="nome" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço do cliente</label>
                <input type="text" id="endereco" name="endereco" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição do cliente</label>
                <input type="text" id="descricao" name="descricao" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar Cliente</button>
        </form>
    </div>
</body>
</html>


