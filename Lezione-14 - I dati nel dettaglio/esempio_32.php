<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_32.html
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

	function printArray($arr)
	{
		if(!is_array($arr))
		{
			$arr=(array)$arr;
		}
		foreach ($arr as $key => $value) 
		{
			println("key=>$value");
		}
	}

	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();

?>

<hmtl>
	<head>
		<title>sorgente: esempio_32.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$val1=456;
			println(gettype($val1));

			$val2=4.56;
			println(gettype($val2));

			println((integer)$val2);
			println($val2);

			settype($val2,"integer");
			println($val2);

			$val3="Ciao Raffaele e Valeria";
			$arr_val3=(array)$val3;
			println($arr_val3[0]);

			$obj_val3=(object)$val3;
			var_dump($obj_val3);
			println();
			println($obj_val3->scalar);

			$arr=array(
					"via"=>"via castellamonte",
					"citta"=>"roma"
				);
			$obj_arr=(object)$arr;

			var_dump($obj_arr);
			println();
			println($obj_arr->via);
			println($obj_arr->citta);

			class point
			{
				var $x;
				var $y;
				var $z;

				function point($x,$y,$z=0)
				{
					$this->x=$x;
					$this->y=$y;
					$this->z=$z;
				}
			}

			$p=new point(5,7);
			$arr_p=(array)$p;
			var_dump($arr_p);
			println();
			foreach ($arr_p as $key => $value) 
			{
				println("arr_p[$key]=$value");
			}

			$str="1ciao";
			$str++;
			$val4=(int)$str;
			println($str);
			println($val4);

			$str1="ciao";
			$str1+=1;
			$val5=(int)$str1;
			println($str1);
			println($val5);

			$var5="10.4ciao";

			println("doubleval($var5)=".doubleval($var5));
			println("intval($var5)=".intval($var5));
			println("strval($var5)=".strval($var5));

			printArray(array(1,2,3,4));
			println();
			printArray(1);
			println();
			printArray($p);
			println();
			printArray($obj_arr);
			println();

			$var6=0;

			if(isset($var6))
			{
				println("\$var6 e' settata.");
			}
			else
			{
				println("\$var6 NON e' settata.");
			}

			if(empty($var6))
			{
				println("\$var6 e' vuota.");
			}
			else
			{
				println("\$var6 NON e' vuota.");
			}

		?>
	</body>
</hmtl>