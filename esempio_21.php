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


	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();
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
			global $db_connection;
			$name_db="php-example";
			$name_tab="tab_01";
			$record=array();

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
				    echo "Error  : " . $e->getCode() . "<br>";
				    echo "Message: " . $e->getMessage() . "<br>";
				}

				if($CONNECTED)
				{
					if($db_connection->select_db($name_db))
					{
						println("Ok sei connesso al database '$name_db' !!!");
						//SELECT id,Nome,Cognome,'e-mail',Telefono FROM tab_01;
						$record=array(
								"Nome" => "Luca",
								"Cognome" => "Ficcadenti",
								"e-mail" => "luca.ficcadenti@gmail.com",
								"Telefono" => "12345678",
							);

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

						$result=$db_connection->query($query);
						if($result)
						{
							println("Record inserito,");
						}
						else
						{
							println("Errore QUERY");
						}

						
					}
					else
					{
						println("Il database '$name_db' non esiste.");
					}
					
					$db_connection->close();
				}

			print("</div>");
			$num_capitolo=capitolo("Info");
		?>
		<a href="http://www.html.it/pag/16420/introduzione29/" target="_blank">MySQL, MySQLi, PDO</a><br>
		<a href="http://php.net/manual/en/class.mysqli.php" target="_blank">mysqli()</a><br>
	</body>
</hmtl>