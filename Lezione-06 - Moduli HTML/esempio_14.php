<!--
	# 
	# MODULE DESCRIPTION:
	# esempio_14.html
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
	
	if(($_SERVER["REQUEST_METHOD"]=="GET")&&(isset($_GET["guess"]))) 
	{
		$PARAMS=$_GET;
		println("Chiamnata da un ".$_SERVER["REQUEST_METHOD"]."");
	}
	else if(($_SERVER["REQUEST_METHOD"]=="POST")&&(isset($_POST["guess"]))) 
	{
		$PARAMS=$_POST;
		println("Chiamnata da un ".$_SERVER["REQUEST_METHOD"]."");
	}

	$numero_to_guess=10;

	/*if(isset($PARAMS["num_tries"]))
	{
		$num_tries=$PARAMS["num_tries"]+1;
	}
	else
	{
		$$num_tries=0;
	}*/
	$num_tries=isset($PARAMS["num_tries"])?$PARAMS["num_tries"]+1:0;
	$numero_to_guess=10;

	$message = "";
	
	if (!isset($PARAMS["guess"])) 
	{
		println("Benvenuto su quest'esempio !!!!");
		println();
	}
	else
	{
		$numero=$PARAMS["guess"];

		if($numero>$numero_to_guess)
		{
			$message="Il numero $numero è troppo grande!!!! Riprova.";
		}
		else if($numero<$numero_to_guess)
		{
			$message="Il numero $numero è troppo piccolo!!!! Riprova.";
		}
		else
		{
			$message="Il numero $numero è esatto";
			header("Location: esempio_14_ok.html");
		}
	}

?>

<hmtl>
	<head>
		<title>sorgente: esempio_14.html</title>
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
		<h1>
			<?php println($message)?>
		</h1>
		Numero di tentativi: <?php println($num_tries)?>
		<form action="<?php print($_SERVER["PHP_SELF"]) ?>" method="POST">
			Digita la tua ipotesi qui (compresa tra 0 e 100): <input type="text" name="guess">
			<input type="hidden" name="num_tries" value="<?php print($num_tries) ?>">
		</form>
	</body>
</hmtl>