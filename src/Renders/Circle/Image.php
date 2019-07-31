<?php

namespace GraphicEditor\Renders\Circle;

use GraphicEditor\Renders\AbstractRender;

class Image extends AbstractRender
{
    public function draw()
    {
        $canvas = $this->format->getOutput();

        if ($this->shape->hasAttribute('borderSize')) {
            imagesetthickness($canvas, $this->shape->getAttribute('borderSize'));

            $borderColor = $this->shape->hasAttribute('borderColor') ? $this->shape->getAttribute('borderColor') : [0, 0, 0];
            $borderColor = imagecolorallocate($canvas, $borderColor[0], $borderColor[1], $borderColor[2]);

            imagearc(
                $canvas,
                $this->shape->getAttribute('x'),
                $this->shape->getAttribute('y'),
                $this->shape->getAttribute('radius'),
                $this->shape->getAttribute('radius'),
                0,
                360,
                $borderColor
            );
        }

        if ($this->shape->hasAttribute('fillColor')) {
            $fillColor = $this->shape->hasAttribute('fillColor') ? $this->shape->getAttribute('fillColor') : [128, 0, 128];
            $fillColor = imagecolorallocate($canvas, $fillColor[0], $fillColor[1], $fillColor[2]);

            imagefilledellipse(
                $canvas,
                $this->shape->getAttribute('x'),
                $this->shape->getAttribute('y'),
                $this->shape->getAttribute('radius'),
                $this->shape->getAttribute('radius'),
                $fillColor
            );
        }
    }
}
