<?php

/**
 * Simple autoloader function.
 * 
 * Automatically loading classes based on their namespace and class name. 
 * It assumes a directory structure where namespaces directly map to the directory structure, 
 * and class files have the '.php' extension.
 * 
 * For example, the class 'CoffeeShop\Order\OrderFactory' should be located at 'src/Order/OrderFactory.php'.
 */
spl_autoload_register(function (string $className): void {
    // Construct the file path using the class name and base directory (__DIR__)
    $file = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

    // Check if the file exists, and if so, include it
    if (file_exists($file)) {
        include_once $file;
    }
});
