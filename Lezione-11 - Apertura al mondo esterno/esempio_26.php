<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_26.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 05-10-2016    Ficcadenti Raffaele         
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


	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();
?>

<hmtl>
	<head>
		<title>sorgente: esempio_26.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			showEnvironment();

			// Apri connessione verso nntp server
			// open a connection to the nntp server
			$server = '{news.php.net:119/nntp}';
			$group = 'php.doc'; // main PHP mailing list
			$nntp = imap_open("$server$group", '', '', OP_ANONYMOUS);


		?>
		<br>
		<a href="http://php.net/manual/en/reserved.variables.server.php" target="_blank">$_SERVER</a><br>
		<a href="http://php.net/manual/en/function.fsockopen.php" target="_blank">fsockopne()</a><br>
		<a href="https://it.wikipedia.org/wiki/Codici_di_stato_HTTP" target="_blank">Codici di ritorno del server Apache</a><br>
		<a href="http://news.php.net/" target="_blank">PHP News</a><br>

	</body>
</hmtl>