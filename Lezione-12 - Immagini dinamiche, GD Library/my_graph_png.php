<?php 
	header( "Content-type: image/gif" );
	$Incremento = 47; 
	$Immagine = imagecreate(800, 500);// crea immagine

	imagecolorallocate($Immagine, 200, 200, 0); // sfondo


	imagegif($Immagine);
	imagedestroy($Immagine);
?>