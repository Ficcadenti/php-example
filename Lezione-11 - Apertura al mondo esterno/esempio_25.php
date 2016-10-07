<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_25.html
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
		<title>sorgente: esempio_25.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			showEnvironment();
			
			# nome host OK.
			$to_check=array(
					"pt-ficcadenti.asdc.asi.it"=>"/mysql/connessione_mysql_1.php",
					"localhost"=>"/php-example/hello.html",
					"www.raffaeleficcadenti.it"=>"/index.php",
					"www.e-tech.net"=>"/"
				);

			$method="HEAD";
			$referer="10.10.10.151";

			foreach ($to_check as $key => $value) 
			{
				$sock=fsockopen($key,80,$errno, $errstr,5);
				if(!$sock)
				{
					stampaErrorre("ERROR","Impossibile connettersi ha $key ($errno-$errstr)");
				}
				else
				{
					println("Connessione al server $key OK.");

				    $request = "$method $value HTTP/1.0\r\n\r\n";
				    println($request);
					
					$page=array();
					fputs($sock,$request);
					while (!feof($sock))
					{
						$page[]=fgets($sock,4096);
					}

					for($i=0;$i<count($page);$i++)
					{
						println($page[$i]);
					}

					fclose($sock);
				}

			}

			

			
		?>
		<br>
		<a href="http://php.net/manual/en/reserved.variables.server.php" target="_blank">$_SERVER</a><br>
		<a href="http://php.net/manual/en/function.fsockopen.php" target="_blank">fsockopne()</a><br>
		<a href="https://it.wikipedia.org/wiki/Codici_di_stato_HTTP" target="_blank">Codici di ritorno del server Apache</a><br>
	</body>
</hmtl>