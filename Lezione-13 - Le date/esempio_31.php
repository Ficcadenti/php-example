<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_31.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 06-10-2016    Ficcadenti Raffaele         
	# -
	#
-->
<?php
	define("ADAY",60*60*24);
	define("DOMENICA",6);
	define("SABATO",0);
	$festivi=array(array("25","12"),array("1","11"),array("8","12"),array("6","1"));

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

	function stampaErrorre($type,$str)
	{
		echo "<font color=\"red\">$type : $str </font><br>";
	}

	function str_bool($val)
	{
		$str="false";
		if($val>0) $str="true";
		return $str;
	}

	function isFestivo($start)
	{
		global $festivi;
		$result=false;
		$dayArray=getdate($start);

		if( ($dayArray["wday"]==DOMENICA) or ($dayArray["wday"]==SABATO) )
		{
			$result=true;
		}
		else
		{
			foreach ($festivi as $value) 
			{
				$giorno=$value[0];
				$mese=$value[1];

				if( ($dayArray["mday"]==$giorno) and ($dayArray["mon"]==$mese) )
				{
					$result=true;
					break;
				}
			}
		}

		return $result;
	}

	function stampaFestivo($str)
	{
		$str="<strong><font color=\"red\">$str</font></strong>";
		return $str;
	}

	function stampaOggi($str)
	{
		$str="<strong><font color=\"blue\">$str</font></strong>";
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

	if(!isset($PARAMS["mese"]))
	{

		$nowArray=getDate();
		$mese=$nowArray["mon"];
		$anno=$nowArray["year"];
		println("mese=$mese,anno=$anno");
	}
	else
	{
		$mese=$PARAMS["mese"];
		$anno=$PARAMS["anno"];
	}


	$start=mktime(0,0,0,$mese,1,$anno);
	$firstDateArray=getdate($start);

	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();

?>

<hmtl>
	<head>
		<title>
			<?php 
				print("Calendario: $firstDateArray[month]-$firstDateArray[year]");
			?>
		</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Rome');

			showEnvironment();
			println();
			$num_capitolo=capitolo("Calendario");
		?>
		
		<form action="<?php print($_SERVER["PHP_SELF"]) ?>" method="POST">
			<select name="mese">
			<?php
				$mesi=array("January","February","March","April","May","June","July","August","September","October","November","December");
				for($i=0;$i<count($mesi);$i++)
				{
					print("<option value=\"".($i+1)."\"");
					if( $i==($mese-1) )
					{
						print(" selected>$mesi[$i]");
					}
					else
					{
						print(">$mesi[$i]");
					}
					print("</option>");
				}
			?>
			</select>

			<select name="anno">
			<?php
				for($i=1990;$i<=2020;$i++)
				{
					print("<option values=\"$i\"");
					if( $i==$anno )
					{
						print(" selected>$i");
					}
					else
					{
						print(">$i");
					}
					print("</option>");
				}
			?>
			</select>

			<input type="submit" value="Go!">
		</form>

		<?php
			$days=array("Domenica","Lunedi","Martedi","Mercoledi","Giovedi","Venerdi","Sabato");
			println("Calendario: ".date("F\-Y",$start));
			println();
			print("<table>");
			print("<thead>");
				print("<tr>");
					foreach ($days as $key => $value) 
					{
						if(($key==SABATO)or($key==DOMENICA))
						{
							print("<td><strong>".stampaFestivo($value)."</strong></td>");
						}
						else
						{
							print("<td><strong>$value</strong></td>");
						}
					}
				print("</tr>");
				for($count=0;$count<50;$count++)
				{
					$dayArray=getdate($start);
					
					if(($count%7)==0)
					{
						if($dayArray["mon"]!=$mese)
						{
							break;
						}
						print("</tr><tr>");
					}
					if($count<$firstDateArray["wday"] || $dayArray["mon"]!=$mese)
					{
						print("<td></td>");
					}
					else
					{
						if(isFestivo($start))
						{
							print("<td>".stampaFestivo($dayArray["mday"])."</td>");
						}
						else
						{
							print("<td>".$dayArray["mday"]."</td>");
						}
						$start+=ADAY;
					}
				}
			print("<thead>");
			print("</table>");
			$num_capitolo=capitolo("More info");
		?>

		<a href="http://php.net/manual/en/function.date.php" target="_blank">PHP date()</a><br>

	</body>
</hmtl>