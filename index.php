<?php //echo $_SERVER['DOCUMENT_ROOT'];
//include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

// create an image manager instance with favored driver
$manager = new ImageManager(array('driver' => 'imagick'));

//resize and blur image city.jpg
$image = $manager->make('images/city.jpg')->resize(1024, 768)->blur(5);
//resize image logo.png
$logo = $manager->make('images/logo.png')->resize(320, 240);
// paste image logo.png and save
$image->insert($logo, 'center')->save('images/city_with_logo.jpg');