<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'cadfun';

    protected $primaryKey = 'codigo';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    /**
     * Um funcionário tem um endereço
     * 
     * @return HasOne 
     */
    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'codigo_fun', 'codigo');
    }
}
