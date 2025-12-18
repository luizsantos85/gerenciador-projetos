<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    private $itemsPerPage = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('address')->paginate($this->itemsPerPage);
        return view('employees.index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Trabalhar com transações e try catch
        try {
            $data = $request->only([
                'nome',
                'cpf',
                'data_contratacao',
                'data_demissao',
            ]);

            $address = $request->only([
                'logradouro',
                'numero',
                'bairro',
                'complemento',
                'cidade',
                'estado',
                'cep',
            ]);

            DB::beginTransaction();
                $employee = Employee::create($data);
                $employee->address()->create($address);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar funcionario!');
        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Funcionario cadastrado com sucesso!');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
