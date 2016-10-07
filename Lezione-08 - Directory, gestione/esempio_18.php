<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_18.html
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
	<title>sorgente: esempio_18.html</title>
	<!-- Sezione per i CSS -->
	<!-- load default.css -->
	<?php
		include ("../assets/css/default.css");
	?>

	</head>
	<body>
		<?php
			$num_capitolo=capitolo("Directory");
			
			paragrafo("Creazione, eliminazione",$num_capitolo);
			print("<div id=\"m70\">");
				$nome_dir="testdir";
				if(mkdir($nome_dir,0777))
				{
					println("La directory $nome_dir è stata creata.");
				}
				else
				{
					println("La directory $nome_dir non è stata creata.");
				}

				if(rmdir($nome_dir))
				{
					println("La directory $nome_dir è stata rimossa.");
				}
				else
				{
					println("La directory $nome_dir non è stata rimossa.");
				}
			print("</div>");

			
			paragrafo("Lettura",$num_capitolo);
			$nome_dir="../assets/temp";
			$dh=opendir($nome_dir);
			print("<div id=\"m70\">");
				leggiDirTree($nome_dir);
			print("</div>");
		?>
	</body>
</hmtl>