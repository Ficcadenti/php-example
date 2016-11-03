<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_55.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 02-11-2016    Ficcadenti Raffaele         
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
		<title>sorgente: esempio_55.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			define("EOL", "\r\n");
			$header = "MIME-Version: 1.0" . EOL;
			$header .= "Content-Type: text/html" . EOL;
			$header .= "From: raffaele.ficcadenti@asdc.asi.it";
			$object = "Prova e-mail con PHP";
			$message = "Linea 1: Questa è una prova di email<br />Linea 2: Questa è una prova di email<br />Linea 3: Questa è una prova di email";
			$destinatari = "Raffaele Ficcadenti <rficcad@e-tech.net>, Raffo <raffaele.ficcadenti@gmail.com>";


			$num_capitolo=capitolo("Inviare un e-Mail.");
			print("<div id=\"m70\">\n");
			$inviata=mail($destinatari, $object, $message, $header);
			if ($inviata) 
			{
				println("Email inviata con successo!");
			}
			else
			{
				println("Errore durante l'invio dell'email");
			}

			print("</div>\n");
		?>
		
		<?php
			$num_capitolo=capitolo("info");
		?>

		
		<a href="http://php.net/manual/en/function.mail.php" target="_blank">PHP mail</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>