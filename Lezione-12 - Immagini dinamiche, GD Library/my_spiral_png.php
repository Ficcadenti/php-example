<?php 
	header( "Content-type: image/gif" );
	$Incremento = 47; 
	$Immagine = imagecreate(500, 500);// crea immagine

	imagecolorallocate($Immagine, 200, 200, 200); // sfondo

	$Verde = imagecolorallocate($Immagine, 0, 255, 0); // verde, colore della spirale

	// valori di partenza
	$Raggio = 0; 
	$AngoloSpirale = 0; 


	while($Raggio <= 500 ) // loop che crea la spirale
	{
	        // Disegna gli archi
		imagearc($Immagine, 250, 250, $Raggio, $Raggio, $AngoloSpirale-$Incremento, $AngoloSpirale, $Verde);
		$AngoloSpirale += $Incremento;
		$Raggio++;   
	}

	imagegif($Immagine);
	imagedestroy($Immagine);
?>