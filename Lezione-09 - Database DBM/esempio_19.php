<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_19.html
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


	function dbase_checkKey($dbh,$key_search)
	{
		$ret=FALSE;
		if($dbh)
		{
			$header = dbase_get_header_info($dbh);
			foreach ($header as $key => $value) 
			{
				if($value["name"]==$key_search)
				{
					$ret=TRUE;
					break;
				}
			}
		}
		if(!$ret)
		{
			println("Indice '$key_search' non presente!!!");
		}
		return $ret;
	}

	function dbase_getRecord($dbh,$key,$val)
	{
		$ret=array();
		if(($dbh) && (dbase_checkKey($dbh,$key)) )
		{
			$record_numbers = dbase_numrecords($dbh);
			for ($i = 1; $i <= $record_numbers; $i++) 
			{
				$row = dbase_get_record_with_names($dbh, $i);
				if(trim($row[$key])==$val)
				{
					return $row;
				}
			}
		}
		else
		{
			return FALSE;
		}
	}

	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();
?>

<hmtl>
	<head>
		<title>sorgente: esempio_19.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$nome_db="../assets/temp/dbm_test.dbf";

			// database "definition"
			$def = array(
			  array("date",     "N",10,0),
			  array("name",     "C",50),
			  array("age",      "N",3,0),
			  array("email",    "C",128),
			  array("numeri",   "C",128)
			);

			// creation
			if (!dbase_create($nome_db, $def)) 
			{
			  	echo "Error, can't create the database\n";
			}

			$dbh=dbase_open($nome_db,2)or die ("Impossibile aprire il db: $nome_db !!!");

			if ($dbh) 
			{
				$record=array();
				$num_elementi=0;
				$num_capitolo=capitolo("Database DBM");

				print("<div id=\"m30\">");
				println(time());
					array_push($record,array(time(),"Raffaele",40,"raffaele.ficcadenti@gmail.com",serialize(array(1,2,3))));
					array_push($record,array(time(),"Valeria",40,"valeria5.greco@gmail.com",serialize(array(2,3,3))));
					array_push($record,array(time(),"Francesco",22,"francesco.greco@gmail.com",serialize(array(31,2,3))));
					array_push($record,array(time(),"Luca",39,"luca.ficcadenti@gmail.com",serialize(array(1,2,33))));
					array_push($record,array(time(),"Roberto",46,"roberto.greco@gmail.com",serialize(array(51,52,3))));

					foreach ($record as $key => $value) 
					{
							
						if(dbase_add_record($dbh,$value))
						{
							println("Record inserito $value[1]");
						}
						else
						{
							println("ERROR: Eecord non inserito");
						}
					}

					$tmp=array(time(),"Francesco",23,"francesco.greco@gmail.com",serialize(array(1,62,3)));
					println(serialize($tmp));
					dbase_replace_record($dbh,$tmp,3);

					$tmp=dbase_getRecord($dbh,"name","Raffaele");
					if($tmp)
					{
						println(serialize($tmp));
					}
					else
					{
						println("non trovato");
					}


					$record_numbers = dbase_numrecords($dbh);
					for ($i = 1; $i <= $record_numbers; $i++) 
					{
						if($i%2==0) // cancello solo i pari
						{
							dbase_delete_record($dbh, $i);
						}
					}
					dbase_pack($dbh);

					println();
					$record_numbers = dbase_numrecords($dbh);
					print("<table>");
						print("<thead>");
							print("<tr>");
								foreach ($def as $value) 
								{
									print("<td><strong>$value[0]</strong></td>");
								}
							print("</tr>");
						print("<thead>");

						print("<tbody>");
							for ($i = 1; $i <= $record_numbers; $i++) 
							{
								$str="";
								print("<tr id=\"riga\" bgcolor=\"#ffffe6\">");
								$row = dbase_get_record_with_names($dbh, $i);
								print("<td width=\"160\"> ".date("d-m-Y",$row["date"])." </td>");
								print("<td width=\"100\"> $row[name] </td>");
								print("<td width=\"60\"> $row[age] </td>");
								print("<td width=\"150\"> $row[email] </td>");
								$numeri=unserialize($row["numeri"]);
								foreach ($numeri as $value) 
								{
									$str=$str.$value.",";
								}
								print("<td width=\"150\"> ".$str." </td>");
								print("</tr>");
							}
						print("</tbody>");

					print("</table>");
					

					
				print("</div>");
				dbase_close($dbh);

				$num_capitolo=capitolo("Info");
			}
		?>
		<div id="m30">
			<a href="http://php.net/manual/en/ref.dbase.php" target="_blank">dBase Functions</a><br>
			<a href="https://pecl.php.net/package/dbase/5.1.0/windows" target="_blank">dBase download</a><br>
			<a href="http://dbfconv.com/" target="_blank">DBF Converter</a><br>
			<a href="http://php.net/manual/en/function.date.php" target="_blank">date()</a><br>
		</div>	
	</body>
</hmtl>