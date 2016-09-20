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
		include("my_lib.php");
	?>
	<?php
		function somma($a,$b)
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

		println("FINE");
	?> 
	</b>
</body>