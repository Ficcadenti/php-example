<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_24.html
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
		<title>sorgente: esempio_24.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			showEnvironment();
			# nome host sbagliato per simulare errore.
			$host="pt-ficcadenti.asdc.asi.it1";
			$page="/mysql/connessione_mysql_1.php";

			$fp=fsockopen($host,80,$errno, $errstr,30);
			

			if(!$fp)
			{
				stampaErrorre("ERROR","Impossibile connettersi ha $host ($errno-$errstr)");
			}
			else
			{
				println("Connessione al server $host OK.");
				
			}

			# nome host OK.
			$host="pt-ficcadenti.asdc.asi.it";
			$page="/mysql/connessione_mysql_1.php";
			$method="GET";
			$referer="10.10.10.151";

			$sock=fsockopen($host,80,$errno, $errstr,5);
			

			if(!$sock)
			{
				stampaErrorre("ERROR","Impossibile connettersi ha $host ($errno-$errstr)");
			}
			else
			{
				println("Connessione al server $host OK.");
				$request = "GET $page HTTP/1.1\r\n";
			    $request .= "Host: $host\r\n";
			    $request .= "User-Agent: Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.2.1) Gecko/20021204\r\n";
			    $request .= "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,video/x-mng,image/png,image/jpeg,image/gif;q=0.2,text/css,*/*;q=0.1\r\n"; 
			    $request .= "Accept-Language: en-us, en;q=0.50\r\n";
				$request .= "Accept-Encoding: gzip, deflate, compress;q=0.9\r\n";
				$request .= "Accept-Charset: ISO-8859-1, utf-8;q=0.66, *;q=0.66\r\n";
				$request .= "Keep-Alive: 300\r\n";
				$request .= "Referer: $referer\r\n";
				$request .= "Cache-Control: max-age=0\r\n";
			    //$request .= "Connection: Close\r\n\r\n";
			    $request .= "Connection: keep-alive\r\n\r\n";

			    //$request = "HEAD $page HTTP/1.1\r\n\r\n";

				println($request);
				
				$page=array();
				fputs($sock,$request);
				while (!feof($sock))
				{
					$page[]=fgets($sock,4096);
				}
				println("il server $host ha restituito".count($page)." righe.");
				for($i=0;$i<count($page);$i++)
				{
					println($page[$i]);
				}

				fclose($sock);
			}
		?>
		<br>
		<a href="http://php.net/manual/en/reserved.variables.server.php" target="_blank">$_SERVER</a><br>
		<a href="http://php.net/manual/en/function.fsockopen.php" target="_blank">fsockopne()</a><br>
		<a href="https://it.wikipedia.org/wiki/Codici_di_stato_HTTP" target="_blank">Codici di ritorno del server Apache</a><br>
	</body>
</hmtl>