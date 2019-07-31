<?php

namespace GraphicEditor\Factories;

use GraphicEditor\Shapes\AbstractShape;
use GraphicEditor\Shapes\Circle;
use GraphicEditor\Shapes\Square;

class ShapeFactory
{
    /**
     * @param   array $input
     * @return  AbstractShape
     */
    public function create(array $input) : AbstractShape
    {
        $shapeType = strtolower($input['type']);
        $shape = null;
        $attributes = $input['params'];

        switch ($shapeType) {
            case 'circle' :
                $shape = new Circle($attributes);
                break;
            case 'square' :
                $shape = new Square($attributes);
        }

        if ($shape === null) {
            throw new \RuntimeException("The class for " . $shapeType . " does not exist");
        }

        $shape->validateAttributes($shape->getAttributes());

        return $shape;
    }
}
