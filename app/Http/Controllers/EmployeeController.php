<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\Employee\EmployeeService;


class EmployeeController extends Controller
{

    private $itemsPerPage = 10;

    public function __construct(private EmployeeService $employeeService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('address')
            ->orderBy('created_at', 'desc')
            ->paginate($this->itemsPerPage);

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
    public function store(StoreUpdateEmployeeRequest $request)
    {
        $data = $request->employeeData();
        $address = $request->addressData();

        $response = $this->employeeService->insertEmployee($data, $address);

        if (!$response) {
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
    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->employeeData();
        $address = $request->addressData();

        $response = $this->employeeService->updateEmployee($employee, $data, $address);

        if (!$response) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar funcionario!');
        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Funcionario atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
