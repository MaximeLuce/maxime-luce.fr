<?php

define('BASE_URL', '/');
//define('BASE_URL', '/cv/src/');

$envFilePath = __DIR__ . '/.env';
if (file_exists($envFilePath)) {
    $envVariables = parse_ini_file($envFilePath);
    foreach ($envVariables as $key => $value) {
        $_ENV[$key] = $value;
    }
} else {
    die("Fatal error : File .env not found.");
}


if ($_ENV['APP_ENV'] === 'development') {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
  
    ini_set('display_errors', 0); 
    error_reporting(0);
}



// setting up Autoloader adapted with namespace "Application\"
spl_autoload_register(function ($class) {
    // removing "Application\" from class name
    $classPath = str_replace('Application\\', '', $class);
    
    $classPath = str_replace('\\', '/', $classPath);
    
    $classPath = strtolower($classPath);
    
    // final path
    $file = __DIR__ . '/src/' . $classPath . '.php';
    
    // if file exist, we include it
    if (file_exists($file)) {
        require_once $file;
    }
});



require_once 'router.php';

Route::contentToRender();