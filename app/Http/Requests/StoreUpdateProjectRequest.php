<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' =>   ['required', 'min:3', 'max:100'],
            'orcamento' =>  ['required', 'min:0'],
            'data_inicio' => ['required', 'date'],
            'data_final' => ['required', 'date', 'after:data_inicio'],
            'client_id' =>  ['required', 'exists:clients,id'],
        ];
    }
}
