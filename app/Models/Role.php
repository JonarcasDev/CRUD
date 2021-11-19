<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property $id
 * @property $nombre
 *
 * @property EmpleadoRol[] $empleadoRols
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model
{
    public $timestamps = false;
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleadoRols()
    {
        return $this->hasMany('App\Models\EmpleadoRol', 'rol_id', 'id');
    }


}
