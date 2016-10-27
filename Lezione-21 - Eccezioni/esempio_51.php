<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_51.html
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
		<title>sorgente: esempio_51.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$num_capitolo=capitolo("Eccezioni.");
			paragrafo("Esempio.",$num_capitolo);
			print("<div id=\"m70\">\n");

			define("MAX_LUNGHEZZA", 20);
			function registraUtente()
			{
				// ... codice per registrare l'utente nel database
				$registrato = true; // Simuliamo una registrazione avvenuta con successo
				if ($registrato)
				{
					println("Utente registrato con successo!");
				}
				else
				{
					throw new Exception("Impossibile registrare l'utente!",3);
				}
			}
			/* --- Inizio dati Utente --- */
			$nome_utente = "RaffaeleFiccadentiValeria";
			$pass_utente = "supercalifragilistichespiralidoso";
			/* --- Fine dati Utente --- */

			try
			{
				if (strlen($nome_utente) > MAX_LUNGHEZZA)
				{
					throw new Exception("Nome utente troppo lungo!",1);
				}
				if (strlen($pass_utente) > MAX_LUNGHEZZA)
				{
					throw new Exception("Password troppo lunga!",2);
				}

				registraUtente();
			}
			catch (Exception $exc)
			{
				echo $exc->getLine()." - Errore (".$exc->getCode()."): " . $exc->getMessage() . "<br />\n\n";
			}

			print("</div>\n");
		?>
		
		<?php
			$num_capitolo=capitolo("info");
		?>

		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>