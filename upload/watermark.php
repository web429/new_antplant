<?php
// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('watermark.png');
if ($_GET['ext'] == 'png') {
    $im = imagecreatefrompng($_GET['image'].".".$_GET['ext']);
} else if($_GET['ext'] == 'jpg' || $_GET['ext'] == 'jpeg' || $_GET['ext'] == 'JPG' || $_GET['ext'] == 'JPEG') {
    $im = imagecreatefromjpeg($_GET['image'].".".$_GET['ext']);    
} else if($_GET['ext'] == 'bmp') {
    $im = imagecreatefrombmp($_GET['image'].".".$_GET['ext']);    
}

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>