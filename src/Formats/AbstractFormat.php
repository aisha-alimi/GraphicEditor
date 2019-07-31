<?php

namespace GraphicEditor\Formats;

abstract class AbstractFormat
{
    /** @var mixed */
    protected $output;

    /**
     * For Images, output is the canvas
     * For Points, output is an array of points
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output ?? $this->createOutput();
    }

    abstract public function createOutput();
}
