<?php

namespace GraphicEditor\Renders;

use GraphicEditor\Formats\AbstractFormat;
use GraphicEditor\Shapes\AbstractShape;

abstract class AbstractRender
{
    /** @var AbstractShape  */
    protected $shape;

    /** @var AbstractFormat  */
    protected $format;

    /**
     * AbstractRender constructor.
     * @param AbstractShape $shape
     * @param AbstractFormat $format
     */
    final public function __construct(AbstractShape $shape, AbstractFormat $format)
    {
        $this->shape  = $shape;
        $this->format = $format;
    }

    abstract public function draw();
}
