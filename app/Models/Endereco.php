<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'cadend';

    protected $primaryKey = 'codigo';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    /**
     * Um endereço pertence a um funcionário
     * 
     * @return BelongsTo 
     */
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'codigo_fun', 'codigo');
    }
}
