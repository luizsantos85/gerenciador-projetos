<x-layout title="Editar Projeto">
    @include('projects.form', ['action' => route('projects.update',$project->id), 'btnText' => 'Atualizar', 'project' => $project, 'clients' => $clients])
</x-layout>
