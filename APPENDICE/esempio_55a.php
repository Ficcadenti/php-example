<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_55a.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 02-11-2016    Ficcadenti Raffaele         
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
	

	function stampaArray($arr)
	{
		foreach ($arr as $key => $value) 
		{
			println("$key => $value");		
		}
	}

?>

<?php
	require_once("../assets/lib/myMail.php");
?>

<hmtl>
	<head>
		<title>sorgente: esempio_55a.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$num_capitolo=capitolo("Classe per inviare un e-Mail.");
			print("<div id=\"m70\">\n");
			
			$mail = new Email("Utilizzo della classe myMail", getMIME("MULTI"));
			/* Codice per aggiungere i destinatari */
			$mail->destinatario("Raffaele Ficcadenti <rficcad@e-tech.net>");
			$mail->destinatario("Raffo <raffaele.ficcadenti@gmail.com>");
			$mail->from("Mittente <ficcadenti@asdc.asi.it>");
			$mail->replyTo("Risposta <ficcadenti@asdc.asi.it>");
			$mail->blocco(getMIME("TEXT"), "email formato testo!!");
			$mail->blocco(getMIME("HTML"), "<h3>email formato HTML<h3>");
			$mail->allegato("pic1.jpg","pic1.jpg",getMIME("JPG"),"Immagine1");
			$mail->allegato("pic.jpg","pic.jpg",getMIME("JPG"),"Immagine2");
			$mail->allegato("mod69.pdf","mod69.pdf",getMIME("PDF"),"PDF");

			$mail->stampa();
			$inviata = $mail->invia();
			if ($inviata) 
			{
				println("Email con allegato inviata con successo!");
			}
			else
			{
				println("Errore durante l'invio dell'email con allegato");
			}


			print("</div>\n");
		?>
		
		<?php
			$num_capitolo=capitolo("info");
		?>

		
		<a href="http://php.net/manual/en/function.base64-encode.php" target="_blank">PHP base64_encode</a><br>
		<a href="http://php.net/manual/en/function.mail.php" target="_blank">PHP mail</a><br>
		<a href="http://php.net/manual/en/internals2.opcodes.instanceof.php" target="_blank">PHP instanceof</a><br>
		<a href="http://www.html.it/articoli/e-mail-in-formato-html-con-php-2/" target="_blank">HTML.it: E-mail in formato HTML con PHP </a><br>
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>