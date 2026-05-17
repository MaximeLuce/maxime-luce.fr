<?php

class Route
{
    public static function contentToRender(): void
    {
        $uri = self::processURI();

        // checking if the controller exists
        if (class_exists($uri['controller'])) {
            $controllerName = $uri['controller'];
            $method = $uri['method'];
            $args = $uri['args'];
            

            // instance of the controller
            $controller = new $controllerName();

            // check if the controller's method exist
            if (method_exists($controller, $method)) {
                // we call the methods with possible args
                $controller->{$method}(...$args);
            } else {
                echo "<h1>Erreur 404</h1><p>La page demandée n'existe pas (Méthode introuvable).</p>";
            }
        } else {
            echo "<h1>Erreur 404</h1><p>La page demandée n'existe pas (Contrôleur introuvable).</p>";
        }
    }

    private static function getURI(): array
    {
        // retrieve full URI asked
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        
        // removing get etc
        $uri = parse_url($uri, PHP_URL_PATH);
        
        // removing BASE_URL
        if (strpos($uri, BASE_URL) === 0) {
            $uri = substr($uri, strlen(BASE_URL));
        }

        // removing "index.php" for securitu
        $uri = str_replace('index.php', '', $uri);

        // cleaning / and rundern table
        $path = trim($uri, '/');
        return $path ? explode('/', $path) : [];
    }

    private static function processURI(): array
    {
        $parts = self::getURI();

        $controllerPart = $parts[0] ?? '';
        
        //default method from "index" to "execute"
        $methodPart = $parts[1] ?? 'execute'; 
        
        $args = array_slice($parts, 2);

        if (empty($controllerPart)) {
            // if empty URL
            $controller = '\Application\Controllers\Homepage';
        } else {
            // if URL request another page
            $folderAndClass = ucfirst($controllerPart);
            $controller = '\Application\Controllers\\' . $folderAndClass;
        }

        return [
            'controller' => $controller,
            'method'     => $methodPart,
            'args'       => $args
        ];
    }
}