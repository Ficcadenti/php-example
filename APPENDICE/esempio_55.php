<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_55.html
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
		<title>sorgente: esempio_55.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php
			$num_capitolo=capitolo("Inviare un e-Mail.");
			print("<div id=\"m70\">\n");
			//define("EOL", "\r\n");

			/*$header = "MIME-Version: 1.0" . EOL;
			$header .= "Content-Type: text/html" . EOL;
			$header .= "From: raffaele.ficcadenti@asdc.asi.it";
			$object = "Prova e-mail senza allegato in PHP";
			$message = "Linea 1: Questa è una prova di email<br />Linea 2: Questa è una prova di email<br />Linea 3: Questa è una prova di email";
			$destinatari = "Raffaele Ficcadenti <rficcad@e-tech.net>, Raffo <raffaele.ficcadenti@gmail.com>";

			
			$inviata=mail($destinatari, $object, $message, $header);
			if ($inviata) 
			{
				println("Email senza allegati inviata con successo!");
			}
			else
			{
				println("Errore durante l'invio dell'email senza allegati");
			}*/

			$semi_rand = md5(date('r', time()));
			$mime_boundary = "$semi_rand";

			$mittente ="ficcadenti@asdc.asi.it";
			$messaggio_html ="<h1>La mia prima e-mail con PHP<h1>";
			$messaggio_plain = "Corpo del messaggio";
			$destinatari = "Raffaele Ficcadenti <rficcad@e-tech.net>, Raffo <raffaele.ficcadenti@gmail.com>";
			$replay_to = "rficcad@e-tech.net";
			$object = "Prova e-mail con allegato in PHP";
			
			$attachment_name="pic.jpg";
			$file = @fopen($attachment_name, "r");
			$attachment = fread($file, filesize($attachment_name));
			$attachment = chunk_split(base64_encode($attachment));

			$attachment_name1="pic1.jpg";
			$file1 = @fopen($attachment_name1, "r");
			$attachment1 = fread($file1, filesize($attachment_name1));
			$attachment1 = chunk_split(base64_encode($attachment1));

			//$attachment = chunk_split(base64_encode(file_get_contents($attachment_name)));
			// Creo altre due variabili ad uno interno
			
			$msg = "";

			// Aggiungo le intestazioni necessarie per l'allegato
  			$headers  = "MIME-Version: 1.0". EOL;
  			$headers .= "From: " . $mittente . EOL;
  			$headers .= "Replay-to: " . $replay_to . EOL;
  			$headers .= "Content-Type: multipart/mixed; boundary=\"PHP-mixed-$mime_boundary\"". EOL;
  			$headers .= "Content-Transfer-Encoding: 8bit". EOL. EOL;
  			

			// Metto il separatore
			$msg .= "--PHP-mixed-$mime_boundary" . EOL;



			// Questa è la parte "testuale" del messaggio
			$msg .= "Content-Type: multipart/alternative; boundary=\"PHP-alt-$mime_boundary\"". EOL. EOL;

			// Metto il separatore
			$msg .= "--PHP-alt-$mime_boundary". EOL;
				$msg .= "Content-Type: ".getMIME("TEXT")."; charset=\"iso-8859-1\"". EOL;
				$msg .= "Content-Transfer-Encoding: 7bit". EOL. EOL;
				$msg .= $messaggio_plain . "". EOL. EOL;
			// Metto il separatore
			$msg .= "--PHP-alt-$mime_boundary". EOL;
				$msg .= "Content-Type: ".getMIME("HTML")."; charset=\"iso-8859-1\"". EOL;
				$msg .= "Content-Transfer-Encoding: 7bit". EOL. EOL;
				$msg .= $messaggio_html . "". EOL. EOL;
			// Metto il separatore
			$msg .= "--PHP-alt-$mime_boundary--". EOL . EOL;

			// Metto il separatore
			$msg .= "--PHP-mixed-$mime_boundary" . EOL;
				// Aggiungo l'allegato al messaggio
				$msg .= "Content-Type: ".getMIME("JPG")."; charset=\"utf-8\"; name=\"$attachment_name\"" . EOL;
				$msg .= "Content-Transfer-Encoding: base64" . EOL;
				$msg .= "Content-Description: Immagine" . EOL;
				$msg .= "Content-Disposition: attachment; filename=\"$attachment_name\"" . EOL. EOL;
				$msg .= $attachment;

			// Metto il separatore
			$msg .= "--PHP-mixed-$mime_boundary" . EOL;
				// Aggiungo l'allegato al messaggio
				$msg .= "Content-Type: ".getMIME("JPG")."; charset=\"utf-8\"; name=\"$attachment_name1\"" . EOL;
				$msg .= "Content-Transfer-Encoding: base64" . EOL;
				$msg .= "Content-Description: Immagine" . EOL;
				$msg .= "Content-Disposition: attachment; filename=\"$attachment_name1\"" . EOL. EOL;
				$msg .= $attachment1;


			// Metto il separatore
			$msg .= "--PHP-mixed-$mime_boundary--" . EOL;
			/*$allegato = new Allegato("pic.jpg","pic.jpg",getMIME("JPG"),$mime_boundary,"Immagine");
			$msg .= $allegato;

			$allegato= new Allegato("pic1.jpg","pic1.jpg",getMIME("JPG"),$mime_boundary,"Immagine");
			$msg .= $allegato;

			$allegato= new Allegato("mod69.pdf","mod69.pdf",getMIME("PDF"),$mime_boundary,"PDF");
			$msg .= $allegato;*/

			$msg .= "--PHP-mixed-$mime_boundary--" . EOL;
			

			$inviata=mail($destinatari, $object, $msg, $headers);
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
		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>