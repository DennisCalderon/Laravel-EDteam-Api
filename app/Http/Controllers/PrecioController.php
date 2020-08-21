<?php

namespace App\Http\Controllers;

use App\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // nos permite consultar/mostrar todos los precios de nuestra base de datos
    {
        $precios = Precio::all(); // consulta todos los precios a la base datos
        return response()->json([ // Respuesta personalizada
            "data" => $precios,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // nativamente de laravel nos permite crear un formulario para crear un precio
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // método para almacenar la información en la base de datos
    {
        $precio = Precio::create($request->all()); // crear un precio en la base de datos
        return response()->json([
            "message" => "El precio ha sido creado correctamente",
            "data" => $precio,
            "status" => Response::HTTP_CREATED
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function show(Precio $precio) // método para mostrar un precio
    {
        //return $precio; // para mostrar un precio
        return response()->json([
            "message" => "El precio ha sido creado correctamente",
            "data" => $precio,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function edit(Precio $precio) // nos permite crear un formulario para poder editar un contenido
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Precio $precio) // nos permite recibir una información y con eso actualizar un dato
    {
        $precio->update($request->all());
        return response()->json([
            "message" => "El precio ha sido creado correctamente",
            "data" => $precio,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Precio $precio) // para destruir algún dato
    {
        $precio->delete();
        return response()->json([
            "message" => "El precio ha sido creado correctamente",
            "data" => $precio,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
