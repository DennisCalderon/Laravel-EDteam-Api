<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all(); // consulta todos los precios a la base datos
        return response()->json([ // Respuesta personalizada
            "data" => $empresas,
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
        $empresa = Empresa::create($request->all()); // crear un precio en la base de datos
        return response()->json([
            "message" => "La empresa ha sido creada correctamente",
            "data" => $empresa,
            "status" => Response::HTTP_CREATED
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return response()->json([
            "data" => $empresa,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $empresa->update($request->all());
        return response()->json([
            "message" => "La empresa ha sido actualizada correctamente",
            "data" => $empresa,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return response()->json([
            "message" => "La empresa ha sido eliminada correctamente",
            "data" => $empresa,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
