<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_23.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 27-09-2016    Ficcadenti Raffaele         
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


	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();
?>

<hmtl>
	<head>
		<title>sorgente: esempio_23.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$env=array("HTTP_REFERER","HTTP_USER_AGENT","REMOTE_ADDR","HTTP_HOST","QUERY_STRING","PATH_INFO","PHP_SELF","GATEWAY_INTERFACE","SERVER_SOFTWARE");
			foreach ($env as $value) 
			{
				if(isset($_SERVER[$value]))
				{
					println("\$_SERVER[$value]=$_SERVER[$value]");
				}
				else
				{
					println("\$_SERVER[$value] not set !!!");
				}
			}
			if(isset($_SERVER["REMOTE_HOST"]))
			{
				println("\$_SERVER[REMOTE_HOST]=$_SERVER[REMOTE_HOST]");
			}
			else if(isset($_SERVER["REMOTE_ADDR"]))
			{
				println("\$_SERVER[REMOTE_HOST]=".gethostbyaddr($_SERVER["REMOTE_ADDR"]));	
			}else
			{
				println("\$_SERVER[REMOTE_HOST]=unknown");
			}
			
			$webpage="./hello.html";
			$fp=fopen($webpage,"r") or die ("non posso aprire $webpage");
			while (!feof($fp))
			{
				$line=fgets($fp,1024);
				println("$line");
			}
			fclose($fp);

			# chiamata alla funzione per la raccolta dei request headers 
			$headers = getallheaders();
			# visualizzazione dei valori dell'array tramite ciclo
			foreach ($headers as $name => $content)
			{
				println("[$name] = $content");
			} 

			# controllo del buffer
			ob_start();
			# intervallo prima del reindirizzamento
			$intervallo = 5;
			# messaggio per il reindirizzamento della pagina
			println("la pagina verrà rendirizzata tra $intervallo secondi");
			# url di destinazione
			$destinazione = "./esempio_22.php";
			# reindirizzamento
			header('Refresh:' . $intervallo . ';' . $destinazione);
			# interruzione del buffer e liberazione del contenuto
			ob_end_flush();
			
		?>
		<br>
		<a href="http://php.net/manual/en/reserved.variables.server.php" target="_blank">$_SERVER</a><br>
	</body>
</hmtl>