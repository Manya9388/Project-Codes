<?php
// Take a screenshot
$screenshot = imagegrabscreen();

// Save the screenshot as a PNG file
imagepng($screenshot, 'screenshot.png');

// Set the content type of the response to "image/png"
header('Content-Type: image/png');

// Force the download of the file
header('Content-Disposition: attachment; filename="screenshot.png"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize('screenshot.png'));
readfile('screenshot.png');

// Clean up
imagedestroy($screenshot);
?>