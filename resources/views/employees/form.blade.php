{{-- Formulario para reaproveitar na criação e update de funcionarios --}}
<form method="post" action="{{ $action }}" class="max-w-6xl mx-auto">
    @if(isset($employee))
    @method('PUT')
    @endif

    @csrf
    <fieldset class="border rounded p-3 mb-2">
        <legend class="font-bold">Dados básicos</legend>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-3">
                <x-input-text name="nome" label="Nome" :value="$employee->nome ?? ''" minlength="2" maxlength="100" />
            </div>
            <x-input-text name="cpf" label="CPF" :value="$employee->cpf ?? ''" data-mask="000.000.000-00" />
            <x-input-text name="data_contratacao" label="Data de contratação" :value="$employee->data_contratacao ?? ''" type="date" />
            <x-input-text name="data_demissao" label="Data de demissão" :value="$employee->data_demissao ?? ''"
                type="date" />
        </div>
    </fieldset>

    <fieldset class="border rounded p-3 mb-2">
        <legend class="font-bold">Endereço</legend>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <div class="md:col-span-10">
                <x-input-text name="logradouro" label="Logradouro" :value="$employee->address->logradouro ?? ''" />
            </div>
            <div class="md:col-span-2">
                <x-input-text name="numero" label="Número" :value="$employee->address->numero ?? ''" />
            </div>
            <div class="md:col-span-6">
                <x-input-text name="bairro" label="Bairro" :value="$employee->address->bairro ?? ''" />
            </div>
            <div class="md:col-span-6">
                <x-input-text name="complemento" label="Complemento" :value="$employee->address->complemento ?? ''" />
            </div>
            <div class="md:col-span-7">
                <x-input-text name="cidade" label="Cidade" :value="$employee->address->cidade ?? ''" />
            </div>
            <div class="md:col-span-2">
                <x-select name="estado" label="UF" :list="$states" :value="$employee->address->estado ?? ''" />
            </div>
            <div class="md:col-span-3">
                <x-input-text name="cep" label="CEP" :value="$employee->address->cep ?? ''"
                    data-mask="00.000-000" />
            </div>
        </div>
    </fieldset>

    <x-button-simple buttonText="{{$btnText}}" />
</form>

@push('scripts')
    <script src="https://unpkg.com/imask"></script>
    <script>
        document.querySelectorAll('[data-mask]').forEach(el => {
            IMask(el, {
                mask: el.dataset.mask
            });
        });
    </script>
@endpush

