<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Services\Project\ProjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    private $perPage = 10;
    public function __construct(private ProjectService $projectService) {}


    /**
     * Display a listing of the project.
     */
    public function index(): View|Factory
    {
        $projects = Project::with('client')
            ->paginate($this->perPage);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory
    {
        $clients = Client::all();
        return view('projects.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProjectRequest $request)
    {
        $data = $request->all();
        $data['orcamento'] = $this->sanitizeMoney($data['orcamento']);

        $result = $this->projectService->insertProject($data);

        if (!$result['ok']) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar projeto: ' . $result['message']);
        }

        return redirect()
            ->route('projects.index')
            ->with('success', 'Projeto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProjectRequest $request, Project $project)
    {
        $data = $request->all();
        $data['orcamento'] = $this->sanitizeMoney($data['orcamento']);

        $result = $this->projectService->updateProject($project, $data);

        if (!$result['ok']) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar projeto: ' . $result['message']);
        }

        return redirect()
            ->route('projects.index')
            ->with('success', 'Projeto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Sanitize money string to decimal
     *
     * @param string|null $value
     * @return string|null
     */
    private function sanitizeMoney(?string $value): ?string
    {
        if (!$value) {
            return null;
        }

        return str_replace(['R$ ', '.', ','], ['', '', '.'], $value);
    }
}
