<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_37.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 17-10-2016    Ficcadenti Raffaele         
	# -
	#
-->
<?php
	date_default_timezone_set('UTC');
	setcookie("nome_cookie","Raffaele",time()+3600,"/","localhost",0); //cookie di 1h
	setcookie("session_id","123456",0); //cookie di sessione

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

	function stampaArray($str_serach,$str,$arr)
	{
		printf("Stringa di partenza : %s<br>",$str);
		printf("Espressione regolare: %s<br>",$str_serach);
		printf("Risultato: <br>");
		foreach ($arr as $key => $value) 
		{
			printf("-------------------------------<br>");
			if(is_array($value))
			{
				foreach ($value as $key1 => $value1) 
				{
					printf("Elemento[%d][%d] => %s<br>",$key,$key1,$value1);		
				}
			}
			else
			{
				printf("Elemento[%d] => %s<br>",$key,$value);
			}
			printf("-------------------------------<br>");
		}
		println();
	}

?>

<hmtl>
	<head>
		<title>sorgente: esempio_37.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			
			$num_capitolo=capitolo("Cookie");
			print("<div id=\"m70\">");
			
				if(isset($_COOKIE['nome_cookie']))
				{
					$nome=$_COOKIE['nome_cookie'];
					println("nome_cookie=$nome");
				}
				else
				{
					println("Cokie non settato");
				}

				if(isset($_COOKIE['session_id']))
				{
					$session_id=$_COOKIE['session_id'];
					println("session_id=$session_id");
				}
				else
				{
					println("Cokie non settato");
				}
			
			print("</div>");
			
			$num_capitolo=capitolo("info");
		?>

		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>