<?php

namespace GraphicEditor;

use GraphicEditor\Renders\RenderFactory;
use GraphicEditor\Shapes\ShapeFactory;
use GraphicEditor\Formats\AbstractFormat;
use GraphicEditor\Shapes\AbstractShape;


class GraphicEditor
{
    /** @var ShapeFactory */
    private $shapeFactory;

    /** @var RenderFactory */
    private $renderFactory;

    /** @var AbstractShape[] */
    private $shapes = [];

    /**
     * GraphicEditor constructor.
     * @param ShapeFactory $shapeFactory
     * @param RenderFactory $renderFactory
     */
    public function __construct(ShapeFactory $shapeFactory, RenderFactory $renderFactory)
    {
        $this->shapeFactory = $shapeFactory;
        $this->renderFactory = $renderFactory;
    }

    /**
     * @param array $shapes
     * @throws \Exception
     */
    public function import(array $shapes)
    {
        foreach ($shapes as $shape) {
            if(! isset($shape['type']) || ! isset($shape['params'])){
                throw new \Exception("Shape type & attributes required");
            }

            $this->shapes[] = $this->shapeFactory->create($shape);
        }
    }

    /**
     * @param AbstractFormat $format
     * @return mixed
     */
    public function run(AbstractFormat $format)
    {
        foreach ($this->shapes as $shape) {
            $rendering = $this->renderFactory->create($shape, $format);
            $rendering->draw();
        }

        return $format->getOutput();
    }
}
