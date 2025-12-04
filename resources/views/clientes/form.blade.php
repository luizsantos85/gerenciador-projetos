{{-- Formulario para reaproveitar na criação e update de clientes --}}
<form method="post" action="{{ $action }}" class="max-w-6xl mx-auto">
    @csrf

    <x-input-text nomeInput="nome" />

    <x-input-text nomeInput="endereco" />

    <x-input-text nomeInput="descricao" />

    <x-button-simple buttonText="{{$btnText}}" />
</form>
