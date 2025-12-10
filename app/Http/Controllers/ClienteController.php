<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateClientRequest;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    private $itemsPerPage = 10;

    /**
     * Lista os clientes do banco de dados
     *
     * @return View|Factory
     */
    public function index()
    {
        $clientes = Client::paginate($this->itemsPerPage);
        $clientes->load('projects');

        return view('clientes.index', [
            'clientes' => $clientes
        ]);
    }

    /**
     * Mostra o formulário de cadastro de clientes
     *
     * @return View|Factory
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Grava o cliente no banco de dados
     */
    public function store(StoreUpdateClientRequest $request)
    {
        $data = $request->validated();
        Client::create($data);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit(Client $client): View
    {
        return view('clientes.edit', compact('client'));
    }

    public function update(StoreUpdateClientRequest $request, Client $client)
    {
        $data = $request->validated();
        $client->update($data);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}
