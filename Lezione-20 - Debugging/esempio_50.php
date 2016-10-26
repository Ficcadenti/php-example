<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_50.html
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
	setcookie("nome_cookie","Raffaele",time()+3600,"/","localhost",0); //cookie di 1h
	
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
		<title>sorgente: esempio_50.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$num_capitolo=capitolo("Debugging.");
			paragrafo("Esempio 3.",$num_capitolo);
			fopen("dsiausiasui","r");
			error_log(date("d/m/Y H i")." ".__FILE__. " line: ".__LINE__." ".$php_errormsg,0); //errore su log file definito in php_ini 
			error_log(date("d/m/Y H i")." ".__FILE__. " line: ".__LINE__." ".$php_errormsg,3,"my_error_log.txt"); //errore sul file: my_error_log.txt
			error_log(date("d/m/Y H i")." ".__FILE__. " line: ".__LINE__." ".$php_errormsg,1,"rficcad@e-tech.net"); //errore inviato per e-mail
			$val=10;
			$val1="db1";
			println("<p>yeb [dbhy] $val</p>");

			debug(__LINE__,"Test debug function","val",$val,"val1",$val1);
			debug(__LINE__,"Test debug function2");
			print("<div id=\"m70\">");
			print("</div>");
		?>
		
		

		<?php

			$num_capitolo=capitolo("info");
		?>

		<a href="http://php.net/manual/en/function.func-get-args.php" target="_blank">PHP func_get_args()</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>