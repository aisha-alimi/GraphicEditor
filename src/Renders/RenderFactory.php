<?php

namespace GraphicEditor\Renders;

use GraphicEditor\Shapes\AbstractShape;
use GraphicEditor\Formats\AbstractFormat;

class RenderFactory
{
    /**
     * @param AbstractShape $shape
     * @param AbstractFormat $format
     *
     * @return AbstractRender
     */
    public function create(AbstractShape $shape, AbstractFormat $format) : AbstractRender
    {
        try {
            $shapeClassName = (new \ReflectionClass($shape))->getShortName();
            $formatClassName = (new \ReflectionClass($format))->getShortName();

            $renderClassName = __NAMESPACE__ . "\\" . $shapeClassName . "\\" . $formatClassName;

        } catch (\ReflectionException $e) {
            throw new \RuntimeException($e->getMessage());
        }

        if (! class_exists($renderClassName)) {
            throw new \RuntimeException("The class for " . $renderClassName . " does not exist");
        }

        return new $renderClassName($shape, $format);
    }
}
