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
			$num_capitolo=capitolo("More info");
		?>

		<a href="http://php.net/manual/en/function.date.php" target="_blank">PHP date()</a><br>

	</body>
</hmtl>