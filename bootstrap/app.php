<?php

use App\Http\Middleware\IsLoggedIn;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
	->withRouting(
		web: __DIR__ . '/../routes/web.php',
		commands: __DIR__ . '/../routes/console.php',
		health: '/up',
	)
	->withMiddleware(function (Middleware $middleware): void {
		$middleware->alias([
			'isLoggedIn' => IsLoggedIn::class,
		]);
	})
	->withExceptions(function (Exceptions $exceptions): void {
		$exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
			if (url()->previous() && url()->previous() !== url()->current()) {
				return redirect()->back();
			};
		});
	})->create();
