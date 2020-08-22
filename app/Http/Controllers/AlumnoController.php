<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Empresa;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all(); // consulta todos los precios a la base datos
        return response()->json([ // Respuesta personalizada
            "data" => $alumnos,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumno = Alumno::create($request->all()); // crear un precio en la base de datos
        return response()->json([
            "message" => "El Alumno ha sido creado correctamente",
            "data" => $alumno,
            "status" => Response::HTTP_CREATED
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        $empresa = Empresa::findOrFail($alumno->idCompany); // buscame o falla; este método busca en la base de datos un objeto(ID en este caso)
        return response()->json([
            "alumno" => $alumno,
            "empresa" => $empresa,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return response()->json([
            "message" => "El Alumno ha sido actualizado correctamente",
            "data" => $alumno,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json([
            "message" => "El Alumno ha sido eliminado correctamente",
            "data" => $alumno,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
