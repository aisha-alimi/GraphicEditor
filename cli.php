<?php

use GraphicEditor\Renders\RenderFactory;
use GraphicEditor\Shapes\ShapeFactory;
use GraphicEditor\Formats\Image;
use GraphicEditor\Formats\Points;
use GraphicEditor\GraphicEditor;

include_once "vendor/autoload.php";


$shapes = [
    [
        'type'   => 'circle',
        'params' => [
            'x' => 100,
            'y' => 200,
            'radius' => 100,
            'fillColor' => [200, 123, 122],
        ]
    ],
    [
        'type'   => 'circle',
        'params' => [
            'x' => 200,
            'y' => 150,
            'radius' => 100,
            'fillColor' => [100, 200, 254],
            'borderSize' => 7,
        ]
    ],
    [
        'type' => 'square',
        'params' => [
            'x' => 50,
            'y' => 360,
            'side' => 80,
            'fillColor' => [110, 30, 10]
        ]
    ],
    [
        'type' => 'square',
        'params' => [
            'x' => 250,
            'y' => 400,
            'side' => 100,
            'borderSize' => 5,
            'borderColor' => [200, 0, 0]
        ]
    ]
];



try {
    $graphicEditor = new GraphicEditor(new ShapeFactory(), new RenderFactory());

    $graphicEditor->import($shapes);

} catch (Exception $e) {
    echo $e->getMessage();
}

/** Image Output */
$imageBinary = $graphicEditor->run(new Image(600, 400));
imagepng($imageBinary, 'shapes.png');
echo "Image: shapes.png saved!" . PHP_EOL;

/** Array Of Points Output */
$pointsArray = $graphicEditor->run(new Points());
print_r($pointsArray);
