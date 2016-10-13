<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_35.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 11-10-2016    Ficcadenti Raffaele         
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


	if(isset($PARAMS["rosso"]))
	{
		$red=$PARAMS["rosso"];
		$green=$PARAMS["verde"];
		$blue=$PARAMS["blu"];
	}else
	{
		$red=0;
		$green=0;
		$blue=0;
	}

	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();

?>

<hmtl>
	<head>
		<title>sorgente: esempio_35.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$num_capitolo=capitolo("Stringhe");
			$num=463;

			print("<div id=\"m70\"><pre>");
			printf("Il capitolo attuale è: %20b<br>",$num_capitolo);
			printf("Decimale: %20d<br>",$num);
			printf("Binario: %20b<br>",$num);
			printf("Double: %20.4f<br>",$num);
			printf("Ottale: %20o<br>",$num);
			printf("Stringa: %20s<br>",$num);
			printf("Esadecimale (minuscolo): %'08x<br>",$num);
			printf("Esadecimale (maiuscolo): %'08X<br>",$num);
			print("</pre></div>");
			$num_capitolo=capitolo("Colori");
		?>

		<form id="m70" action="<?php print($_SERVER["PHP_SELF"]) ?>" method="POST">
			<input type="range" name="rosso" min="0" max="255" step="1" <?php print("value=\"$red\"") ?>><font color=<?php printf("\"#%02X0000\"",$red)?>>Rosso</font><br>
			<input type="range" name="verde" min="0" max="255" step="1" <?php print("value=\"$green\"") ?>><font color=<?php printf("\"#00%02X00\"",$green)?>>Verde</font><br>
			<input type="range" name="blu" min="0" max="255" step="1" <?php print("value=\"$blue\"") ?>><font color=<?php printf("\"#0000%02X\"",$blue)?>>Blu</font><br>
			<input type="submit" value="Go!">
		</form>
		
		<?php
			print("<div id=\"m70\">");
			printf("RGB(%d,%d,%d): <font color=\"#%02x%02x%02x\">#%02X%02X%02X</font><br>",$red,$green,$blue,$red,$green,$blue,$red,$green,$blue);
			print("</div>");

			$num_capitolo=capitolo("Allineamento");
			
			$prodotti=array(
					"Latte"=>"1.84",
					"Pane"=>"2,1",
					"Marmellata"=>"5,12");

			print("<div id=\"m70\">");
				print("<pre>");
				printf("%-20s%23s\n","Prodotto","Prezzo");
				printf("%'-43s\n","");
				foreach ($prodotti as $key => $value) 
				{
					$str=sprintf("%-20s%23.2f\n",$key,$value);
					print($str);
				}
				print("</pre>");
			print("</div>");

			$num_capitolo=capitolo("Analisi di stringhe");
			$str="raffaele.ficcadenti@gmail.com";
			$str1="raff";
			$len=strlen($str);

			print("<div id=\"m70\">");
				for($i=0;$i<$len;$i++)
				{
					printf("%d => %s<br>",$i,$str[$i]);
				}

				println();
				$res=strstr($str,$str1,true);

				if($res===false)
				{
					printf("La stringa %s NON è presente in %s<br>",$str1,$str);
				}
				else
				{
					printf("La stringa '%s' è presente in '%s' prima di lei c'è: '%s'<br>",$str1,$str,$res);
				}

				$res=stristr($str,$str1);
				if($res)
				{
					printf("La stringa '%s' è presente in '%s' dopo di lei(inclusa) c'è: '%s'<br>",$str1,$str,$res);
				}
				else
				{
					printf("La stringa %s NON è presente in %s<br>",$str1,$str);
				}

				$pos=strpos($str,$str1);

				if(($pos)||($pos===0))
				{
					printf("La stringa '%s' è presente in '%s' alla posizione %d<br>",$str1,$str,$pos);
				}
				else
				{
					printf("La stringa %s NON è presente in %s<br>",$str1,$str);
				}

				$pos_start=20;
				$n_char=5;
				$str2=substr($str,$pos_start);
				printf("Substring di %s a partire dalla posizione %d: '%s'<br>",$str,$pos_start,$str2);

				$str2=substr($str,$pos_start,$n_char);
				printf("Substring di %s a partire dalla posizione %d e di %d caratteri: '%s'<br>",$str,$pos_start,$n_char,$str2);

				$str4="Raffaele-,Valeria-,Sofia-,Maria-,Gabriele-,Francesco";
				$str_delimitatore="-,";

				$parola=strtok($str4, $str_delimitatore);

				while (is_string($parola))
				{
					printf("%s<br>",$parola);
					$parola=strtok($str_delimitatore);
				}

				$str5="                Io Sono Piena di Spazi      ";

				print("<pre>");
				printf("[%s]\n",$str5);
				$str5=ltrim($str5);
				printf("ltrim->[%s]\n",$str5);
				$str5=rtrim($str5);
				printf("rtrim->[%s]\n",$str5);
				print("</pre>");

				$str6="valeria5.greco@e-tech.net";
				$pos=15;
				$n_char=10;

				$str_temp=substr_replace($str6, "gmail.com", $pos,$n_char);
				printf("La vecchia stringa '%s' è diventata '%s'<br>",$str6,$str_temp);

				$str_temp=str_replace("a","A",$str6);
				$str_temp=str_replace("e","E",$str_temp);
				printf("La vecchia stringa '%s' è diventata '%s'<br>",$str6,$str_temp);

				$str7="HTTP://WWW.RAFFAELEFICCADENTI.IT";
				$str_temp=strtolower($str7);
				printf("La vecchia stringa '%s' è diventata <a href=\"%s\" target=\"_blank\">%s</a><br>",$str7,$str_temp,$str_temp);
				$str7=strtoupper($str_temp);
				printf("La nuova stringa '%s' è tornata <a href=\"%s\" target=\"_blank\">%s</a><br>",$str_temp,strtolower($str7),$str7);
				println();
				
				$str4="Raffaele Valeria Sofia Maria Gabriele Francesco";
				$str_delimitatore=" ";
				$str_array=explode($str_delimitatore,$str4);

				foreach ($str_array as $key => $value) 
				{
					printf("%d => %s<br>",$key,$value);
				}

			print("</div>");

			$num_capitolo=capitolo("info");
		?>

		<a href="http://php.net/manual/it/function.printf.php" target="_blank">PHP printf()</a><br>
		<a href="http://php.net/manual/it/function.sprintf.php" target="_blank">PHP sprintf()</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>