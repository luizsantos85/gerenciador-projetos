{{-- Formulario para reaproveitar na criação e update de funcionarios --}}
<form method="post" action="{{ $action }}" class="max-w-6xl mx-auto">
    @if(isset($project))
    @method('PUT')
    @endif

    @csrf
    <fieldset class="border rounded p-3 mb-2">
        <legend class="font-bold">Dados básicos</legend>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-4">
                <x-input-text name="nome" label="Nome do projeto" :value="$project->nome ?? ''" minlength="2"
                    maxlength="100" />
            </div>

            <div class="md:col-span-2">
                <x-input-text name="data_inicio" label="Data de início" :value="$project->data_inicio ?? ''"
                    type="date" />
            </div>
            <div class="md:col-span-2">
                <x-input-text name="data_final" label="Data final" :value="$project->data_final ?? ''" type="date" />
            </div>

            <div class="md:col-span-2">
                <x-input-text name="orcamento" label="Orçamento" :value="$project->orcamento ?? ''" type="text"
                    data-mask="money" />
            </div>

            <div class="md:col-span-2">
                <x-select name="client_id" label="Cliente" :list="$clients" :value="$project->client_id ?? ''"
                    itemValue="id" itemLabel="nome" />
            </div>
        </div>
    </fieldset>

    <x-button-simple buttonText="{{$btnText}}" />
</form>

@push('scripts')
<script src="https://unpkg.com/imask"></script>
<script>
    document.querySelectorAll('[data-mask]').forEach(el => {
            const mask = el.dataset.mask;

            if (mask === 'money') {
                IMask(el, {
                    mask: 'R$ num',
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: '.',
                            padFractionalZeros: true,
                            normalizeZeros: true,
                            radix: ',',
                            mapToRadix: ['.']
                        }
                    }
                });
            } else {
                IMask(el, {
                    mask: mask
                });
            }
        });
</script>
@endpush
