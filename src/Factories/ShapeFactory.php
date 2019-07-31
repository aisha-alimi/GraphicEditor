<?php

namespace GraphicEditor\Factories;

use GraphicEditor\Shapes\AbstractShape;

class ShapeFactory
{
    /**
     * @param   array $shape
     * @return  AbstractShape
     */
    public function create(array $shape) : AbstractShape
    {
        $class = "GraphicEditor\\Shapes\\" . ucfirst($shape['type']);

        if (! class_exists($class)) {
            throw new \RuntimeException("The class for " . $shape['type'] . " does not exist");
        }

        return new $class($shape['params']);
    }
}
