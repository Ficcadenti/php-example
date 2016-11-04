<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_57.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 04-11-2016    Ficcadenti Raffaele         
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
	$sys = strtoupper(PHP_OS);
	println("OS: $sys");
	

	function stampaArray($arr)
	{
		foreach ($arr as $key => $value) 
		{
			println("$key => $value");		
		}
	}

?>

<hmtl>
	<head>
		<title>sorgente: esempio_57.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			function dbg_ob_gzhandler($buffer, $mode) 
			{
				error_log('dbg_ob_gzhandler invoked',3,"my_error_log.txt");
				$rv = ob_gzhandler($buffer, $mode);
				if ( false===$rv ) {
					error_log('client does not support compressed content',3,"my_error_log.txt");
				}
				return $rv;
			}

			function callback($buffer,$mode)
			{
			  	return (str_replace("nomesito", "www.raffaeleficcadenti.it", $buffer));
			}

			if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
			{
				println("GZip enabled.");
			    ob_start("callback");
			}
			else
			{
				println("GZip disabled.");
			    ob_start("callback");
			}


			$num_capitolo=capitolo("Buffering.");
			print("<div id=\"m70\">\n");
			$time_start = getmicrotime();

			//ob_start("ob_gzhandler");

			println("Momento iniziale: $time_start");

			for($i=0 ;$i<100; $i++)
			{
				println("Visita il mio sito: nomesito") ;
			}

			$time_stop = getmicrotime();
			$time = $time_stop-$time_start;
			//$str=ob_get_clean(); //cancella il buffer attuale
			//println($str);
			println("");
			println("Len buffer: ".(ob_get_length()/1024). " Kb");
			println("Momento finale: $time_stop");
			println("Script eseguito in '$time' microsecondi.");
			

			print("</div>\n");
			


		?>
		<h3>Questa parte di testo è fuori dai TAG php ma viene comunque bufferizzata... nomesito<h3>
		<?php
			$num_capitolo=capitolo("info");
			ob_end_flush();
		?>

		<a href="http://php.net/manual/en/function.ob-start.php" target="_blank">PHP ob_start()</a><br>
		<a href="http://www.html.it/articoli/le-funzioni-di-controllo-delloutput-1/" target="_blank">HTML.it buffering</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>