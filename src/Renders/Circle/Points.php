<?php

namespace GraphicEditor\Renders\Circle;

use GraphicEditor\Formats\AbstractFormat;
use GraphicEditor\Renders\AbstractRender;

class Points extends AbstractRender
{
    public function draw()
    {
        //Skip calculations; dummy result after calculating points
        $points = [
            ["x" => '0', "y" => '0'],
            ["x" => '10', "y" => '0'],
            ["x" => '0', "y" => '10'],
            ["x" => '10', "y" => '10']
        ];

        if ($this->format instanceof \GraphicEditor\Formats\Points) {
            $this->format->addPoints($points);
        }
    }
}
