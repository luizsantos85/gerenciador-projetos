<?php

namespace App\Http\Controllers;

use App\Enums\StatesOfBrazilian;
use App\Http\Requests\StoreUpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\Employee\EmployeeService;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class EmployeeController extends Controller
{

    private $itemsPerPage = 10;

    public function __construct(private EmployeeService $employeeService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory
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
    public function create(): View|Factory
    {
        $states = StatesOfBrazilian::cases(); // return list with all states
        return view('employees.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateEmployeeRequest $request): RedirectResponse|Redirector
    {
        $data = $request->employeeData();
        $address = $request->addressData();

        $result = $this->employeeService->insertEmployee($data, $address);

        if (!$result['ok']) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar funcionário: ' . $result['message']);
        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Funcionario cadastrado com sucesso!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): View|Factory|RedirectResponse|Redirector
    {
        if ($employee->data_demissao) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Funcionario demitido, não pode ser atualizado!');
        }

        $states = StatesOfBrazilian::cases(); // return list with all states
        return view('employees.edit', [
            'employee' => $employee,
            'states' => $states
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateEmployeeRequest $request, Employee $employee): RedirectResponse|Redirector
    {
        if($employee->data_demissao) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Funcionario demitido, não pode ser atualizado!');
        }

        $data = $request->employeeData();
        $address = $request->addressData();

        $result = $this->employeeService->updateEmployee($employee, $data, $address);

        if (!$result['ok']) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar funcionário: ' . $result['message']);
        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Funcionario atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): RedirectResponse|Redirector
    {
        $result = $this->employeeService->deleteEmployee($employee);

        if (!$result['ok']) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao atualizar funcionário: ' . $result['message']);
        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Funcionario excluido com sucesso!');
    }

    /**
     * Fire an employee
     */
    public function fireAnEmployee(Employee $employee): RedirectResponse|Redirector
    {
        $result = $this->employeeService->fireEmployee($employee);

        if (!$result['ok']) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao demitir funcionário: ' . $result['message']);
        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Funcionario demitido com sucesso!');
    }

    /**Reissue employee */
    public function reissueEmployee(Employee $employee): RedirectResponse|Redirector
    {
        $result = $this->employeeService->reissueEmployee($employee);

        if (!$result['ok']) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao reativar funcionário: ' . $result['message']);
        }

        return redirect()
            ->route('employees.index')
            ->with('success', 'Funcionario reativado com sucesso!');
    }
}
