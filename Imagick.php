<?php
function setSamplingFactors($imagePath) {

    $imagePath = "E:\\verisilicon\\project\\test_0.png";
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setImageFormat('jpg');
    $imagick->setSamplingFactors(array('2x2', '1x1', '1x1'));

    $compressed = $imagick->getImageBlob();

    
    $reopen = new \Imagick();
    $reopen->readImageBlob($compressed);

    $reopen->resizeImage(
        $reopen->getImageWidth() * 4,
        $reopen->getImageHeight() * 4,
        \Imagick::FILTER_POINT,
        1
    );
    
    header("Content-Type: image/jpg");
    echo $reopen->getImageBlob();
}

?>