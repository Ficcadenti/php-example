<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_49.html
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
	setcookie("nome_cookie","Raffaele",time()+3600,"/","localhost",0); //cookie di 1h
	
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
		<title>sorgente: esempio_49.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$num_capitolo=capitolo("Debugging.");
			paragrafo("Esempio 2.",$num_capitolo);

			print("<div id=\"m70\">");
			print("</div>");
		?>
		
		<form id="m70" action="<?php print($_SERVER["PHP_SELF"]) ?>" method="POST">
			Inserisci il nome del file: <input type="text" name="nfile">
			<input type="submit" value="Vedi sorgente">
		</form>

		<?php
			error_reporting(E_ERROR| E_WARNING | E_PARSE );
			println("pippo=$pippo");

			error_reporting(E_ERROR| E_WARNING | E_PARSE | E_NOTICE);
			println("pluto=$pluto");
			

			if (!isset($PARAMS["nfile"])) 
			{
				println("Benvenuto su quest'esempio !!!!");
			}
			else
			{
				show_source($PARAMS["nfile"]) or println("Impossibile aprire il file: '$PARAMS[nfile]'");
			}
		?>

		<?php

			$num_capitolo=capitolo("info");
		?>

		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>