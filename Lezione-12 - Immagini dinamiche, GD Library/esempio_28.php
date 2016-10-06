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

	function showEnvironment()
	{
		$env=array("HTTP_REFERER","HTTP_USER_AGENT","HTTP_HOST","QUERY_STRING","PATH_INFO","PHP_SELF","GATEWAY_INTERFACE","SERVER_SOFTWARE","REMOTE_ADDR");
		foreach ($env as $value) 
		{
			if(isset($_SERVER[$value]))
			{
				println("\$_SERVER[$value]=$_SERVER[$value]");
			}
			else
			{
				println("\$_SERVER[$value] not set !!!");
			}
		}
		if(isset($_SERVER["REMOTE_HOST"]))
		{
			println("\$_SERVER[REMOTE_HOST]=$_SERVER[REMOTE_HOST]");
		}
		else if(isset($_SERVER["REMOTE_ADDR"]))
		{
			println("\$_SERVER[REMOTE_HOST]=".gethostbyaddr($_SERVER["REMOTE_ADDR"]));	
		}else
		{
			println("\$_SERVER[REMOTE_HOST]=unknown");
		}

		return true;
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
			$num_capitolo=capitolo("Test Image GD");
		?>

		<img src="my_image_png.php" alt="Image created by a PHP script" width="200" height="80"><br>
		<img src="esempio_grafico_1.php" alt="Image created by a PHP script" width="500" height="300"><br>
		<img src="esempio_grafico_5.php" alt="Image created by a PHP script" width="500" height="300"><br>
		<img src="esempio_grafico_7.php" alt="Image created by a PHP script" width="1000" height="300"><br>

		<?php
			$num_capitolo=capitolo("More info");
		?>
		<a href="http://www.ebrueggeman.com/phpgraphlib/examples" target="_blank">PHPGraphLib Examples</a><br>
	</body>
</hmtl>