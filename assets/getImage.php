<?php
	if (!isset($_GET['name']) || !isset($_GET['size'])) {
		echo 'Error: name and size is required.';
		exit();
	}

	$filename = './images-' . $_GET['size'] . '/' . 
			$_GET['name'] . '.png';
	if (file_exists($filename)) {
		header('Content-Type: image/png');
		readfile($filename);
	}
	else {
		$fileSource = './images-xxxhdpi/' . $_GET['name'] . '.png';
		$image = imagecreatefrompng($fileSource);

		$pixels = array(88, 132, 176, 264, 352);
		$sizes = array('mdpi', 'hdpi', 'xhdpi', 'xxhdpi', 'xxxhdpi');
		$i = array_search($_GET['size'], $sizes);

		// PERINTAH UNTUK RESIZE
		$result = imagecreatetruecolor($pixels[$i], $pixels[$i]);
		imagealphablending($result, false);
		imagesavealpha($result, true);
		//$transparent = imagecolorallocatealpha($result, 
		//		255, 255, 255, 127);
		//imagefilledrectangle($result, 0, 0, 
		//		$pixels[$i], $pixels[$i], $transparent);
		imagecopyresampled($result, $image, 0, 0, 0, 0, 
				$pixels[$i], $pixels[$i], $pixels[4], $pixels[4]);

		// PERINTAH UNTUK SIMPAN KE CACHE
		imagepng($result, $filename);

		// PERINTAH OUTPUT KE BROWSER
		header('Content-Type: image/png');
		imagepng($result);

		// PERINTAH UNTUK BERSIH2 MEMORY SERVER
		imagedestroy($image);
		imagedestroy($result);
	}
?>