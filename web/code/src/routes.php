<?php

declare(strict_types = 1);

/**
 * Map request method/uri to a controller/action.
 */
return [
    ['POST', '/example/create', ['Example\Controller\ExampleController', 'createExample']],
    ['POST', '/addition/add', ['Example\Controller\AdditionController', 'addExample']],
    ['GET', '/', ['Example\Controller\HomeController', 'index']]
];
