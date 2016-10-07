<?php
	$PARAMS=array();
	
	if($_SERVER["REQUEST_METHOD"]=="GET")
	{
		$PARAMS=$_GET;
	}
	else if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$PARAMS=$_POST;
	}

	function centerText($image,$fontsize,$larghezza,$altezza,$color,$font,$text)
	{
		$nome_file="test_font.txt";
		$imgXcenter=$larghezza/2;
		$imgYcenter=$altezza/2;
		$text_larghezza=0;
		$text_altezza=0;

		while(1)
		{
			$bbox=imagettfbbox($fontsize,0,$font,$text);
			$text_larghezza=abs($bbox[2]);
			$text_corpo_altezza=abs($bbox[7])-2;
			if($text_larghezza < $larghezza-20)
			{
				break;
			}
			$fontsize--;
		}
		
		$box=imageTTFtext($image,$fontsize,0,(int)($imgXcenter-($text_larghezza/2)),(int)($imgYcenter+($text_corpo_altezza/2)),$color,$font,$text);

		if($box)
		{
			$fp=fopen($nome_file,"w");
			if (flock($fp,LOCK_EX))
			{
				fputs($fp,"Coordinate box:\n");
				fputs($fp,"$box[0],$box[1]\n");
				fputs($fp,"$box[2],$box[3]\n");
				fputs($fp,"$box[4],$box[5]\n");
				fputs($fp,"$box[6],$box[7]\n");
				flock($fp,LOCK_UN);
			}
			fclose($fp);
		}
		return true;
	}

	header( "Content-type: image/gif" );
	$larghezza=800;
	$altezza=400;
	
	$my_img=imagecreate($larghezza,$altezza);
	$white = imagecolorallocate( $my_img, 255,255,255 );
	$blue = imagecolorallocate( $my_img, 0,0,255 );
	$red = imagecolorallocate( $my_img, 255,0,0 );
	
	$fontsize=50;


	$font1="../assets/fonts/Windsong.ttf";
	$font="../assets/fonts/Pacifico.ttf";
	
	if(!isset($PARAMS["text"]))
	{
		$text="testo non inserito";
	}
	else
	{
		$text=$PARAMS["text"];
	}
	
	imagerectangle($my_img, 0, 0, $larghezza-1, $altezza-1, $blue);
	
	centerText($my_img,$fontsize,$larghezza,$altezza,$blue,$font,$text);

	
	imagegif($my_img);
	imagedestroy($my_img);
?>