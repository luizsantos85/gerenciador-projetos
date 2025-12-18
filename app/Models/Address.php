<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep'];

    /**
     * Mapeia o relacionamento com funcionário
     * Um endereço pertence a um funcionário
     *
     * @return BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Retorna o endereço do empregado formatado
     */
    public function formattedAddress()
    {
        return "{$this->logradouro} - {$this->numero}, {$this->bairro}, {$this->cidade}/{$this->estado}, CEP: {$this->cep}";
    }

}
