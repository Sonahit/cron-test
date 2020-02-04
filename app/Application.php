<?php

namespace App;

use App\Container\Container;
use App\Facade\Router;
use App\Http\Request;
use App\Http\Response;
use \FastRoute\Dispatcher;

class Application extends Container
{
    public $version = "0.0.1";


    public function __construct()
    {
        $this->initBaseBoundings();
    }

    protected function initBaseBoundings()
    {
        self::setInstance($this);
    }

    public function handle(Request $request)
    {
        $dispatcher = Router::getDispatcher();
        $routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                //Try to assume It is a resource file;
                $path = \App\publicPath($request->getRequestUri());
                $file = substr($path, strrpos($path, '/') + 1, strlen($path));
                $path = substr($path, 0, strrpos($path, '/'));
                $files = \App\read_all_files($path);
                $files = $files['files'];
                $files = array_filter($files, function ($path) use ($file) {
                    $fileName = substr($path, strrpos($path, '\\') + 1, strlen($path));
                    $fileName = substr($fileName, 0, strpos($fileName, '.'));
                    return $fileName === $file;
                });
                $file = array_pop($files);
                if (file_exists($file)) {
                    $file = file_get_contents($file);
                    return new Response($file);
                }
                // Else return error
                $resp = new Response(view('error', ['status' => 404]), 404);
                return $resp;
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                $resp = new Response(view('error', ['status' => 404]), 404);
                return $resp;
                break;

            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = [$request, ...$routeInfo[2]];
                return new Response(call_user_func_array($handler, $vars), 200);
                break;
        }
    }
}
