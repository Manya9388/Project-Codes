<?php
// Take a screenshot
$screenshot = imagegrabscreen();

// Get the dimensions of the screenshot
$width = imagesx($screenshot);
$height = imagesy($screenshot);

// Calculate the coordinates and dimensions of the center rectangle
$crop_width = 700;
$crop_height = 550;
$crop_x = ($width - $crop_width);
$crop_y = ($height - $crop_height);

// Crop the screenshot
$cropped = imagecrop($screenshot, ['x' => $crop_x, 'y' => $crop_y, 'width' => $crop_width, 'height' => $crop_height]);

// Save the cropped screenshot as a PNG file
imagepng($cropped, 'cropped.png');

// Set the content type of the response to "image/png"
header('Content-Type: image/png');

// Force the download of the file
header('Content-Disposition: attachment; filename="cropped.png"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize('cropped.png'));
readfile('cropped.png');

// Clean up
imagedestroy($screenshot);
imagedestroy($cropped);
?>