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
		<title>sorgente: esempio_16.html</title>
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
		?>
	</body>
</hmtl>