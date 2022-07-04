<?php

declare(strict_types = 1);

namespace Example\View;

use Mini\Controller\Exception\BadInputException;

/**
 * Addition view builder.
 */
class AdditionView
{

    /**
     * Get the addition view to display its data.
     * 
     * @return string view template
     *
     * @throws BadInputException if example model does not have ID set
     */
    public function get(array $data)
    {

        return view('app/addition/detail', ['data' => $data]);
    }
}
