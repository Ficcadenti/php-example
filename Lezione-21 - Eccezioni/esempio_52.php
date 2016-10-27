<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_52.html
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 25-10-2016    Ficcadenti Raffaele         
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
	class Utente
	{
		public $nome_utente;
		public $pass_utente;

		public function Utente($n, $p)
		{
			if (strlen($n) > ErroriUtente::MAX_LUNGHEZZA)
			{
				throw new ErroriUtente($n);
			}

			if (strlen($p) > ErroriUtente::MAX_LUNGHEZZA)
			{
				throw new ErroriUtente($p);
			}

			$this->nome_utente = $n;
			$this->pass_utente = $p;
		}
	}

	class ErroriUtente extends Exception
	{
		const MAX_LUNGHEZZA = 20;
		private $errore;

		public function ErroriUtente($stringa)
		{
			$this->errore = "Errore : La lunghezza massima consentita è	" . self::MAX_LUNGHEZZA;
			$this->errore .= "\n<br />\"$stringa\" è di " .
			strlen($stringa) . " caratteri!";
		}

		private function stampaLink($pagina = "registrazione.php")
		{
			echo "<a href=\"$pagina\">Torna indietro</a> per reinserire i dati.";
		}

		public function stampaMessaggio($link = false)
		{
			echo $this->errore . "<br /><br />\n\n";
			if ($link) 
			{
				$this->stampaLink();
			}
		}
	}

	function registraUtente(Utente $utente)
	{
		// ... codice per registrare l'utente nel database
		$registrato = false; // Simuliamo una registrazione avvenuta con	successo
		if ($registrato)
		{
			echo "Utente registrato con successo!";
		}
		else
		{
			throw new Exception("Impossibile registrare l'utente,riprova più tardi!");
		}
	}

?>

<hmtl>
	<head>
		<title>sorgente: esempio_52.html</title>
		<!-- Sezione per i CSS -->
		<!-- load default.css -->
		<?php
			include ("../assets/css/default.css");
		?>
	</head>
	<body>
		<?php

			$num_capitolo=capitolo("Eccezioni.");
			paragrafo("Estendiamo la classe exception.",$num_capitolo);
			print("<div id=\"m70\">\n");

			try
			{
				$utente = new Utente("Valeria Greco","raffo");
				registraUtente($utente);
			}
			catch (ErroriUtente $e)
			{
				$e->stampaMessaggio(false);
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
			}

			print("</div>\n");
		?>
		
		<?php
			$num_capitolo=capitolo("info");
		?>

		<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
	</body>
</hmtl>