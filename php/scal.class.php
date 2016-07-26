<?php 

class Scaling
{
	public function Skalowanie($image, $nick, $album, $max_height = 0, $max_width = 0)
       {
           $dir = opendir($album);
           while($file = readdir($dir))
           { 
             if($file==$image)
              {
                $foto = $album.'/'.$file;
                $foto_min = $nick.'/'.$file;
                $check = GetImageSize($foto);
                $width = $check[0];
                $height = $check[1];
                $mime = $check[2];
                if($width>$height) 
				{
                      $factor = $width/$height;
                      $x_scale = $max_width;
                      $y_scale= floor($x_scale/$factor);                  
                 } 
				 else 
				 {
                      $factor = $height/$width;
                      $y_scale = $max_height;
                      $x_scale= floor($y_scale/$factor);
                  }
                switch($mime) 
				{
                case 1:
                    $im = @ImageCreateFromGif($foto);
                break;
                case 2:
                    $im = @ImageCreateFromJpeg($foto);
                break;
                case 3:
                    $im = @ImageCreateFromPng($foto);
                break;
                 }
                $thumb = ImageCreateTrueColor($x_scale,$y_scale);
                ImageCopyResampled($thumb, $im, 0, 0, 0, 0, $x_scale, $y_scale, $width, $height);                    
                switch($mime) 
				{
                case 1:
                    ImageGIF($thumb, $foto_min);
                break;
                case 2:
                    ImageJPEG($thumb, $foto_min, 80);
                break;
                case 3:
                    ImagePNG($thumb, $foto_min, 2);
                break;
                }
                  imagedestroy($im);
                  imagedestroy($thumb);
                  //echo '<b>'.$file.'</b> - ok: miniaturka zostala stworzona!<br />';
            }
        }
                 closedir($dir);
   }
} 



?>