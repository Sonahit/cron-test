<?php

namespace App\View;

use function App\viewsPath;
use \Twig\Environment;
use \Twig\Extension\DebugExtension;

class View
{
    public $properties = [];

    public function render(string $viewName, array $data = [])
    {
        $viewName = $viewName . '.twig';
        $loader = new Loader(viewsPath('templates'));
        $twig = new Environment($loader);
        $twig->addGlobal('_session', $_SESSION);
        $twig->addGlobal('_post', $_POST);
        $twig->addGlobal('_get', $_GET);
        return $twig->render($viewName, $data);
    }

    public function __set($k, $v)
    {
        $this->properties[$k] = $v;
    }

    public function __get($k)
    {
        return $this->properties[$k];
    }
}
