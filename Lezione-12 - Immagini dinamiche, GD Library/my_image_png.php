<?php
	header( "Content-type: image/gif" );
	$my_img=imagecreate(200,200);
	$red = imagecolorallocate( $my_img, 255,0,0 );
	$blue = imagecolorallocate( $my_img, 0,0,255 );
	$green = imagecolorallocate( $my_img, 0,255,0 );
	$yellow = imagecolorallocate( $my_img, 255, 255, 0 );
	$white = imagecolorallocate( $my_img, 255,255,255 );
	$points = array(
			19,19,
			100,0,
			179,19,
			200,100,
			179,179,
			100,200,
			19,179,
			0,100,
			19,19);
	
	imageline($my_img,0,0,199,199,$blue);
	imageline($my_img,0,199,199,0,$blue);
	
	imagearc($my_img,99,99,180,180,0,360,$blue);

	imagefill($my_img,199,10,$blue);
	imagefill($my_img,10,50,$blue);
	
	imagerectangle($my_img,19,19,179,179,$green);

	imagefill($my_img,90,100,$green);
	imagefill($my_img,110,100,$green);

	imagefilledrectangle($my_img,49,49,149,149,$yellow);

	imagepolygon($my_img,$points,count($points)/2,$white);
	imagecolortransparent($my_img,$yellow);

	imagegif($my_img);
	imagedestroy($my_img);
?>