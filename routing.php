<?php
    function routing()  {
       

        function setupUrlPaths()   {
            $urlPath = parse_url($_SERVER['REQUEST_URI'])['path'];

            return $urlPath;
        }
        function setupRoutes()  {
            $pathRoutes = [
                '/' => './controls/index.php',
                '/about' => './controls/about.php',
                '/contact' => './controls/contact.php',
            ];
            return $pathRoutes;
        }


        function error404($code = 404) {
            http_response_code($code);

            require('./controls/404.php');

            die();
        }


        function controlRoutes($urlPath, $pathRoutes)    {
            if(array_key_exists($urlPath, $pathRoutes)){
                require($pathRoutes[$urlPath]);
            }else{
                error404();
            }
        }
        $routes = setupRoutes();
        $url = setupUrlPaths();
        controlRoutes($url, $routes);
    }
    routing();
?>