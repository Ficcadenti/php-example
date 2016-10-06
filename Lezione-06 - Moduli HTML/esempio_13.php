<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_13.php
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
	$PARAMS=array();
	println($_SERVER["PHP_SELF"]);
	println("Chiamnata da un ".$_SERVER["REQUEST_METHOD"]."");

	if($_SERVER["REQUEST_METHOD"]=="GET")
	{
		$PARAMS=$_GET;
		printH("h1","\$_GET");
	}
	else if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$PARAMS=$_POST;
		printH("h1","\$_POST");
	}

	
	foreach ($PARAMS as $key => $value) 
	{
		if(gettype($value)=="array")
		{
			foreach ($value as $key1 => $value1) 
			{
				println("\$PARAMS[$key($key1)](".gettype($value1).") = $value1");
			}
		}
		else
		{
			println("\$PARAMS[$key](".gettype($value).") = $value");
		}
	}
	println();

	if (isset($PARAMS["utente"])) 
	{
		$utente=$PARAMS["utente"];
	}
	else
	{
		$utente="";
	}

	if (isset($PARAMS["indirizzo"])) 
	{
		$indirizzo=$PARAMS["indirizzo"];
	}
	else
	{
		$indirizzo="";
	}

	if (isset($PARAMS["prodotti"])) 
	{
		$prodotti=$PARAMS["prodotti"];
	}
	else
	{
		$prodotti=array();
	}

	if (isset($PARAMS["quantita"])) 
	{
		$quantita=$PARAMS["quantita"];
	}
	else
	{
		$quantita=array();
	}

	println("Benvenuto $utente di $indirizzo. !!!!");
	foreach ($prodotti as $key => $value) 
	{
		println("\$prodotti[$key] ->  $value");
	}
	foreach ($quantita as $key => $value) 
	{
		println("\$quantita[$key] ->  $value");
	}
?>