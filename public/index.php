<?php

require __DIR__ . '/../app/autoloader.php';

$app = require_once __DIR__ . '/../app/app.php';

$response = $app->handle($request = App\Http\Request::capture());

$response->send();
