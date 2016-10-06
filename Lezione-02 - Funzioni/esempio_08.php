<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_08.php
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
<hmtl>
<head>
	<title>sorgente: esempio_08.php</title>
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
		$test="Gabriele";

		function somma($a,$b) // passaggio parametri per valore
		{
			return $a+$b;
		}

		function moltiplica($a,$b)
		{
			return $a*$b;
		}

		function printH1($str)
		{
			println("<h1>$str</h1>"); // funzione definita dall'utente
		}

		function printH2($str)
		{
			println("<h2>$str</h2>"); // funzione definita dall'utente
		}

		function printH($h,$str)
		{
			println("<$h>$str</$h>"); // funzione definita dall'utente
		}

		function inc(&$num) // passaggio parametro per riferimento
		{
			$num++;
			return true;
		}

		function testGlobal() /* utilizzo di variabili globali*/
		{
			global $test;
			println("stampa variabile globale $test e la modifica !!!!!");
			$test="Valeria";
		}

		function capitolo($str) /* utilizzo di variabili statiche */
		{
			static $num_capitolo = 0;
			$num_capitolo++;
			printH("h1","$num_capitolo. $str");
		}

		function fontWrap($str, $size=3)
		{
			/* heredoc string */
			$temp=<<<HDOC
			<font size="$size" face="Arial, Helvetica, sans-serif">$str</font> 
HDOC;
			println($temp);
		}

		$num1=-2;
		$num2=-4;
		$abs_num1=abs($num1); // funzione abs() di PHP
		$abs_num2=abs($num2); // funzione abs() di PHP

		$somma=somma($abs_num1,$abs_num2);  // funzione definita dall'utente
		$mol=moltiplica($abs_num1,$abs_num2);  // funzione definita dall'utente

		println("$abs_num1 + $abs_num2 = $somma");
		println("$abs_num1 * $abs_num2 = $mol");
		println("Valore assoluto di($num1) = $abs_num1"); // funzione definita dall'utente

		$functioHolder="printH1";
		$functioHolder("Ciao mondo php !!!!");
		$functioHolder="printH2";
		$functioHolder("Ciao mondo php !!!!");
		$functioHolder="printH";
		$functioHolder("h3","Ciao mondo php !!!!");
		$functioHolder="printH";
		$functioHolder("h4","Ciao mondo php !!!!");
		$functioHolder="printH";
		$functioHolder("h5","Ciao mondo php !!!!");

		$num3=10;
		println("num3=$num3");
		inc($num3);
		println("inc($num3)");
		println("num3=$num3");
		testGlobal();
		println($test);
		println();

		capitolo("Introduzione");
		capitolo("Scopo");
		capitolo("Funzioni");
		capitolo("Ringraziamenti");

		fontWrap("Titolo 1",5);
		fontWrap("Titolo 2",15);
		fontWrap("Titolo 3");
		println("FINE");
	?> 
	</b>
</body>
</hmtl>