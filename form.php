<?php
require 'vendor/autoload.php';

use Intervention\Image\ImageManager;
// array of allowable values of file
$types = array('image/gif', 'image/png', 'image/jpeg');
// max size file
$size = 4000000;
if(isset($_POST['submit'])) {
if (!in_array($_FILES['image1']['type'], $types) OR !in_array($_FILES['image2']['type'], $types))
die('This type don\'t allow!');

if ($_FILES['image1']['size'] > $size OR $_FILES['image2']['size'] > $size)
die('Too big size of file!');

if(is_uploaded_file($_FILES['image1']['tmp_name'])) {
    
    $image = $_FILES['image1']['tmp_name'];
    $newloc = $_SERVER['DOCUMENT_ROOT'].'/images/'.$_FILES['image1']['name'];
    
    if(move_uploaded_file($image, $newloc)) {
                $image1 = $_FILES['image1']['name'];
    }
        else {echo 'Something went wrong!'; }
}
else { 
    echo 'Image 1 isn\'t uploaded!';
}

if(is_uploaded_file($_FILES['image2']['tmp_name'])) {
    
    $image = $_FILES['image2']['tmp_name'];
    $newloc = $_SERVER['DOCUMENT_ROOT'].'/images/'.$_FILES['image2']['name'];
    
    if(move_uploaded_file($image, $newloc)) {
    $image2 = $_FILES['image2']['name'];
    }
        else {echo 'Something went wrong!'; }
}
else { 
    echo 'Image 2 isn\'t uploaded!';
}

if($image1 && $image2) {
// create an image manager instance with favored driver
$manager = new ImageManager(array('driver' => 'imagick'));

//resize and blur image1
$image = $manager->make('images/'.$image1)->resize(1024, 768)->blur(5);
//resize image2
$logo = $manager->make('images/'.$image2)->resize(320, 240);
// paste image2 and save
$image->insert($logo, 'center')->save('images/changed_'.$image1);
}
}



