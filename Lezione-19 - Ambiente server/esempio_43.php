<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_43.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 24-10-2016    Ficcadenti Raffaele         
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
		<title>sorgente: esempio_43.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$num_capitolo=capitolo("Ambiente server.");
			paragrafo("Lettura.",$num_capitolo);
			$command="";
			$prodotti=array(
				array("S7",100,"bianco"),
				array("i7",300,"nero")
				);

			if($sys == "LINUX")
			{
			    $command="who";
			}
			else if(substr($sys,0,3) == "WIN")
			{
			    $command="dir";
			}

			$handle = popen($command, "r");
			print("<div id=\"m70\">");
			println("Comando da eseguire: '$command'");
			print("<pre>");
				
			while (!feof($handle))
			{
				$line=fgets($handle,1024);
				print(htmlspecialchars($line));
			}

			pclose($handle);
			print("</pre></div>");
			
			paragrafo("Scrittura.",$num_capitolo);
			print("<div id=\"m70\">");
			
			if($sys == "LINUX")
			{
				$command="column -tc 3 -s / > tab.txt";
				println("Comando da eseguire: '$command'");
				$handle = popen($command, "w");
				foreach($prodotti as $key) 
				{
				      var_dump($key);
				      fputs($handle,join("/",$key)."\n");
				}
				pclose($handle);
			}
			else 
			{
				$command="dir .. > tab.txt";
				println("Comando da eseguire: '$command'");
				$handle = popen($command, "w");
				pclose($handle);
			}
			  
			print("</div>");
			
			
			$num_capitolo=capitolo("info");
		?>
		

		<a href="http://php.net/manual/en/function.implode.php" target="_blank">PHP join()</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>