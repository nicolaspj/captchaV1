<?php
session_start();

function generateCaptchaText($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateCaptchaImage($text) {
    ob_start();
$font = '/usr/share/fonts/arial.ttf';
$image = imagecreatetruecolor(200, 80);
$backgroundColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, 200, 80, $backgroundColor);
$fontSize = 20;
$angle = 0;
$box = imagettfbbox($fontSize, $angle, $font, $text);
$x = (200 - $box[2]) / 2;
$y = (80 - $box[5]) / 2;
imagettftext($image, $fontSize, $angle, $x, $y, $textColor, $font, $text);
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
ob_end_flush();
}

$captchaText = generateCaptchaText();
$_SESSION['captcha'] = $captchaText;
generateCaptchaImage($captchaText);
?>
