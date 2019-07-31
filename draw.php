<?php

use GraphicEditor\Renders\RenderFactory;
use GraphicEditor\Shapes\ShapeFactory;
use GraphicEditor\Formats\Image;
use GraphicEditor\GraphicEditor;

require_once "vendor/autoload.php";

//Sample request body
/* Key: shapes
   Value: {"shapes" : [
            [
                "type": "circle",
                "params": [
                    "x": "100",
                    "y": "200",
                    "radius": "100",
                    "fillColor": [ "200", "123", "122" ]
                ]
          ]
]}
*/

$request = $_POST['shapes'];

if (isset($request)) {

    $data = json_decode($request, true);

    try {
        $graphicEditor = new GraphicEditor(new ShapeFactory(), new RenderFactory());

        $graphicEditor->import($data['shapes']);

    } catch (Exception $e) {
        http_response_code(400);
    }

    http_response_code(200);

    /** Image Output */
    $imageBinary = $graphicEditor->run(new Image(600, 400));

    header('Content-Type: image/png');
    imagepng($imageBinary);
    imagedestroy($imageBinary);
}
