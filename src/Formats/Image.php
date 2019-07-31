<?php

namespace GraphicEditor\Formats;

class Image extends AbstractFormat
{
    /**  @var int */
    private $height;

    /** @var int */
    private $width;

    /** @var array */
    private $rgb;

    /**
     * Image constructor.
     * @param int $height
     * @param int $width
     * @param array $rgb
     */
    public function __construct(int $height, int $width, array $rgb = [255, 255, 255])
    {
        $this->height = $height;
        $this->width = $width;
        $this->rgb = $rgb;
    }

    /**
     * @return mixed|resource
     */
    public function createOutput()
    {
        $this->output = $this->createCanvas();

        return $this->output;
    }

    /**
     * @return resource
     */
    private function createCanvas()
    {
        $canvas = imagecreatetruecolor($this->width, $this->height);
        $color = imagecolorallocate($canvas, $this->rgb[0], $this->rgb[1], $this->rgb[2]);

        imagefill($canvas, 0, 0, $color);

        return $canvas;
    }
}
