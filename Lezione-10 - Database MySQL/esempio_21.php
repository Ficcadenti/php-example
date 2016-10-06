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

	function stampaDbTable($tab_col,$result)
	{
		if(!$result)
		{
			return;
		}

		$record_numbers = $result->num_rows;
		print("<table>");
			print("<thead>");
				print("<tr>");
					print("<td><strong>ID</strong></td>");
					foreach ($tab_col as $key => $value) 
					{
						print("<td><strong>$key</strong></td>");
					}
				print("</tr>");
			print("<thead>");

			print("<tbody>");
				while($row = $result->fetch_assoc())
				{
					print("<tr id=\"riga\" bgcolor=\"#ffffd6\">");
					
					foreach ($row as $key => $value) 
					{	
						if($key=="Nome")
						{
							print("<td width=\"100\"> <input type=\"text\" size=\"20\" name=\"name_mod[]\" value=\"".trim($value)."\"> </td>");
						}else if($key=="Cognome")
						{
							print("<td width=\"100\"> <input type=\"text\" size=\"20\" name=\"cognome_mod[]\" value=\"".trim($value)."\"> </td>");
						}else if($key=="id")
						{
							print("<td width=\"5\"> <input type=\"hidden\" size=\"3\" name=\"id_record[]=\" value=\"".trim($value)."\" >$value</td>");
						}
						else
						{
							print("<td>$value</td>");
						}
					}
					print("</tr>");
				}
			print("</tbody>");

		print("</table>");
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
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$CONNECTED=false;
			$record=array();
			$name_db="phpexample";
			$name_tab="tab_01";
			$tab_col=array(
					"Nome" => "",
					"Cognome" => "",
					"e-mail" => "",
					"Telefono" => "",
				);

			mysqli_report(MYSQLI_REPORT_STRICT);

			$num_capitolo=capitolo("Database: MySQL");
			paragrafo("Aprire connessione",$num_capitolo);
			print("<div id=\"m70\">");
				
				try
				{
					$CONNECTED = true;
					$db_connection = new mysqli("localhost","root","raffo",$name_db);
					
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
					if(isset($_POST["insert"]))
					{
						if($db_connection->select_db($name_db))
						{
							println("Ok sei connesso al database '$name_db' !!!");

							if (isset($PARAMS["nome"])) 
							{
								if((!empty($PARAMS["nome"]))&&(!empty($PARAMS["cognome"]))&&(!empty($PARAMS["email"]))&&(!empty($PARAMS["telefono"])))
								{
									$tab_col["Nome"]=addslashes($PARAMS["nome"]);
									$tab_col["Cognome"]=addslashes($PARAMS["cognome"]);
									$tab_col["e-mail"]=addslashes($PARAMS["email"]);
									$tab_col["Telefono"]=addslashes($PARAMS["telefono"]);

									$result=add_to_db($tab_col);

									if($result)
									{
										println("Record inserito con id=$db_connection->insert_id");
									}
									else
									{
										stampaErr();
									}
								}
							}
						}
						else
						{
							println("Il database '$name_db' non esiste.");
						}
					}else 
					{
						println("Bottone modifica");
						if (isset($PARAMS["name_mod"])) 
						{
							$id=$PARAMS["id_record"];
							$name=$PARAMS["name_mod"];
							$cognome=$PARAMS["cognome_mod"];
							$num_record=count($name);

							for ($i=0;$i<$num_record;$i++)
							{
								$query="UPDATE $name_tab set Nome='$name[$i]', Cognome='$cognome[$i]' WHERE id=$id[$i]";
								$result=$db_connection->query($query);
								if(!$result)
								{
									stampaErr();
								}
							}
						}
					}
				}

			print("</div>");
		?>

		<?php
			paragrafo("Inserimento",$num_capitolo);
		?>
		<form name="insert" id="m70" action="" method="POST">
			Nome<br>
			<input type="text" name="nome"><br>
			Cognome<br>
			<input type="text" name="cognome"><br>
			e-Mail<br>
			<input type="text" name="email"><br>
			Telefono<br>
			<input type="text" name="telefono"><br>
			<input name="insert" type="submit" value="INSERT"><br>
		</form>
		<?php
			paragrafo("Elenco",$num_capitolo);
			$result = $db_connection->query("SELECT * FROM $name_tab");
			
			if($result)
			{
				print("<div id=\"m70\">");
				println("Numero righe: $result->num_rows");
				println("Numero righe: ". mysqli_affected_rows($db_connection));
				println("Numero righe: ". $db_connection->affected_rows);
				print("<form name=\"modifica\" action=\"\" method=\"POST\">");
					stampaDbTable($tab_col,$result);
					print("<br><input name=\"modifica\" type=\"submit\" value=\"MODIFICA\"><br>");
				print("</form>");			
				print("</div>");
			}
		?>
			
		<?php
			$num_capitolo=capitolo("Info");
		?>
		<a href="http://www.html.it/pag/16420/introduzione29/" target="_blank">MySQL, MySQLi, PDO</a><br>
		<a href="http://php.net/manual/en/class.mysqli.php" target="_blank">mysqli()</a><br>
	</body>
</hmtl>