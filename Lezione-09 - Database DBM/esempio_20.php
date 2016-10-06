<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_20.html
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

	$nome_db="../assets/temp/dbm_test.dbf";
	$dbh=dbase_open($nome_db,2)or die ("Impossibile aprire il db: $nome_db !!!");

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

	function dbase_printTable($dbh)
	{
		if(!$dbh)
		{
			return;
		}

		$record_numbers = dbase_numrecords($dbh);
		print("<table>");
			print("<thead>");
				print("<tr>");
					print("<td><strong>DELETE</strong></td>");
					$header = dbase_get_header_info($dbh);
					foreach ($header as $key => $value) 
					{
						print("<td><strong>$value[name]</strong></td>");
					}
				print("</tr>");
			print("<thead>");

			print("<tbody>");
				for ($i = 1; $i <= $record_numbers; $i++) 
				{
					$str="";
					print("<tr id=\"riga\" bgcolor=\"#ffffd6\">");
						print("<td width=\"100\"><input type='checkbox' name=\"delete[]\" value=\"$i\"></td>");
						$row = dbase_get_record_with_names($dbh, $i);
						print("<td width=\"160\"> ".date("d-m-Y",$row["date"])." </td>");
						print("<td width=\"100\"> <input type=\"text\" size=\"20\" name=\"name_mod[]\" value=\"".trim($row["name"])."\"> </td>");
						print("<td width=\"60\"> <input type=\"text\" size=\"3\" name=\"age_mod[]\" value=\"".trim($row["age"])."\"> </td>");
						print("<td width=\"150\"> <input type=\"text\" size=\"50\" name=\"email_mod[]\" value=\"".trim($row["email"])."\"> </td>");
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

	if (isset($PARAMS["name_mod"])) 
	{
		$name=$PARAMS["name_mod"];
		$age=$PARAMS["age_mod"];
		$email=$PARAMS["email_mod"];
		$num_record=count($name);

		for ($i=0;$i<$num_record;$i++)
		{
			println("$name[$i]-$age[$i]-$email[$i]");
			$record=array(time(),$name[$i],$age[$i],$email[$i],serialize(array(1,2,3)));
			dbase_replace_record($dbh,$record,$i+1);
		}
	}

	if (isset($PARAMS["name_add"])) 
	{
			$name=$PARAMS["name_add"];
			$age=$PARAMS["age_add"];
			$email=$PARAMS["email_add"];

			if($name)
			{
				println("ADD: $name-$age-$email");
				$record=array(time(),$name,$age,$email,serialize(array(1,2,3)));
				dbase_add_record($dbh,$record);
			}
			else
			{
				println("Valorizzare il campo nome.");
			}
			
	}

	if (isset($PARAMS["delete"])) 
	{
		$delete=$PARAMS["delete"];
		foreach ($delete as $key => $value) 
		{
			println("Delete record ->  $value");
			dbase_delete_record($dbh, $value);
		}
		dbase_pack($dbh);
	}
?>

<hmtl>
	<head>
		<title>sorgente: esempio_20.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<form action="" method="POST">
			<?php
				if ($dbh) 
				{
					dbase_printTable($dbh);
					dbase_close($dbh);
				}
			?>
			<table>
				<thead>
					<tr>
						<td width="100"></td>
						<td width="160">Date</td>
						<td width="100">Name</td>
						<td width="60">Age</td>
						<td width="150">eMail</td>
						<td width="150">Numeri</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="100"></td>
						<td width="160"><?php print date("d-m-Y");?></td>
						<td width="100"><input type="text" size="20" name="name_add"></td>
						<td width="60"><input type="text" size="3" name="age_add"></td>
						<td width="150"><input type="text" size="50" name="email_add"></td>
						<td width="150">a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}</td>
					</tr>
					<tr>
						<td colspan="6" align="right">
							<input type="submit" value="Validare">
						</td>
					</tr>
				</tbody>
			</table>

		</form>
	</body>
</hmtl>