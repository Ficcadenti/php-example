<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_08a.php
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 27-03-2017    Ficcadenti Raffaele         
	# -
	#
-->
<hmtl>
<head>
	<title>sorgente: esempio_08a.php</title>
	<!-- Sezione per i CSS -->
	<style>
		b {
		    font-size: 15px;
		    color: #000000;
		}
		b1 {
		    font-size: 30px;
		    color: #0000FF;
		}
	</style>
</head>
<body>
	<b>
	<!-- Codice PHP -->
	<?php
		if( (include("../assets/lib/my_lib.php")) == 'success' ) 
		{
			println("Include \"my_lib.php\" ok. !!!!");
			println();
		}
		else
		{
			include("my_lib_test.php");
		}
	?>
	<?php

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

		$sum = function ($a, $b) {
		    return $a + $b;
		};
		 
		
		

		capitolo("Funzioni anonime (Clouser)");
		println($sum(2, 3)); // 5
		println(call_user_func($sum, 2, 3)); // 5
		println(call_user_func_array($sum, array(2, 3))); // 5
		println("FINE");
	?> 
	</b>
</body>
</hmtl>