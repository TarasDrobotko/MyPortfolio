<?php
require 'vendor/autoload.php';

use Intervention\Image\ImageManager;

echo get_cfg_var('upload_max_filesize');

if(isset($_POST['submit'])) {

if(is_uploaded_file($_FILES['image1']['tmp_name'])) {
    if(move_uploaded_file($_FILES['image1']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/images/'.$_FILES['image1']['name'])) {
    
                $image1 = $_FILES['image1']['name'];
    }
        else {echo 'Щось пішло не так!'; }
}

if(is_uploaded_file($_FILES['image2']['tmp_name'])) {
    if(move_uploaded_file($_FILES['image2']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/images/'.$_FILES['image2']['name'])) {
    $image2 = $_FILES['image2']['name'];
      
    }
        else {echo 'Щось пішло не так!'; }
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
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>Реалізація форми</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
<h1>Реалізація форми, яка відправляє зображення на скрипт, що обробляє їх</h1>
<form action="form.php" method="post" enctype="multipart/form-data">
    <label for="image1">Зображення 1:</label> <input type="file" name="image1" value="" id="image1">
    <label for="image2">Зображення 2:</label> <input type="file" name="image2" value="" id="image2">
    <input type="submit"  name="submit" value="Відправити зображення">
</form>
 </body>
</html>

