<?php
session_start();

function create_captcha($text)
{

$width = 200;
$height = 100;
$fontfile = "Roboto-Regular.ttf";

$image = imagecreatetruecolor($width, $height);

$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

imagefill($image, 0, 0, $white);
imagettftext($image, 30, rand(-17,17), $width/5, 64, $black, $fontfile, $text);

$warped_image = imagecreatetruecolor($width, $height);
imagefill($warped_image, 0, 0, imagecolorallocate($warped_image, 255, 255, 255));

for ($x=0; $x < $width; $x++) {
	for ($y=0; $y < $height; $y++) {

		$index = imagecolorat($image, $x, $y);
		$color_comp = imagecolorsforindex($image, $index);

		$color = imagecolorallocate($warped_image, $color_comp['red'], $color_comp['green'], $color_comp['blue']);

		$imageX = $x;
		$imageY = $y + sin($x / 10) * 10;

		imagesetpixel($warped_image, $imageX, $imageY, $color);


	}
}

$path = "captcha.jpg";
imagejpeg($warped_image, $path);
imagedestroy($warped_image);
imagedestroy($image);

return $path;

}

$filename = session_id();

if(count($_POST)>0){

	$number = file_get_contents($filename);
	if($_POST['number'] == $number)
	{
		echo "Correct.";
		//redirect
	}else{
		echo "Incorrect. Please try again.";
		$text = rand(10000,99999);

		$captcha = create_captcha($text);
		file_put_contents($filename, $text);
	}
}else{
	$text = rand(10000,99999);
	$captcha = create_captcha($text);
	file_put_contents($filename, $text);
}
//72-85 to be excluded later
?>

<!DOCTYPE html>
<html>
<head>
<title>FOR TESTING</title>
</head>
<body>
<form method="post">
<input type="text" name="number" placeholder="Enter Captcha"><br>
<input type="submit" value="OK">
</form>
</br>
<img src="captcha.jpg">
</body>
</html>
