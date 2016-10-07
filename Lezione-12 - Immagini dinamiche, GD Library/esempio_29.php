<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_28.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 05-10-2016    Ficcadenti Raffaele         
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


	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();
?>

<hmtl>
	<head>
		<title>sorgente: esempio_28.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$num_capitolo=capitolo("Test Image GD - PHPGraphLib(PHP Graphing Library v2.31)");
		?>

		<img src="esempio_grafico_1.php" alt="Image created by a PHP script" width="500" height="300"><br>
		<img src="esempio_grafico_5.php" alt="Image created by a PHP script" width="500" height="300"><br>
		<img src="esempio_grafico_7.php" alt="Image created by a PHP script" width="1000" height="300"><br>

		<?php
			$num_capitolo=capitolo("More info");
		?>
		<a href="http://www.ebrueggeman.com/phpgraphlib/examples" target="_blank">PHPGraphLib Examples</a><br>
	</body>
</hmtl>