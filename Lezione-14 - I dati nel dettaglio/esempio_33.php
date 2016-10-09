<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_33.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 06-10-2016    Ficcadenti Raffaele         
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

	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();

?>

<hmtl>
	<head>
		<title>sorgente: esempio_33.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$arr=array(
					"via"=>"via castellamonte",
					"citta"=>"roma"
				);
			$obj_arr=(object)$arr;
			$var=$arr;

			println(is_bool($var));

			switch(true)
			{
				case is_bool($var):
					{
						print("\$var=$var un bool.");
					}
					break;

				case is_array($var):
					{
						print("\$var un array.");
					}
					break;

				case is_integer($var):
					{
						print("\$var un integer.");
					}
					break;

				case is_double($var):
					{
						print("\$var un double.");
					}
					break;

				case is_string($var):
					{
						print("\$var una string.");
					}
					break;

				case is_object($var):
					{
						print("\$var un object.");
					}
					break;

				default:
					{
						print("ne SI e ne NO !!!!<br>");
					}
					break;
			}
		?>
	</body>
</hmtl>