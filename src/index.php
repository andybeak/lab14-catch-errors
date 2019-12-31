<?php

require('NewtonRaphson.php');

function exception_handler($exception) {
    // @todo log the exception message to central logging
    echo "An unexpected error happened";
}
set_exception_handler('exception_handler');

function myErrorHandler($errno, $errstr, $errfile, $errline) {
    // @todo log the details of the error to central logging
    throw new Exception();
}
set_error_handler("myErrorHandler");

$rootFinder = new NewtonRaphson();

$equation = "f(x) = 9x^3 + 4.5x^2 + 5x + 1";

try {

    $root = $rootFinder->findRoot($equation);

} catch (Throwable $e) {
    // @todo log the exception message to central logging
    echo "An unexpected error happened";
    exit;
}


echo "Found an approximate root at [x={$root[0]}] with function value [{$root[1]}]" . PHP_EOL;