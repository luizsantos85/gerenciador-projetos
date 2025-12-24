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
     * @return boolean
     */
    public function insertEmployee(array $data, array $address): bool
    {
        try {
            DB::beginTransaction();
            $employee = Employee::create($data);
            $employee->address()->create($address);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
        return true;
    }

    /**
     * Update employee
     *
     * @param Employee $employee
     * @param array $data
     * @param array $address
     * @return boolean
     */
    public function updateEmployee(Employee $employee, array $data, array $address): bool
    {
        try {
            DB::beginTransaction();
            $employee->update($data);
            $employee->address()->updateOrCreate([], $address);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
        return true;
    }

    /**
     * Delete employee
     *
     * @param Employee $employee
     * @return boolean
     */
    public function deleteEmployee(Employee $employee): bool
    {
        try {
            DB::beginTransaction();

            $employee->address()->delete();
            $employee->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
        return true;
    }
}
