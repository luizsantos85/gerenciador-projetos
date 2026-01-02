<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     * Remove the mask from the cpf and cep fields
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'cpf' => $this->cpf ? preg_replace('/\D+/', '', $this->cpf) : null,
            'cep' => $this->cep ? preg_replace('/\D+/', '', $this->cep) : null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $employee = $this->route('employee');
        $id = $employee?->id ?? $employee;
        $today = now('America/Sao_Paulo')->toDateString();

        return [
            'nome' => 'required|string|min:2|max:100',
            'cpf' => 'required|string|digits:11|unique:employees,cpf,' . $id,
            'data_contratacao' => 'required|date|date_format:Y-m-d|after_or_equal:1900-01-01|before_or_equal:' . $today,
            // 'data_demissao' => 'nullable|date|after_or_equal:data_contratacao|before_or_equal:' . $today,
            // Endereço
            'logradouro' => 'required|string|max:255|min:2',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:50',
            'complemento' => 'nullable|string|max:50',
            'cidade' => 'required|string|max:50',
            'estado' => 'required|string|size:2',
            'cep' => 'required|string|digits:8',
        ];
    }

    public function employeeData()
    {
        return $this->validatedOnly(['nome', 'cpf', 'data_contratacao', 'data_demissao']);
    }

    public function addressData(): array
    {
        return $this->validatedOnly(['logradouro', 'numero', 'bairro', 'complemento', 'cidade', 'estado', 'cep']);
    }

    // return only the validated data
    protected function validatedOnly(array $keys): array
    {
        return collect($this->validated())->only($keys)->all();
    }
}
