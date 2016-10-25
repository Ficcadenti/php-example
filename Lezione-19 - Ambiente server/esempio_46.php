<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_46.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 25-10-2016    Ficcadenti Raffaele         
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
		<title>sorgente: esempio_46.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$num_capitolo=capitolo("Ambiente server.");
			paragrafo("exec().",$num_capitolo);

			print("<div id=\"m70\">");
			if (!isset($PARAMS["comando"])) 
			{
				println("Benvenuto su quest'esempio !!!!");
			}
			else
			{
				$command=$PARAMS["comando"];	
			
				if($command!="")
				{
					
					println("Comando da eseguire: '$command'");
					exec(escapeshellcmd($command),$output,$return);
					print("<pre>");
					if($return==1)
					{
						if( count($output)==0 )
						{
							stampaErrorre("ERRORE","Comando non supportato");
						}
						else
						{

							foreach ($output as $key => $value) 
							{
								println(htmlspecialchars($value));
							}
						}
					}
					else
					{
						foreach ($output as $key => $value) 
						{
							println(htmlspecialchars($value));
						}
					}
				}
				else
				{
					stampaErrorre("INFO","Inserisci un comando da eseguire!!!");
				}
			}
			print("</div>");
		?>

		<form id="m70" action="<?php print($_SERVER["PHP_SELF"]) ?>" method="POST">
			<input type="text" name="comando">
			<input type="submit" value="Esegui">
		</form>
		<?php
			$num_capitolo=capitolo("info");
		?>
		<a href="http://php.net/manual/en/book.exec.php" target="_blank">PHP exec()</a><br>
		<a href="http://php.net/manual/en/function.escapeshellcmd.php" target="_blank">PHP escapeshellcmd()</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>