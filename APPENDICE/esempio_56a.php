<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_56a.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 07-11-2016    Ficcadenti Raffaele         
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
		print("<$h>$str</$h>\n"); // funzione definita dall'utente
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

	function stampaArray($arr)
	{
		foreach ($arr as $key => $value) 
		{
			println("$key => $value");		
		}
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
	$sys = strtoupper(PHP_OS);
	println("OS: $sys");

?>

<?php
	require_once("../assets/lib/myFile.php");
?>

<hmtl>
	<head>
		<title>sorgente: esempio_56a.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$num_capitolo=capitolo("Upload di un file con classe personalizzata.");
			print("<div id=\"m70\">\n");
			
			if(!isset($_FILES["fileupload"]))
			{
				println("Seleziona un file da inviare:");
			}
			else
			{
				try
				{
					$file = new File("fileupload", "../assets/uploads/");
					$file->tipo(getMIME("JPEG"), getMIME("PNG")); // Accettate solo immagini in formato JPEG o PNG
					$file->dimensione(500, "kb"); // Solo immagini più piccole di 100Kb
					$file->sposta(); // Sposta il file inviato nella cartella di destinazione
					
					println("Nome file : $file");
					println();
					println($file->immagine("../assets/uploads/", "Immagine inviata")); // Visualizza l'immagine appena inviata
				}
				catch (ErroreFile $e)
				{ 
					println($e->messaggio()); 
				}
				catch (Exception $e)
				{ 
					println($e->getMessage()); 
				}
			}

			print("</div>\n");
		?>
		
		<!-- invio_file.html -->
		<div id="m70">
			<form enctype="multipart/form-data" action="<?php print($_SERVER["PHP_SELF"]) ?>" method="post">
				<input type="file" name="fileupload" />
				<br />
				<input type="submit" value="Invia file" />
			</form>
		</div>

		<?php
			$num_capitolo=capitolo("info");
		?>

		
		<a href="http://php.net/manual/en/function.getimagesize.php" target="_blank">PHP getimagesize()</a><br>
		<a href="http://php.net/manual/en/function.func-num-args.php" target="_blank">PHP func_num_args()</a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>