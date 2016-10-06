<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_12.php
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
	<title>sorgente: esempio_12.php</title>
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
		h2 {
			margin-left: 30px;
		}
		#m30 
		{
			margin-left: 30px;
		}
		#m70 {
			margin-left: 70px;
		}
		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th, td {
		    padding: 8px;
		    text-align: left;
		    border-bottom: 1px solid #ddd;
		}

		tr#riga:hover{background-color:#f5f5f5}
	</style>
</head>
<body>
	<!-- Codice PHP -->
	<?php
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
	?>
	<?php
		$user1="Raffaele";
		$user2="Raffaele";
		$user3="Raffaele";

		printH("h1","\$GLOBALS");
		foreach ($GLOBALS as $key => $value) 
		{
			if(gettype($value)=="array")
			{
				println("$key (".gettype($value)."):");
				var_dump($value);
				println();
			}
			else
			{
				println("$key (".gettype($value).")= $value");
			}
		}

		printH("h1","\$_SERVER");
		foreach ($_SERVER as $key => $value) 
		{
			if(gettype($value)=="array")
			{
				println();
			}
			else
			{
				println("$key (".gettype($value).")= $value");
			}
		}

		printH("h1","\$_REQUEST");
		foreach ($_REQUEST as $key => $value) 
		{
			if(gettype($value)=="array")
			{
				println();
			}
			else
			{
				println("$key (".gettype($value).")= $value");
			}
		}

		printH("h1","\$_POST");
		foreach ($_POST as $key => $value) 
		{
			if(gettype($value)=="array")
			{
				println();
			}
			else
			{
				println("$key (".gettype($value).")= $value");
			}
		}

		printH("h1","\$_GET");
		foreach ($_GET as $key => $value) 
		{
			if(gettype($value)=="array")
			{
				println();
			}
			else
			{
				println("$key (".gettype($value).")= $value");
			}
		}
	?>
</body>
</hmtl>