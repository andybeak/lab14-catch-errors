<?php

require('NewtonRaphson.php');

$rootFinder = new NewtonRaphson();

$equation = "f(x) = 9x^3 + 4.5x^2 + 5x + 1";

$root = $rootFinder->findRoot($equation);

echo "Found an approximate root at [x={$root[0]}] with function value [{$root[1]}]" . PHP_EOL;