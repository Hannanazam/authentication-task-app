<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')  && $exception instanceof HttpExceptionInterface) {
            $code = $exception->getStatusCode();
            if ($code == 404) {
                return response()->json([
                    'message' => '404 not Found'
                ], 404);
            }
        }
        if ($request->is('api/*') && $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 401);
        }
        return parent::render($request, $exception);
    }
    
}
