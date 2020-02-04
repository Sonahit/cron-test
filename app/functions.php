<?php

namespace App;

use App\View\View;

if (! function_exists('App\config')) {
    /**
     * Returns config
     *
     * @return array
     */
    function config(string $configName)
    {
        return require realpath("../app/config") . '/' . $configName;
    }
}

if (! function_exists('App\basepath')) {
    /**
     * Returns base path
     *
     * @return string
     */
    function basepath(string $path = '')
    {
        return realpath('../app') . '/' . $path;
    }
}

if (! function_exists('App\publicPath')) {
    /**
     * Returns path to public
     *
     * @return string
     */
    function publicPath(string $path = '')
    {
        if ($path[0] === '/') {
             $path = substr($path, 1, strlen($path));
        };
        return realpath('./')  . '/' . $path;
    }
}

if (! function_exists('App\modelsPath')) {
    /**
     * Returns path to models
     *
     * @return string
     */
    function modelsPath(string $path = '')
    {
        return basepath('models')  . '/' . $path;
    }
}

if (! function_exists('App\controllersPath')) {
    /**
     * Returns path to controllers
     *
     * @return string
     */
    function controllersPath(string $path = '')
    {
        return basepath('controllers')  . '/' . $path;
    }
}

if (! function_exists('App\viewsPath')) {
    /**
     * Returns path to views
     *
     * @return string
     */
    function viewsPath(string $path = '')
    {
        return basepath('view') . '/' . $path;
    }
}

if (! function_exists('App\view')) {
    /**
     *
     * @return string
     */
    function view(string $viewName, array $data = [])
    {
        $viewInstance = new View();
        $output = $viewInstance->render($viewName, $data);
        return $output;
    }
}

if (! function_exists('http_response')) {
    function http_response($url)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url);
        return $res->getBody();
    }
}

if (! function_exists('read_all_files')) {
    function read_all_files($root = '.')
    {
        $files  = array('files'=>array(), 'dirs'=>array());
        $directories  = array();
        $last_letter  = $root[strlen($root)-1];
        $root  = ($last_letter == '\\' || $last_letter == '/') ? $root : $root.DIRECTORY_SEPARATOR;

        $directories[]  = $root;

        while (sizeof($directories)) {
            $dir  = array_pop($directories);
            if ($handle = opendir($dir)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    $file = $dir.$file;
                    if (is_dir($file)) {
                        $directory_path = $file.DIRECTORY_SEPARATOR;
                        array_push($directories, $directory_path);
                        $files['dirs'][]  = $directory_path;
                    } elseif (is_file($file)) {
                        $files['files'][]  = $file;
                    }
                }
                closedir($handle);
            }
        }

        return $files;
    }
}
