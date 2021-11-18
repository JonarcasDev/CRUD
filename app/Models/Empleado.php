<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $nombre
 * @property $email
 * @property $sexo
 * @property $area_id
 * @property $boletin
 * @property $descripcion
 *
 * @property Area $area
 * @property EmpleadoRol[] $empleadoRols
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{

    public $table = "empleado";
    public $timestamps = false;
    static $rules = [
		'nombre' => 'required',
		'email' => 'required',
		'sexo' => 'required',
		'area_id' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','email','sexo','area_id','boletin','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleadoRols()
    {
        return $this->hasMany('App\Models\EmpleadoRol', 'empleado_id', 'id');
    }


}
