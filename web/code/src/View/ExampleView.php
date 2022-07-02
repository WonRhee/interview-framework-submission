<?php

declare(strict_types = 1);

namespace Example\View;

use Example\Model\ExampleModel;
use Mini\Controller\Exception\BadInputException;

/**
 * Example view builder.
 */
class ExampleView
{
    /**
     * Example data.
     * 
     * @var Example\Model\ExampleModel|null
     */
    protected $model = null;

    /**
     * Setup.
     * 
     * @param ExampleModel $model example data
     */
    public function __construct(ExampleModel $model)
    {
        $this->model = $model;
    }

    /**
     * Get the example view to display its data.
     * 
     * @param ExampleModel $exampleModel    find by example model
     * 
     * @return string view template
     *
     * @throws BadInputException if example model does not have ID set
     */
    public function get(ExampleModel $exampleModel)
    {
        if ($exampleModel->getId() < 1) {
            throw new BadInputException('Example data must have ID set.');
        }

        return view('app/example/detail', ['data' => $exampleModel]);
    }
}
