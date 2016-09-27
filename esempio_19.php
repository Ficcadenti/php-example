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

	function leggiDirTree($nome_dir)
	{
		$dh=opendir($nome_dir);
		if($dh)
		{
			while(gettype($file=readdir($dh))!="boolean")
			{
				if(is_dir("$nome_dir/$file"))
				{
					println("<font color=\"blue\">$nome_dir/$file/</font> ");
					if( ($file!=".") AND ($file!="..") )
					{
						leggiDirTree("$nome_dir/$file");
					}
				}
				else
				{
					println("$nome_dir/$file");
				}
			}
		}
		else
		{
			println("Impossibile aprire la directory $nome_dir.");
		}
	}

?>

<hmtl>
	<head>
	<title>sorgente: esempio_19.html</title>
	<!-- Sezione per i CSS -->
	<!-- load default.css -->
	<?php
		include ("css/default.css");
	?>

	</head>
	<body>
		<?php
			$nome_db="temp/dbm_test.dbf";

			// database "definition"
			$def = array(
			  array("date",     "D"),
			  array("name",     "C",  50),
			  array("age",      "N",   3, 0),
			  array("email",    "C", 128)
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
					array_push($record,array(date("ymd"),"Raffaele",40,"raffaele.ficcadenti@gmail.com"));
					array_push($record,array(date("ymd"),"Valeria",40,"valeria5.greco@gmail.com"));
					array_push($record,array(date("ymd"),"Francesco",22,"francesco.greco@gmail.com"));
					array_push($record,array(date("ymd"),"Luca",39,"luca.ficcadenti@gmail.com"));
					array_push($record,array(date("ymd"),"Roberto",46,"roberto.greco@gmail.com"));

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

					$tmp=array(date("ymd"),"Francesco",23,"francesco.greco@gmail.com");
					dbase_replace_record($dbh,$tmp,3);

					$record_numbers = dbase_numrecords($dbh);
					for ($i = 1; $i <= $record_numbers; $i++) 
					{
						if($i%2==0) // cancello solo i pari
						{
							dbase_delete_record($dbh, $i);
						}
					}
					dbase_pack($dbh);
					
				print("</div>");
				dbase_close($dbh);

				$num_capitolo=capitolo("Info");
			}
		?>
		<div id="m30">
			<a href="http://php.net/manual/en/ref.dbase.php" target="_blank">dBase Functions</a><br>
			<a href="https://pecl.php.net/package/dbase/5.1.0/windows" target="_blank">dBase download</a><br>
			<a href="http://dbfconv.com/" target="_blank">DBF Converter</a><br>
		</div>	
	</body>
</hmtl>