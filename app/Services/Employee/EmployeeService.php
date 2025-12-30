<?php

namespace App\Services\Employee;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeService
{
    /**
     * Create a new employee
     *
     * @param array $data
     * @param array $address
     * @return array
     */
    public function insertEmployee(array $data, array $address): array
    {
        try {
            DB::beginTransaction();
            $employee = Employee::create($data);
            $employee->address()->create($address);
            DB::commit();

            return ['ok' => true, 'employee' => $employee];
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error('Employee insert failed', [
            //     'error' => $e->getMessage(),
            //     'data' => $data,           // remova se não quiser logar PII
            //     'address' => $address,     // idem
            //     'trace' => $e->getTraceAsString(),
            // ]);

            return ['ok' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Update employee
     *
     * @param Employee $employee
     * @param array $data
     * @param array $address
     * @return array
     */
    public function updateEmployee(Employee $employee, array $data, array $address): array
    {
        try {
            DB::beginTransaction();
            $employee->update($data);
            $employee->address()->updateOrCreate([], $address);
            DB::commit();

            return ['ok' => true, 'employee' => $employee];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['ok' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Delete employee
     *
     * @param Employee $employee
     * @return array
     */
    public function deleteEmployee(Employee $employee): array
    {
        try {
            DB::beginTransaction();

            $employee->address()->delete();
            $employee->delete();

            DB::commit();
            return ['ok' => true, 'employee' => $employee];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['ok' => false, 'message' => $e->getMessage()];
        }
    }
}
