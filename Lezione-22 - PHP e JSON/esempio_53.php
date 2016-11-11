<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_53.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 25-10-2016    Ficcadenti Raffaele         
	# -
	#
-->
<?php
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
		print("<$h>$str</$h>\n"); // funzione definita dall'utente
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
	$sys = strtoupper(PHP_OS);
	println("OS: $sys");
	

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
		<title>sorgente: esempio_53.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$num_capitolo=capitolo("PHP e JSON.");
			paragrafo("Esempio 1 - Encode & Decode.",$num_capitolo);
			print("<div id=\"m70\">\n");
			
			// array per la codifica
			$vettore = array("albero", "ramo", "mela");

			// codifica JSON
			$stringa = json_encode($vettore);
			
			// stampa del risultato
			println($stringa);

			// definizione dell'oggetto per il parsing
			$j_obj = '[{"home": "localhost"},{"home": "raffaeleficcadenti.it"}]';
			$oggetto = json_decode($j_obj,true); //converte l'oggetto JSON in un array associativo
			var_dump($oggetto);
			// lettura dello stream JSON
			println( $oggetto[1]['home'] ); 

			$string = file_get_contents("obj1.json");
			$oggetto1 = json_decode($string);

			// lettura dello stream JSON
			println( $oggetto1->{'argomento'} ); 
			stampaArray( (array)$oggetto1->aree[0] ); 
			stampaArray( (array)$oggetto1->aree[1] ); 

			print("</div>\n");
		?>
		
		<?php
			$num_capitolo=capitolo("info");
		?>

		<a href="http://www.json.org/json-it.html" target="_blank">JSON</a><br>
		<a href="http://jsonlint.com/" target="_blank">The JSON Validator </a><br>
		<a href="http://php.net/manual/en/book.json.php" target="_blank">PHP json</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>