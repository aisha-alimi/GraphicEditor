# GraphicEditor

A service for a simple app called “Graphic Editor”. The service draws geometric shapes (circle, square, rectangle, ellipse, etc). There should be possibility to add any other shape in the service fast, easy and with minimum code changes. 


## Installation

- Navigate to project directory
- run `composer install`


## Usage

- CLI 
    - run `php cli.php`
    - Outputs
    	- Image (saved as shapes.png)
    	- Array of Points

- ENDPOINT
	- Start php server 
	- Send a POST request to {HOST}/draw.php
		- Sample request body
		- Key: shapes;
   		  Value: {"shapes" : [
				    {
				        "type": "circle",
				        "params": {
				            "x": "100",
				            "y": "200",
				            "radius": "100",
				            "fillColor": [
				                "200",
				                "123",
				                "122"
				            ]
				        }
				    }
				]}
	- Output
		- Image
