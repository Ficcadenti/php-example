<?php
	$my_img=imagecreate(200,200);
	$background = imagecolorallocate( $my_img, 0, 123, 255 );
	
	//imagestring( $my_img, 4, 30, 25, "thesitewizard.com", $text_colour );
	//imagesetthickness ( $my_img, 5 );
	//imageline( $my_img, 30, 45, 165, 45, $line_colour );


	header( "Content-type: image/gif" );
	imagegif($my_img);
	imagedestroy( $my_img );
?>