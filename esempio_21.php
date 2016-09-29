<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_21.html
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

	if( (include("my_lib.php")) == 'success' ) 
	{
		println("Include \"my_lib.php\" ok. !!!!");
		println();
	}
	else
	{
		include("my_lib_test.php");
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

	function add_to_db($record)
	{
		global $name_tab;
		global $db_connection;
		$ret=FALSE;

		$query="INSERT INTO $name_tab(";

		foreach ($record as $key => $value) 
		{
			$query=$query."`".$key."`,";
		}
		$query=substr($query,0,strlen($query)-1);
		$query=$query.") values (";
		foreach ($record as $key => $value) 
		{
			$query=$query."'".$value."',";
		}
		$query=substr($query,0,strlen($query)-1);
		$query=$query.")";

		println ("QUERY=$query");

		$ret=$db_connection->query($query);

		return $ret;
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
		<title>sorgente: esempio_21.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("css/default.css");
		?>
	</head>
	<body>
		<?php
			$CONNECTED=false;
			$record=array();
			$name_db="php-example";
			$name_tab="tab_01";

			mysqli_report(MYSQLI_REPORT_STRICT);

			$num_capitolo=capitolo("Database: MySQL");
			paragrafo("Aprire connessione",$num_capitolo);
			print("<div id=\"m70\">");
				
				try
				{
					$CONNECTED = true;
					$db_connection = new mysqli("localhost","root","raffo","php-example");
					
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
					if($db_connection->select_db($name_db))
					{
						println("Ok sei connesso al database '$name_db' !!!");

						$record=array(
								"Nome" => "",
								"Cognome" => "",
								"e-mail" => "",
								"Telefono" => "",
							);

						if (isset($PARAMS["nome"])) 
						{
							$record["Nome"]=addslashes($PARAMS["nome"]);
							$record["Cognome"]=addslashes($PARAMS["cognome"]);
							$record["e-mail"]=addslashes($PARAMS["email"]);
							$record["Telefono"]=addslashes($PARAMS["telefono"]);

							$result=add_to_db($record);

							if($result)
							{
								println("Record inserito,");
							}
							else
							{
								stampaErr();
							}
						}
					}
					else
					{
						println("Il database '$name_db' non esiste.");
					}
					
					$db_connection->close();
				}

			print("</div>");
		?>

		<?php
			paragrafo("Inserimento",$num_capitolo);
		?>
		<form id="m70" action="" method="POST">
			Nome<br>
			<input type="text" name="nome"><br>
			Cognome<br>
			<input type="text" name="cognome"><br>
			e-Mail<br>
			<input type="text" name="email"><br>
			Telefono<br>
			<input type="text" name="telefono"><br>
			<input type="submit" value="INSERT"><br>
		</form>

		<?php
			$num_capitolo=capitolo("Info");
		?>
		<a href="http://www.html.it/pag/16420/introduzione29/" target="_blank">MySQL, MySQLi, PDO</a><br>
		<a href="http://php.net/manual/en/class.mysqli.php" target="_blank">mysqli()</a><br>
	</body>
</hmtl>