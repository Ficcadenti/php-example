<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_54.html
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
		<title>sorgente: esempio_54.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$num_capitolo=capitolo("PHP e JSON.");
			paragrafo("Esempio 2 - Controllo.",$num_capitolo);
			print("<div id=\"m70\">\n");
			
			// definizione di una stringa JSON non valida
			//$j[] = "{'Sito Web': 'MrWebsmater.it'}";
			$j[] = '{"Sito Web": "MrWebsmater.it"}';


			// controllo tramite ciclo di tutti gli elementi della stringa
			foreach($j as $value)
			{
				echo "Risultato della decodifica: " . $value;
				// decodifica della stringa
				json_decode($value);
				// controllo sulla presenza di eventuali errori
				switch(json_last_error())
				{
					case JSON_ERROR_DEPTH:
					{
						echo " - superato il livello massimo per lo stack";
					}break;

					case JSON_ERROR_CTRL_CHAR:
					{
						echo " - utilizzo di caratteri non consentiti";
					}break;

					case JSON_ERROR_SYNTAX:
					{
						echo " - errore sintattico";
					}break;

					case JSON_ERROR_NONE:
					{
						echo " - Non si è verificato alcun errore";
					}break;
				}
			}

			print("</div>\n");
		?>
		
		<?php
			$num_capitolo=capitolo("info");
		?>

		<img src="./pleasewait.gif" alt="pleasewait" height="13" width="280"><br> 
		<a href="http://www.json.org/json-it.html" target="_blank">JSON</a><br>
		<a href="http://php.net/manual/en/book.json.php" target="_blank">PHP json</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>