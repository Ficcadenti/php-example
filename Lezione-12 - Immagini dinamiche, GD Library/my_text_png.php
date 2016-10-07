<?php
	header( "Content-type: image/gif" );
	$my_img=imagecreate(800,400);
	$white = imagecolorallocate( $my_img, 255,255,255 );
	$blue = imagecolorallocate( $my_img, 0,0,255 );
	$red = imagecolorallocate( $my_img, 255,0,0 );
	

	$font="../assets/fonts/Windsong.ttf";
	$font1="../assets/fonts/Pacifico.ttf";
	$text="(C) Ficcadenti Raffaele";
	
	imageTTFtext($my_img,50,0,20,100,$red,$font,$text);
	imageTTFtext($my_img,50,0,20,200,$blue,$font1,$text);
	
	imagegif($my_img);
	imagedestroy($my_img);
?>