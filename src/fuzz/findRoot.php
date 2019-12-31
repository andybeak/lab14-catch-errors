<?php

require('../NewtonRaphson.php');

/** @var PhpFuzzer\Fuzzer $fuzzer */

$rootFinder = new NewtonRaphson();

$fuzzer->setMaxLen(48);

$fuzzer->setTarget(function(string $input) use($rootFinder) {
    $rootFinder->findRoot($input);
});