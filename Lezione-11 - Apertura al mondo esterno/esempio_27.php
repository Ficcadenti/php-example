<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_27.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 05-10-2016    Ficcadenti Raffaele         
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


	println("<strong>Codice sorgente: </strong>".$_SERVER["PHP_SELF"]);
	println();
?>

<hmtl>
	<head>
		<title>sorgente: esempio_27.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			showEnvironment();

			//metti come secondo parametro l'indirizzo del server SMTP
			ini_set("SMTP","cannonau.asdc.asi.it");
			//metti come secondo parametro il la porta del server SMTP
			ini_set("smtp_port","25");
			//metti come secondo parametro l'indirizzo e-mail del mittente
			ini_set("sendmail_from","raffaele.ficcadenti@asdc.asi.it");

			// definisco mittente e destinatario della mail
			$nome_mittente = "Raffaele Ficcadenti";
			$mail_mittente = "raffaele.ficcadenti@asdc.asi.it";
			$mail_destinatario = "rficcad@e-tech.net";

			// definisco il subject ed il body della mail
			$mail_oggetto = "Messaggio di prova4";
			$mail_corpo = "Questo e' un messaggio di prova inviato mediante PHP(".phpversion().")per testare la mia applicazione";

			// aggiusto un po' le intestazioni della mail
			// E' in questa sezione che deve essere definito il mittente (From)
			// ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
			$mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
			$mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
			$mail_headers .= "X-Mailer: PHP/" . phpversion();

			if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers))
			{
				println("Messaggio inviato con successo a  $mail_destinatario");
			}
			else
			{
				println("Errore. Nessun messaggio inviato.");
			}


		?>
		<br>
		<a href="http://php.net/manual/en/reserved.variables.server.php" target="_blank">$_SERVER</a><br>
		<a href="http://php.net/manual/en/book.mail.php" target="_blank">mail()</a><br>
	</body>
</hmtl>