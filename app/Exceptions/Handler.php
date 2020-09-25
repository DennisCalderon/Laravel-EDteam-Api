<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception) // renderiza las excepciones
    {
        //dd($exception); // al entrar a la URL nos muestra en mensaje en el navegador web el cual nos dice el tipo de exception que se presenta
        
        if($request->wantsJson()){
            if($exception instanceof ModelNotFoundException) {
                return response()->json([
                    "message" => "No se ha encontrado el dato solicitado",
                    "Status" => Response::HTTP_NOT_FOUND
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json(["error" => "Algo malo pasó"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
        return parent::render($request, $exception);
    }
}
