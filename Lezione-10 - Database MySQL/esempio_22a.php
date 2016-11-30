<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_22a.html
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
	$db_connection=FALSE;
	$name_db="";
	$name_tab="";

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

	include("../assets/lib/adodb5/adodb.inc.php");

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

	function stampaErr()
	{
		global $db_connection;	
		echo "<font color=\"red\">Error  : " . $db_connection->errno . "</font><br>";
		echo "<font color=\"red\">Message: " . $db_connection->error . "</font><br>";
	}


	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();

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


?>

<hmtl>
	<head>
		<title>sorgente: esempio_22a.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$db = NewADOConnection('mysql');
			$name_db="phpexample";
			$name_tab="tab_01";

			$db->Connect("localhost", "root", "raffo", $name_db);


			$result = $db->Execute("SELECT * FROM $name_tab");
			if ($result === false) die("failed");  
			while (!$result->EOF) 
			{
				for ($i=0, $max=$result->FieldCount(); $i < $max; $i++)
				{
				       println($result->fields[$i].' ');
				}
				$result->MoveNext();
				println();
			} 
		?>
	</body>
</hmtl>