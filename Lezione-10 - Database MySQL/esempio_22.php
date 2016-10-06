<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_22.html
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
		<title>sorgente: esempio_22.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$CONNECTED=false;
			$record=array();
			

			mysqli_report(MYSQLI_REPORT_STRICT);

			$num_capitolo=capitolo("Database: MySQL");

			try
			{
				$CONNECTED = true;
				$db_connection = new mysqli("localhost","root","raffo");
				
				println("Connessione MySQLi OK!!!!");
				println();
				
			}
			catch (Exception $e ) 
			{
				$CONNECTED = false;
			    echo "<font color=\"red\">Error  : " . $e->getCode() . "</font><br>";
			    echo "<font color=\"red\">Message: " . $e->getMessage() . "</font><br>";
			}

			if($CONNECTED)
			{
				$result = $db_connection->query("SHOW DATABASES");
				$name_db=array();
				$name_table=array();
				while($row = $result->fetch_assoc())
				{
					$name_db[]=$row['Database'];
				}

				foreach($name_db as $value) 
				{
					println("$value");		
					$result = $db_connection->query("SHOW TABLES FROM $value");
					if($result)
					{
						while($row = $result->fetch_assoc())
						{
								foreach ($row as $key => $value) 
								{
									$name_table[]=$value;
									println("-> Tabella: $value");
								}
						}
					}
				}
				foreach($name_db as $value) 
				{
					println("$value");		
					$result = $db_connection->query("SHOW TABLES FROM $value");
					if($result)
					{
						while($row = $result->fetch_assoc())
						{
								foreach ($row as $key => $value) 
								{
									$name_table[]=$value;
									println("-> Tabella: $value");
								}
						}
					}
				}

				$name_db=array();
				$name_table=array();
				$name_db[]="phpexample";
				foreach($name_db as $value) 
				{
					println("-> Database: $value");		
					$result = $db_connection->query("SHOW TABLES FROM $value");
					if($result)
					{
						while($row = $result->fetch_assoc())
						{
								foreach ($row as $key => $value) 
								{
									$name_table[]=$value;
									println("--> Tabella: $value");
								}
						}
					}
				}

				if($db_connection->select_db($name_db[0]))
				{
					foreach($name_table as $value) 
					{
						$result = $db_connection->query("SELECT * FROM $value LIMIT 1");
						if($result)
						{
							println("--> Numero campi: $result->field_count<br>");
							for($i=0;$i<$result->field_count;$i++)
							{
								$finfo = $result->fetch_field_direct($i);
								foreach ($finfo as $key => $value) 
								{
									if($key=="type")
									{
										
										println("---> $key: $value->".$mysql_data_type_hash[$value]);
									}else
									{
										println("---> $key: $value");
									}
								}
								println();
								println();
							}

						}
						else
						{
							println("ORRORE");
							stampaErr();
						}
					}
				}else
				{
					println("ORRORE");
					stampaErr();
				}
			}
		?>
	</body>
</hmtl>