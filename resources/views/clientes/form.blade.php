{{-- Formulario para reaproveitar na criação e update de clientes --}}
<form method="post" action="{{ $action }}" class="max-w-6xl mx-auto">
    @if(isset($client))
    @method('PUT')
    @endif

    @csrf

    <x-input-text nomeInput="nome" :value="$client->nome ?? ''" />
    <x-input-text nomeInput="endereco" :value="$client->endereco ?? ''" />
    <x-input-text nomeInput="descricao" :value="$client->descricao ?? ''" />

    <x-button-simple buttonText="{{$btnText}}" />
</form>
