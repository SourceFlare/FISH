<?php spl_autoload_register(function($className)
{
    $classname = str_replace("FISH\\", '', $className);
    $classname = str_replace('\\', '/', $classname);

    $class = __DIR__ . '/' . $classname . '.php';

    # Check if Class Exists & Include
    if (file_exists($class))
        require($class);
});
