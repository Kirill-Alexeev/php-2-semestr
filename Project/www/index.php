<?php

    spl_autoload_register(function (string $className){
        require_once('../src/'.str_replace('\\', '/',$className).'.php');
    });
    
    $user = new Models\Users\User();
    $article = new Models\Articles\Article();

    $route = $_GET['route'] ?? '';
    $routes = require('../src/routes.php');
    $pageFound = false;
    foreach ($routes as $pattern=>$controllerAndAction){
        preg_match($pattern, $route, $matches);
        if(!empty($matches)){
            unset($matches[0]);
            $pageFound = true;
            $actionName = $controllerAndAction[1];
            $controller = new $controllerAndAction[0];
            $controller->$actionName(...$matches);
         }
    }
    if (!$pageFound) echo 'Страница не найдена';