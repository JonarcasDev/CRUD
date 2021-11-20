<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Role;
use App\Models\EmpleadoRol;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::paginate(15);

        return view('empleado.index', compact('empleados'))
            ->with('i', (request()->input('page', 1) - 1) * $empleados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        $areas = Area::select()->get();
        $empleado['areas'] = $areas;
        $roles = Role::select()->get();
        $empleado['roles'] = $roles;


        return view('empleado.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Empleado::$rules);
        $req = $request->all();

        if(isset($req['boletin']) && $req['boletin'] == 'on') {
            $req['boletin'] = 1;
        }else{
            $req['boletin'] = 0;
        }

        $empleado = Empleado::create($req);

        $roles = $req['rol'];
        foreach ($roles as $rol) {
            $empleadoRol = new EmpleadoRol();
            $empleadoRol->empleado_id = $empleado->id;
            $empleadoRol->rol_id = $rol;
            $empleadoRol->save();
        }

        return redirect()->route('empleado.index')
            ->with('success', 'Empleado creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $areas = Area::select()->get();
        $empleado['areas'] = $areas;
        $roles = Role::select()
        ->leftjoin('empleado_rol', function($join) use($id)
        {
            $join->on('roles.id', '=', 'empleado_rol.rol_id')
            ->where('empleado_rol.empleado_id', $id);
        })
        ->get();

        $empleado['roles'] = $roles;

        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        request()->validate(Empleado::$rules);

        $req = $request->all();

        if(isset($req['boletin']) && $req['boletin'] == 'on') {
            $req['boletin'] = 1;
        }else{
            $req['boletin'] = 0;
        }

        $empleado->update($req);

        $rolesEmpleado = EmpleadoRol::select()
        ->where('empleado_id', $empleado->id);

        $rolesEmpleado->delete();

        $roles = $req['rol'];
        foreach ($roles as $rol) {
            $empleadoRol = new EmpleadoRol();
            $empleadoRol->empleado_id = $empleado->id;
            $empleadoRol->rol_id = $rol;
            $empleadoRol->save();
        }

        return redirect()->route('empleado.index')
            ->with('success', 'Empleado actualizado satisfactoriamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id)->delete();

        return redirect()->route('empleado.index')
            ->with('success', 'Empleado eliminado satisfactoriamente.');
    }
}
