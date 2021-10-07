<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException; //この追加を忘れないで

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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }
        if ($request->is('member/post/') || $request->is('member/post/*') ) {
            return redirect()->guest('/post/login');
        }
        if ($request->is('operate/admin') || $request->is('operate/admin/*')) {
            return redirect()->guest('/login/admin');
            // operateだけだとoperate/membersも含まれるのでこの記述
        }

        return redirect()->guest($exception->redirectTo() ?? route('login'));
    }
}
