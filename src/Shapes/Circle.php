<?php

namespace GraphicEditor\Shapes;

class Circle extends AbstractShape
{
    /**
     * Validate required parameters
     *
     * @param array $attributes
     * @return bool
     *
     * @throws \LogicException
     */
    public function validateAttributes(array $attributes) : bool
    {
        if (! isset($attributes['radius'])) {
            throw new \LogicException("The radius attribute is required.");
        } elseif (((float) $attributes['radius']) <= 0) {
            throw new \LogicException("The radius attribute must be a number greater than 0.");
        }

        if (! isset($attributes['x']) || ! isset($attributes['y'])) {
            throw new \LogicException("The x and y coordinates of the center are required.");
        }

        return true;
    }
}
