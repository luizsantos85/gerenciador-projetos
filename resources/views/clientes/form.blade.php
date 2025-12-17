{{-- Formulario para reaproveitar na criação e update de clientes --}}
<form method="post" action="{{ $action }}" class="max-w-6xl mx-auto">
    @if(isset($client))
    @method('PUT')
    @endif

    @csrf

    <x-input-text name="nome" label="Nome" :value="$client->nome ?? ''" />
    <x-input-text name="endereco" label="Endereço" :value="$client->endereco ?? ''" />
    <x-input-text name="descricao" label="Descrição" :value="$client->descricao ?? ''" />

    <x-button-simple buttonText="{{$btnText}}" />
</form>
