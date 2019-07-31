<?php

namespace GraphicEditor\Formats;

class Points extends AbstractFormat
{
    /**
     * @return mixed
     */
    public function createOutput()
    {
        return $this->output ?? [];
    }

    /**
     * @param array $points
     */
    public function setPoints(array $points)
    {
        $this->output = $points;
    }
}
