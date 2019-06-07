<?php
header("Content-type: image/png");

$path_font = $_SERVER['DOCUMENT_ROOT'] . "/wp-content/themes/theme_name/design/vendor/fonts/Montserrat-Medium_0.ttf";

$im    = imagecreatetruecolor(200, 200);

$white = imagecolorallocate($im, 255, 255, 255);
$grey  = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);

imagefilledrectangle($im, 0, 0, 200, 200, $grey);


$number_1 = rand(1, 100);
$number_2 = rand(1, 100);

session_start();

$_SESSION['plugin']['plugin-name']['captha_value'] = $number_1 + $number_2;

imagettftext(
    $im,                           //Ресурс изображения
    36,                            //Размер шрифта в типографских пунктах
    33,                            //Угол в градусах
    20,                            //координата x
    170,                           //координата y
    $white,
    $path_font,
    "$number_1 + $number_2 ="
);

imagepng($im);
imagedestroy($im);
