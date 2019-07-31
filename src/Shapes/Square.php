<?php
namespace GraphicEditor\Shapes;

class Square extends AbstractShape
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
        if (! isset($attributes['side'])) {
            throw new \LogicException("The side attribute is required.");
        } elseif (((float) $attributes['side']) <= 0) {
            throw new \LogicException("The side attribute must be a number greater than 0.");
        }

        if (! isset($attributes['x']) || ! isset($attributes['y'])) {
            throw new \LogicException("The x and y coordinates of the top left corner of the square are required.");
        }

        return true;
    }
}
