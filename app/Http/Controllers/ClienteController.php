<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'min:3', 'max:100'],
            'endereco' => ['required', 'max:200'],
            'descricao' => ['required']
        ]);

        Client::create($request->except('_token'));

        // $novoCliente = new Client;
        // $novoCliente->nome = $request->input('nome');
        // $novoCliente->endereco = $request->input('endereco');
        // $novoCliente->descricao = $request->input('descricao');
        // $novoCliente->save();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit(Client $client): View
    {
        return view('clientes.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nome' => ['required', 'min:3', 'max:100'],
            'endereco' => ['required', 'max:200'],
            'descricao' => ['required']
        ]);

        $client->update($request->except('_token', '_method'));

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
