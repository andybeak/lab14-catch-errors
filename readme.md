# Lab 14 - trap errors and exceptions

This project implements a simple mathematical algorithm without any error or exception handling.  This lets you create central error management to test against.

Not only does the code skip error trapping and sanity checking, but there is no type-checking or checks on precision safety.

## Running this project

You can run the project with these commands:

    cd src
    php index.php

## Producing errors

To produce errors consider using a fuzzer.

An example target for the [fuzzer by Nikita Popov](https://github.com/nikic/PHP-Fuzzer) is supplied

    cd src/fuzz    
    php create_example_input.php
    wget https://github.com/nikic/PHP-Fuzzer/releases/download/v0.0.4/php-fuzzer.phar
    chmod +x php-fuzzer.phar    
    ./php-fuzzer.phar fuzz findRoot.php equation/    

Replace downloading php-fuzzer.phar with the [current release](https://github.com/nikic/PHP-Fuzzer/releases)