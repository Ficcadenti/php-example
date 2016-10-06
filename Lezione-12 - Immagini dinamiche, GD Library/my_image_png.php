<?php
	header( "Content-type: image/gif" );
	$my_img=imagecreate(200,200);
	$red = imagecolorallocate( $my_img, 255,0,0 );
	$blue = imagecolorallocate( $my_img, 0,0,255 );
	imageline($my_img,0,0,199,199,$blue);
	imageline($my_img,0,199,199,0,$blue);
	
	imagearc($my_img,99,99,180,180,0,360,$blue);

	imagefill($my_img,199,10,$blue);
	imagefill($my_img,10,50,$blue);
	
	imagegif($my_img);
	imagedestroy($my_img);
?>