<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_10l.php
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 19-09-2016    Ficcadenti Raffaele         
	# -
	#
-->
<!-- Codice PHP -->
<?php
	date_default_timezone_set('UTC');

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
		print("<$h>$str</$h>\n"); // funzione definita dall'utente
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

	function stampaArray($arr)
	{
		foreach ($arr as $key => $value) 
		{
			println("$key => $value");		
		}
	}

	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	$sys = strtoupper(PHP_OS);
	println("OS: $sys");
?>

<?php

	class ContatoreAccessi
	{
		private $cont;
		public function ContatoreAccessi($v)
		{ 
			$this->cont = $v; 
		}
		
		public function stampa()
		{ 
			println("Accessi : ".$this->cont); 
		}
		
		public function aumenta()
		{ 
			$this->cont++; 
		}
	}

?>

<hmtl>
	<head>
		<title>sorgente: esempio_10l.php</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$num_capitolo=capitolo("Metodi magici.");
			print("<div id=\"m70\">\n");


			print("</div>\n");
		?>

		<?php
			$num_capitolo=capitolo("info");
		?>
		
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>