<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_35.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 11-10-2016    Ficcadenti Raffaele         
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


	if(isset($PARAMS["rosso"]))
	{
		$red=$PARAMS["rosso"];
		$green=$PARAMS["verde"];
		$blue=$PARAMS["blu"];
	}else
	{
		$red=0;
		$green=0;
		$blue=0;
	}

	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();

?>

<hmtl>
	<head>
		<title>sorgente: esempio_35.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$num_capitolo=capitolo("Stringhe");
			$num=463;

			print("<div id=\"m70\">");
			printf("Il capitolo attuale è: %b<br>",$num_capitolo);
			printf("Decimale: %d<br>",$num);
			printf("Binario: %b<br>",$num);
			printf("Double: %f<br>",$num);
			printf("Ottale: %o<br>",$num);
			printf("Stringa: %s<br>",$num);
			printf("Esadecimale (minuscolo): %x<br>",$num);
			printf("Esadecimale (maiuscolo): %X<br>",$num);
			
			print("</div>");
			$num_capitolo=capitolo("Colori");
		?>
		<form id="m70" action="<?php print($_SERVER["PHP_SELF"]) ?>" method="POST">
			<input type="range" name="rosso" min="0" max="255" step="1" <?php print("value=\"$red\"") ?>>Rosso<br>
			<input type="range" name="verde" min="0" max="255" step="1" <?php print("value=\"$green\"") ?>>Verde<br>
			<input type="range" name="blu" min="0" max="255" step="1" <?php print("value=\"$blue\"") ?>>Blu<br>
			<input type="submit" value="Go!">
		</form>
		
		<?php
			print("<div id=\"m70\">");
			printf("RGB(%d,%d,%d): <font color=\"#%02x%02x%02x\">#%02X%02X%02X</font><br>",$red,$green,$blue,$red,$green,$blue,$red,$green,$blue);
			print("</div>");
			$num_capitolo=capitolo("info");
		?>
		<a href="http://php.net/manual/it/function.printf.php" target="_blank">PHP printf()</a><br>
		<a href="http://php.net/manual/it/function.sprintf.php" target="_blank">PHP sprintf()</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>