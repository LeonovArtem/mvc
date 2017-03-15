<?php

/**
 * Class Router
 * @routes {array} маршруты
 * Аналогично работаtn Yii
 */
class Router
{
    private $routes;

    function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    function run()
    {
        //*Получаем строку запроса
        $uri = $this->getUri();
        //Проверить наличие запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                //Определяем каккой контроллер и экшен обрабатывает запрос
                $segments = explode('/', $path);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                //Подключить файл класса-конроллера
                $controllerFile = ROOT . '/controllers/'
                    . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //Создать объект, вызвать метод(action)

                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName;
                if ($result != null) {
                    break;
                }


            }
        }

    }

    /**
     * Returns request string
     * @return string
     */
    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI']))
            return trim($_SERVER['REQUEST_URI']);
    }

}