<?php
class Image{

    static function resize($image, $width, $height){
          $info = pathinfo($image);
          $dest = $info['dirname'] . '/' . $info['filename'] . "_$width" . "x$height" . ".jpg";
          if(file_exists($dest)){
             return '<img src="' . $dest . '">';
          }
          require_once 'imagine.phar';
          $imagine = new Imagine\Gd\Imagine();
          $size = new Imagine\Image\Box($width,$height);
          $imagine->open($image)->thumbnail($size, 'outbound')->save($dest);
          return '<img src="' . $dest . '">';
    }
	
    static function mosaic($directory, $perLine, $width, $height){
        $dest = $directory . '/mosaic.jpg';
        if(file_exists($dest) and time() - filemtime($dest) > 86400){
			unlink ($dest);
        }
		
        $images = glob($directory . '/*-134x90.jpg');
        require_once 'imagine.phar';

        // On crée une mosaic vide
        $imagine = new Imagine\Gd\Imagine();
        $size = new Imagine\Image\Box($width * ceil( count($images) / $perLine), $perLine * $height);
        $thumbsize = new Imagine\Image\Box($width, $height);
        $mosaic = $imagine->create($size);

        foreach($images as $k => $image){
            if(!strpos($image, 'mosaic')){
                $x = floor($k / $perLine) * $width;
                $y = $k % $perLine * $height;
                $point = new Imagine\Image\Point($x, $y);
                $thumb = $imagine->open($image)->thumbnail($thumbsize, 'outbound');
                $mosaic->paste($thumb,  $point);
            }
        }
		$aplat = $imagine->create($size, new Imagine\Image\Color('000000', 30));
        $mosaic->paste($aplat, new Imagine\Image\Point(0,0));
        $mosaic->save($dest);
		
        return $dest;
		
    }
}