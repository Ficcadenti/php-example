<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_34.html
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
		<title>sorgente: esempio_34.html</title>
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

			$num_capitolo=capitolo("Ancora con gli array");
			paragrafo("each, list",$num_capitolo);
			print("<div id=\"m70\">");
			$element=each($arr);
			println($element[0]);
			println($element[1]);
			println($element["key"]);
			println($element["value"]);

			var_dump($arr);
			println();

			$arr1=array(1,2,3,4,5,6,7,8,9,10);
			list($primo,$secondo) = $arr1;
			println("primo=$primo");
			println("secondo=$secondo");

			reset($arr);

			while(list($key,$value)=each($arr))
			{
				println("key=$key");
				println("value=$value");
			}
			print("</div>");

			paragrafo("in_array",$num_capitolo);
			print("<div id=\"m70\">");
			$arr=array(
					"nome"=>"raffaele",
					"cognome"=>"ficcadenti"
						);
			$val="cognome";
			$arr_temp="arr";
			$trovato=in_array($val,$$arr_temp);


			if($trovato)
			{
				println("il valore $val è presente nell'array $$arr_temp");
			}
			else
			{
				println("il valore $val NON è presente nell'array $$arr_temp");
			}
			print("</div>");

			paragrafo("unset",$num_capitolo);
			print("<div id=\"m70\">");
			println("Elementi di \$arr1=".count($arr1));
			foreach ($arr1 as $key => $value) 
			{
				println("$key = $value");
			}
			unset($arr1[3]);
			println("Elementi di \$arr1=".count($arr1));
			foreach ($arr1 as $key => $value) 
			{
				println("$key = $value");
			}
			print("</div>");

			paragrafo("array_walk",$num_capitolo);
			print("<div id=\"m70\">");
				$array=array(10,20,30,40,50);

				println("Prima:");
				foreach ($array as $key => $value) 
				{
					println("$key = $value");
				}

				array_walk($array,"add_val",1);
				array_walk($array,"calcola_radq");

				println("Dopo:");
				foreach ($array as $key => $value) 
				{
					println("$key = $value");
				}

			print("</div>");

			paragrafo("Ordinamento array indicizzato numericamente",$num_capitolo);
			$array=array(
						array("nome"=>"S7","prezzo"=>650),
						array("nome"=>"i7","prezzo"=>500),
						array("nome"=>"p9","prezzo"=>350)
					);
			print("<div id=\"m70\">");

			println("Array originale:");
			foreach ($array as $key => $item) 
			{
				foreach ($item as $key1 => $value) 
				{
					println("$key1 = $value");
				}
				println("--------------------");
			}
			println("");

			usort($array,"comparaPrezzo");
			println("Array ordinato con comparaPrezzo():");
			foreach ($array as $key => $item) 
			{
				foreach ($item as $key1 => $value) 
				{
					println("$key1 = $value");
				}
				println("--------------------");
			}
			print("</div>");


			paragrafo("Ordinamento array associativo per valore",$num_capitolo);
			$array=array(
						"S7"=>array("colore"=>"red","prezzo"=>450),
						"i7"=>array("colore"=>"white","prezzo"=>650),
						"p9"=>array("colore"=>"gray","prezzo"=>350),
					);
			print("<div id=\"m70\">");

			println("Array originale:");
			foreach ($array as $key => $item) 
			{
				println("$key:");
				foreach ($item as $key1 => $value) 
				{
					println("$key1 = $value");
				}
				println("--------------------");
			}
			println("");

			uasort($array,"comparaPrezzo");
			println("Array ordinato con comparaPrezzo():");
			foreach ($array as $key => $item) 
			{
				println("$key:");
				foreach ($item as $key1 => $value) 
				{
					println("$key1 = $value");
				}
				println("--------------------");
			}
			print("</div>");

			paragrafo("Ordinamento array associativo per chiave",$num_capitolo);
			$array=array(
						"xxx"=>1,
						"x"=>2,
						"xxxxx"=>3,
						"xx"=>4,
						"xxxx"=>5
					);
			print("<div id=\"m70\">");

			println("Array originale:");
			foreach ($array as $key => $value) 
			{
				println("$key = $value");
			}
			println("");

			uksort($array,"comparaLenKey");
			println("Array ordinato con comparaLenKey():");
			foreach ($array as $key => $value) 
			{
				println("$key = $value");
			}
			print("</div>");

			$num_capitolo=capitolo("info");
		?>
		
		<a href="http://php.net/manual/en/function.unset.php" target="_blank">unset()</a><br>
		<a href="http://php.net/manual/en/function.array-walk.php" target="_blank">array_walk()</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>