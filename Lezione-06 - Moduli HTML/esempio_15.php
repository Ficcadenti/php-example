<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_15.html
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

	$PARAMS=array();
	
	if($_SERVER["REQUEST_METHOD"]=="GET")
	{
		$PARAMS=$_GET;
		println("Chiamnata da un ".$_SERVER["REQUEST_METHOD"]."");
	}
	else if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$PARAMS=$_POST;
		println("Chiamnata da un ".$_SERVER["REQUEST_METHOD"]."");
	}
?>

<hmtl>
	<head>
		<title>sorgente: esempio_15.html</title>
		<!-- Sezione per i CSS -->
		<style>
			b {
			    font-size: 15px;
			    color: #000000;
			}
			b1 {
			    font-size: 30px;
			    color: #0000FF;
			}
			h2 {
				margin-left: 30px;
			}
			#m30 
			{
				margin-left: 30px;
			}
			#m70 {
				margin-left: 70px;
			}
			table {
			    border-collapse: collapse;
			    width: 100%;
			}

			th, td {
			    padding: 8px;
			    text-align: left;
			    border-bottom: 1px solid #ddd;
			}

			tr#riga:hover{background-color:#f5f5f5}
		</style>
	</head>
	<body>
		<?php
			if(isset($_FILES["namefile"]))
			{
				foreach ($_FILES["namefile"] as $key => $value) 
				{
					if(gettype($value)=="array")
					{
						foreach ($value as $key1 => $value1) 
						{
							println("\$_FILES[namefile][$key($key1)](".gettype($value1).") = $value1");
						}
					}
					else
					{
						println("\$_FILES[namefile][$key](".gettype($value).") = $value");
					}
				}
				println();
				if($_FILES["namefile"]["error"]==0)
				{
					$uploaddir = "..\\assets\\temp\\";
					$uploadfile = $uploaddir . basename($_FILES["namefile"]["name"]);

					println("Nome file: ".$uploadfile);
					if (move_uploaded_file($_FILES["namefile"]["tmp_name"], $uploadfile)) 
					{
					    echo "File valido, l'upload è avvenuto con successo.\n";
					    if($_FILES["namefile"]["type"]=="image/jpeg")
					    {
					    	echo "<img src=\"../assets/temp/".$_FILES["namefile"]["name"]."\">";
					    }
					} 
					else 
					{
					    echo "Possibile attacco tramite file upload!\n";
					}
				}
				else
				{
					$errore=$_FILES["namefile"]["error"];
					switch($errore)
					{
						case UPLOAD_ERR_INI_SIZE:
						{
							printH("h1","Valore: 1; Il file inviato eccede le dimensioni specificate nel parametro upload_max_filesize di php.ini. <br>");
						}
						break;

						case UPLOAD_ERR_FORM_SIZE:
						{
							printH("h1","Valore: 2; Il file inviato eccede le dimensioni specificate nel parametro MAX_FILE_SIZE del form. <br>");
						}
						break;

						default:
						{
							println("Errore generico");
						}
						break;
					}
				}
			}
			else
			{
				println("Seleziona un file !!!!");
			}
		?>
		<form enctype="multipart/form-data" action="" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="512000">
			<input type="file" name="namefile"><br>
			<input type="submit" name="upload"><br>
		</form>
		<a href="http://php.net/manual/it/features.file-upload.post-method.php" target="_blank">Metodo POST per caricamento di file.</a>
		<br>
		<a href="http://php.net/manual/en/function.move-uploaded-file.php" target="_blank">Metodo move_uploaded_file().</a>


	</body>
</hmtl>