<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_16.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 19-09-2016    Ficcadenti Raffaele         
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
	<title>sorgente: esempio_16.html</title>
	<!-- Sezione per i CSS -->
	<!-- load stylesheet -->
	<?php
		/*echo file_get_contents("components/stylesheet.html");*/
		include ("css/default.css");
	?>

	</head>
	<body>
		<?php
			$nome_file="php-example.sql";
			$time_file=array(
				"atime"=>array("Ultimo accesso","0"),
				"mtime"=>array("Modificato","0"),
				"ctime"=>array("Creato","0"),
				);

			$time_file["atime"][1]=fileatime($nome_file);
			$time_file["mtime"][1]=filemtime($nome_file);
			$time_file["ctime"][1]=filectime($nome_file);

		
			$num_capitolo=capitolo("File: $nome_file");
			paragrafo("Info",$num_capitolo);
			print("<div id=\"m70\">");
				foreach ($time_file as $key => $value)
				{
					println("$value[0][$nome_file] = ".date("D, d M Y H:i:s",$value[1]) );
				}
			print("</div>");


			paragrafo("Contenuto",$num_capitolo);
			print("<div id=\"m70\">");
				$fp=fopen($nome_file,"r") or die ("non posso aprire $nome_file");
				while (!feof($fp))
				{
					$line=fgets($fp,1024);
					println($line);
				}
				fclose($fp);
			print("</div>");
		?>
	</body>
</hmtl>