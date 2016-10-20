<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_41.html
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
		<title>sorgente: esempio_41.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$var1=10;
			$var2=20;
			
			if (isset($PARAMS["prodotti"])) 
			{
				$prodotti=$PARAMS["prodotti"];
			}
			else
			{
				$prodotti=array();
			}
	
			$num_capitolo=capitolo("Sessioni");
			print("<div id=\"m70\">");
			$_SESSION['var1'] = $var1;
			$_SESSION['var2'] = $var2;
			$_SESSION['var2'] = 50;
			$_SESSION['prodotti'] = $prodotti;
			println("Benvenuto, il tuo session_id è: ".session_id());
			println("Session encode: ".session_encode());
			println("Session path: ".session_save_path());

			
			print("</div>");
			
			$num_capitolo=capitolo("info");
		?>

		<form action="<?php print($_SERVER["PHP_SELF"]) ?>" method="POST">
			<select name="prodotti[]" multiple size=3>
				<option>HD 3GB</option>
				<option>microSD 128GB</option>
				<option>Libro PHP</option>
			</select>
			<br>
			<input type="submit" value="Ordina!">
		</form>

		<a href="http://www.html.it/articoli/sessioni-php-cosa-sono-come-si-usano-1/" target="_blank">Sessioni HTML.it<span class="dotcom">.com</span></a><br>
		<a href="http://php.net/manual/en/ref.session.php" target="_blank">PHP Sessioni<span class="dotcom">.com</span></a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>