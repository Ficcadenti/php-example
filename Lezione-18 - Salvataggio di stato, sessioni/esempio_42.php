<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_42.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 19-10-2016    Ficcadenti Raffaele         
	# -
	#
-->
<?php
	$path_parts=pathinfo($_SERVER['SCRIPT_FILENAME']);
	session_save_path(realpath($path_parts["dirname"]));
	session_start();
	date_default_timezone_set('UTC');
	
	print("<br>");

	if( (include("../assets/lib/my_lib.php")) == 'success' ) 
	{
		println("Include \"my_lib.php\" ok. !!!!");
		println();
	}
	else
	{
		include("../assets/lib/my_lib_test.php");
	}

	function printH($h,$str)
	{
		print("<$h>$str</$h>"); // funzione definita dall'utente
	}

	function capitolo($str) /* utilizzo di variabili statiche */
	{
		static $num_capitolo = 0;
		$num_capitolo++;
		printH("h1","$num_capitolo. $str");
		return $num_capitolo;
	}

	function paragrafo($str,$cap) /* utilizzo di variabili statiche */
	{
		static $num_paragrafo = 0;
		$num_paragrafo++;
		printH("h2","$cap.$num_paragrafo. $str");
	}

	function stampaErrorre($type,$str)
	{
		echo "<font color=\"red\">$type : $str </font><br>";
	}
	function str_bool($val)
	{
		$str="false";
		if($val>0) $str="true";
		return $str;
	}

	$PARAMS=array();
	
	if($_SERVER["REQUEST_METHOD"]=="GET")
	{
		$PARAMS=$_GET;
	}
	else if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$PARAMS=$_POST;
	}


	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();

	function stampaArray($arr)
	{
		foreach ($arr as $key => $value) 
		{
			println("$key => $value");		
		}
	}

?>

<hmtl>
	<head>
		<title>sorgente: esempio_42.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$num_capitolo=capitolo("Read sessioni");
			$spath=realpath(dirname($_SERVER['DOCUMENT_ROOT']));
			print("<div id=\"m70\">");
				
			$var1=$_SESSION['var1'];
			$var2=$_SESSION['var2'];
			$prodotti=$_SESSION['prodotti'];
			println("Benvenuto il tuo session_id è: ".session_id());
			println("var1=$var1; var2=$var2");
			println("Session path: ".$spath);
			println("Nel tuo carrello ci sono:");
			stampaArray($prodotti);
			var_dump($_SESSION);
			$data_orig=session_encode();
			println();

			unset($_SESSION['prodotti']);

			$data=session_encode();
			println("sessione=$data");

			session_decode($data);
			println();
			var_dump($_SESSION);

			if (isset($_SESSION["prodotti"])) 
			{
				$prodotti1=$_SESSION["prodotti"];
			}
			else
			{
				$prodotti1=array();
			}
			stampaArray($prodotti1);
			session_decode($data_orig);
			print("</div>");
			
			
			session_destroy();
			$num_capitolo=capitolo("info");
		?>

		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>