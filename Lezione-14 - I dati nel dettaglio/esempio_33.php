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

	function add_val(&$item,$key,$val)
	{
		$item=$item+$val;
	}

	function calcola_radq(&$item,$key)
	{
		$item=sqrt($item);
	}

	function comparaPrezzo($a,$b)
	{
		$ret=1;
		if($a["prezzo"]==$b["prezzo"])
		{
			$ret=0;
		}
		else if($a["prezzo"]<$b["prezzo"])
		{
			$ret=-1;
		}

		return $ret;
	}

	function comparaLenKey($a,$b)
	{
		$ret=1;
		if(strlen($a)==strlen($b))
		{
			$ret=0;
		}
		else if(strlen($a)<strlen($b))
		{
			$ret=-1;
		}

		return $ret;
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

			$num_capitolo=capitolo("che tipo sei?");
			paragrafo("is_(bool,array,integer,double,string,object) !!!!",$num_capitolo);
			print("<div id=\"m70\">");
			switch(true)
			{
				case is_bool($var):
					{
						print("\$var=$var è un bool.");
					}
					break;

				case is_array($var):
					{
						print("\$var è un array.");
					}
					break;

				case is_integer($var):
					{
						print("\$var è un integer.");
					}
					break;

				case is_double($var):
					{
						print("\$var è un double.");
					}
					break;

				case is_string($var):
					{
						print("\$var è una string.");
					}
					break;

				case is_object($var):
					{
						print("\$var è un object.");
					}
					break;

				default:
					{
						print("non sò riconoscere \$var !!!!<br>");
					}
					break;
			}
			print("</div>");
			println();

			$num_capitolo=capitolo("info");
		?>

		<a href="http://php.net/manual/en/function.in-array.php" target="_blank">in_array()</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>