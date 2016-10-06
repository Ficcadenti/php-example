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
	include("../assets/lib/test_include.html");
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
		include ("../assets/css/default.css");
	?>

	</head>
	<body>
		<?php

			$nome_file="phpinfo.php";
			$num_capitolo=capitolo("File");
			$time_file=array(
				"atime"=>array("Ultimo accesso","0"),
				"mtime"=>array("Modificato","0"),
				"ctime"=>array("Creato","0"),
				);

			print("<div id=\"m30\">");
			if( file_exists($nome_file) )
			{
				println("Il file '$nome_file' esiste");
				if(is_file($nome_file))
				{
					println("ed è un file");
				}
				else if(is_dir($nome_file))
				{
					println("ed è una directory");
				}
				else if(is_link($nome_file))
				{
					println("ed è link");
				}

				if(is_readable($nome_file))
				{
					println("$nome_file è leggibile.");
				}
				else
				{
					println("$nome_file non è leggibile.");
				}


				if(is_writable($nome_file))
				{
					println("$nome_file è scrivibile.");
				}
				else
				{
					println("$nome_file non è scrivibile.");
				}


				if(is_executable($nome_file))
				{
					println("$nome_file è eseguibile.");
				}
				else
				{
					println("$nome_file non è eseguibile.");
				}

				$file_size=FileSizeConvert(filesize($nome_file));
				println("La dimensione di $nome_file è $file_size");

				$time_file["atime"][1]=fileatime($nome_file);
				$time_file["mtime"][1]=filemtime($nome_file);
				$time_file["ctime"][1]=filectime($nome_file);

				foreach ($time_file as $key => $value)
				{
					println("$value[0][$nome_file] = ".date("D, d M Y H:i:s",$value[1]) );
				}
			}
			else
			{
				println("Il file '$nome_file' NON esiste");	
			}
			print("</div>");
		?>
		<br>
		<a href="http://php.net/manual/en/function.date.php" target="_blank">PHP date()</a><br>
		<a href="http://php.net/manual/en/function.date-default-timezone-set.php" target="_blank">PHP date_default_timezone_set()</a><br>
		<a href="http://php.net/manual/en/ref.filesystem.php" target="_blank">PHP Filesystem Functions</a><br>

		
	</body>
</hmtl>