<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClientRequest extends FormRequest
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
            'nome' => ['required', 'min:3', 'max:100'],
            'endereco' => ['required', 'max:200'],
            'descricao' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo :min caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo :max caracteres.',
            'endereco.required' => 'O campo endereço é obrigatório.',
            'endereco.max' => 'O campo endereço deve ter no máximo :max caracteres.',
            'descricao.required' => 'O campo descrição é obrigatório.'
        ];
    }
}
