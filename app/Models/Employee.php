<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    // O  metodo fillable permite que os campos (nome, cpf, data_contratacao, data_demissao) sejam modificados
    // This property is used by the mass assignment protection to determine which attributes should be mass assignable.
    //protected $fillable = ['nome', 'cpf', 'data_contratacao', 'data_demissao'];

    // O  metodo guarded evita que os campos (id, created_at, updated_at) sejam modificados
    // This property is used by the mass assignment protection to determine which attributes should not be mass assignable.
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Mapeia o relacionamento com o endereço
     * Um funcionário tem um endereço
     *
     * @return HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Um funcionário pertence a muitos projetos
     *
     * @return BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project', 'employee_id', 'project_id');
    }
}
