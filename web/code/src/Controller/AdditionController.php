<?php

declare(strict_types = 1);

namespace Example\Controller;

use Example\View\AdditionView;
use Mini\Controller\Controller;
use Mini\Controller\Exception\BadInputException;
use Mini\Http\Request;

/**
 * Addition entrypoint logic.
 */
class AdditionController extends Controller
{

    /**
     * Example view builder.
     * 
     * @var Example\View\AdditionView|null
     */
    protected $view = null;

    /**
     * Setup.
     * 
     * @param AdditionView  $view  example view builder
     */
    public function __construct(AdditionView $view)
    {
        $this->view  = $view;
    }

    /**
     * Add two numbers and display sume.
     * 
     * @param Request $request http request
     * 
     * @return string view template
     */
    public function addExample(Request $request): string
    {
        if (! $x = $request->request->get('x')){
            throw new BadInputException('Field x is missing');
        }
        if (! is_numeric($x)){
            throw new BadInputException('Field x is not a number.');
        }

        if (! $y = $request->request->get('y')) {
            throw new BadInputException('Field y is missing');
        }
        if (! is_numeric($y)){
            throw new BadInputException('Field y is not a number.');
        }

        $data = [
            'sum' => $x + $y,
            'x' => $x,
            'y' => $y
        ];
        
        return $this->view->get($data);
    }
}
