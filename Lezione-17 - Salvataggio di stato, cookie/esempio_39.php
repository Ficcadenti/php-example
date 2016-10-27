<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_39.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 18-10-2016    Ficcadenti Raffaele         
	# -
	#
-->
<?php
	$db_connection=FALSE;
	$name_db="";
	$name_tab="";
	$slengh=300; //5min in secondi;


	date_default_timezone_set('UTC');
	setcookie("nome_cookie","Raffaele",time()-60,"/","localhost",0);

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

	function stampaErrorreDB()
	{
		global $db_connection;	
		echo "<font color=\"red\">Error  : " . $db_connection->errno . "</font><br>";
		echo "<font color=\"red\">Message: " . $db_connection->error . "</font><br>";
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
	println();

	function stampaArray($arr)
	{
		foreach ($arr as $key => $value) 
		{
			println("$key => $value");
		}
		println();
	}

	function preparaInsert($name_tab,$record)
	{
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
		return $query;
	}

	function vecchioUtente($db_connection,$name_tab,$id)
	{
		global $slengh;
		$new_id=0;
		$query="SELECT * FROM $name_tab where id=$id";
		//println("$query");
		$result = $db_connection->query($query);
			
		if($result)
		{
			$nrow=$result->num_rows;

			if(!$nrow) //nuovo utente
			{
				return nuovoUtente($db_connection,$name_tab);
			}
			else
			{
				while($row = $result->fetch_assoc())
				{
					//stampaArray($row);
					
					$row["total_clicks"]++;

					if($row["last_visit"]+$slengh > time())
					{
						//println("Ancora in sessione ".($row["last_visit"]+$slengh)." > ".time());
						$row["total_duration"]=(time()-$row["last_visit"]);
					}
					else
					{
						//println("Nuova visita ");
						$row["num_visit"]++;
					}	

					//stampaArray($row);

					$query="UPDATE $name_tab SET last_visit='".time()."', num_visit='".$row["num_visit"]."',total_duration='".$row["total_duration"]."', total_clicks='".$row["total_clicks"]."'  WHERE id=$id";
					//println("$query");

					$result=$db_connection->query($query);
					if(!$result)
					{
						stampaErrorreDB();
					}
					return $row;
				}

				
			}
			
		}

		return $new_id;
	}

	function nuovoUtente($db_connection,$name_tab)
	{
		$id=-1;
		$query="";
		$result=true;
		$tab_col=array(
					"first_visit" => 0,
					"last_visit" => 0,
					"num_visit" => 0,
					"total_duration" => 0,
					"total_clicks" => 0
				);

		/* Setto il nuovo utente*/
		$tab_col["first_visit"]=time();
		$tab_col["last_visit"]=time();
		$tab_col["num_visit"]=1;
		$tab_col["total_duration"]=0;
		$tab_col["total_clicks"]=0;

		$query=preparaInsert($name_tab,$tab_col);

		$result=$db_connection->query($query);

		if($result)
		{
			$new_id=$db_connection->insert_id;
			println("Record inserito con id=$id");

		}
		else
		{
			stampaErrorreDB();
		}

		setcookie("visit_id",$new_id,time()+(60*60*24*356*10),"/"); //cookie di 10anni

		return $tab_col;
	}

	function outputStats()
	{
		global $user_stats;
		$click=sprintf("%.2f",($user_stats["total_clicks"]/$user_stats["num_visit"]));
		$durata=sprintf("%.2f",($user_stats["total_duration"]/$user_stats["num_visit"]));
		print("<div id=\"m70\">");
		
		println("Ciao il tuo id è: $user_stats[id]");
		println("Hai visitato il sito $user_stats[num_visit] volte");
		println("Media di click per visita: $click");
		println("Durata media delle visite: $durata");
		print("</div>");
	}


?>

<hmtl>
	<head>
		<title>sorgente: esempio_39.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$visit_id=0;
			$user_stats=array();
			$num_capitolo=capitolo("Contatore visite");
			$CONNECTED=false;
			$record=array();
			$name_db="phpexample";
			$name_tab="tab_contvisite";
			$tab_col=array(
					"id" => 0,
					"first_visit" => 0,
					"last_visit" => 0,
					"num_visit" => 0,
					"total_duration" => 0,
					"total_clicks" => 0
				);


			mysqli_report(MYSQLI_REPORT_STRICT);

			print("<div id=\"m70\">");
			
				try
				{
					$CONNECTED = true;
					$db_connection = new mysqli("localhost","root","raffo",$name_db);
					
					println("Connessione MySQLi OK!!!!");
					println("DB Name : $name_db");
					println("Tabella : $name_tab");
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
					/* Controllo l'esistenza del cookie */
					if(isset($_COOKIE['visit_id']))
					{
						$visit_id=$_COOKIE['visit_id'];
						println("Benvenuto nuovamente visit_id=$visit_id");
						$user_stats=vecchioUtente($db_connection,$name_tab,$visit_id);
					}
					else
					{
						println("Benvenuto nuovo utente");
						$user_stats=nuovoUtente($db_connection,$name_tab);
					}
				}

			
			print("</div>");
			$num_capitolo=capitolo("Statistiche");
			outputStats();

			$num_capitolo=capitolo("info");
		?>

		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>