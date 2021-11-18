<?php

namespace App\Http\Controllers;

use App\Models\EmpleadoRol;
use Illuminate\Http\Request;

/**
 * Class EmpleadoRolController
 * @package App\Http\Controllers
 */
class EmpleadoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleadoRols = EmpleadoRol::paginate();

        return view('empleado-rol.index', compact('empleadoRols'))
            ->with('i', (request()->input('page', 1) - 1) * $empleadoRols->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleadoRol = new EmpleadoRol();
        return view('empleado-rol.create', compact('empleadoRol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmpleadoRol::$rules);

        $empleadoRol = EmpleadoRol::create($request->all());

        return redirect()->route('empleado-rols.index')
            ->with('success', 'EmpleadoRol created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleadoRol = EmpleadoRol::find($id);

        return view('empleado-rol.show', compact('empleadoRol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleadoRol = EmpleadoRol::find($id);

        return view('empleado-rol.edit', compact('empleadoRol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmpleadoRol $empleadoRol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpleadoRol $empleadoRol)
    {
        request()->validate(EmpleadoRol::$rules);

        $empleadoRol->update($request->all());

        return redirect()->route('empleado-rols.index')
            ->with('success', 'EmpleadoRol updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleadoRol = EmpleadoRol::find($id)->delete();

        return redirect()->route('empleado-rols.index')
            ->with('success', 'EmpleadoRol deleted successfully');
    }
}
