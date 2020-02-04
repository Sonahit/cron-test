<?php

namespace App\View;

use App\Exceptions\TemplateNotFoundException;

use function App\viewsPath;

class View
{
    public $properties = [];

    public function render(string $viewName, array $data = [])
    {
        $viewPath = viewsPath('templates') . '/' .  $viewName . '.php';
        ob_start();
        foreach ($data as $k => $v) {
            ${"$k"} = $v;
        }

        if (file_exists($viewPath)) {
            include($viewPath);
        } else {
            throw new TemplateNotFoundException("Template not found {$viewPath}");
        }
        return ob_get_clean();
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
