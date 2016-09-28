<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_21.html
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
?>

<hmtl>
	<head>
		<title>sorgente: esempio_21.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("css/default.css");
		?>
	</head>
	<body>
		<?php
			$num_capitolo=capitolo("Database: MySQL");
			paragrafo("Aprire connessione",$num_capitolo);
			print("<div id=\"m70\">");
				
				$conn = new mysqli("localhost","root","root","php-example");
				// Check connection
				if ($conn->connect_error) 
				{
					die( $conn->connect_error);
				}
				else
				{
					println("Connessione MySQLi OK!!!!");
					println();
					print_r($conn);

					$conn->close();
				}

				// collegamento al database
				$col = 'mysql:host=localhost;dbname=php-example';

				// blocco try per il lancio dell'istruzione
				try 
				{
				  	// connessione tramite creazione di un oggetto PDO
				  	$db = new PDO($col , 'root', 'root');
				  	println("Connessione PDO OK!!!!");
					var_dump($db);
					println();
					$db = null;
				}
				// blocco catch per la gestione delle eccezioni
				catch(PDOException $e) 
				{
					// notifica in caso di errorre
					echo 'Attenzione: '.$e->getMessage();
				}

			print("</div>");
			$num_capitolo=capitolo("Info");
		?>
		<a href="http://www.html.it/pag/16420/introduzione29/" target="_blank">MySQL, MySQLi, PDO</a>
	</body>
</hmtl>