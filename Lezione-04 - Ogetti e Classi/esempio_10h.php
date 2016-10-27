<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_10h.php
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
<hmtl>
<head>
	<title>sorgente: esempio_10h.php</title>
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
	<!-- Codice PHP -->
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
	?>
	<?php
		$num_capitolo=capitolo("Liste concatenate");
		print("<div id=\"m70\">");

		class nodo
		{
			var $valore;
			var $next;

			function nodo($valore,&$next=null)
			{
				$this->valore=$valore;
				$this->next=$next;
			}
		}

		$n=new nodo(rand(0,100));
		$n1=new nodo(rand(0,100),$n);
		$n2=new nodo(rand(0,100),$n1);

		while($n2!=null)
		{
			println($n2->valore);		
			$n2=&$n2->next;
		}

		print("</div>");


		$num_capitolo=capitolo("info");
	?>

	<a href="http://www.w3schools.com/php/" target="_blank">w3schools<span class="dotcom">.com</span></a><br>
</body>
</hmtl>