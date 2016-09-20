<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_09.php
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
	<title>sorgente: esempio_09.php</title>
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

		#m30 {
			margin-left: 30px;
		}
		#m70 {
			margin-left: 70px;
		}

		ul#test {
			 list-style: none;
			 margin-left: 0;
			 padding-left: 1em;
			 text-indent: -1em;
		}
		ul#test li:before {
 			content: "\0BB \020";
 		}

 		ul#menu {
		    font-family: Verdana, sans-serif;
		    font-size: 12px;
		    margin: 0;
		    padding: 0;
		    list-style: none;
		}
		ul#menu li {
		    background-color: #00FF00;
		    border-left: 5px solid #54BAE2;
		    display: block;
		    width: 150px;
		    height: 30px;
		    margin: 2px 0;
		}
		ul#menu li a {
		    color: #fff;
		    display: block;
		    font-weight: bold;
		    line-height: 30px;
		    padding-left: 15px;
		    text-decoration: none;
		    width: 135px; /* 150px - 15px (padding) */
		    height: 30px;
		}
		ul#menu li.active, ul#menu li:hover {
		    background-color: #54BAE2;
		    border-left: 5px solid #FF831C;
		}

	</style>
</head>
<body>
	<!-- Codice PHP -->
	<?php
		include("./my_lib.php");

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

		function elencoPuntato($elenco,$stile="test")
		{
			println("<ul  id=\"$stile\">");
			foreach ($elenco as $value) 
			{
				print("<li><a>$value</a></li>");
			}
			println("</ul>");
		}		
	?>
	<?php
		
		$famiglia=array("Valeria","Raffaele","Sofia","Maria","Gabriele");
		$famiglia[]="Francesco";

		$functionHolder="capitolo";
		$num_capitolo=$functionHolder("Array");
		
		$functionHolder="paragrafo";
		$functionHolder("Famiglia",$num_capitolo);
		$functionHolder("Componenti",$num_capitolo);

		mySort_dec($famiglia);
		print("<div id=\"m70\">");
		elencoPuntato($famiglia,"menu");
		print ("</div>");

		$contatti=array(
			array(
				"nome"=>"Raffaele",
				"cognome"=>"Ficcadenti",
				"email"=>"raffaele.ficcadenti@gmail.com",
				"telefono"=>"3404020010",
				"www"=>"http://www.raffaeleficcadenti.it"),
			array(
				"nome"=>"Valeria",
				"cognome"=>"Greco",
				"email"=>"valeria5.greco@gmail.com",
				"telefono"=>"3408676455",
				"www"=>""
			),
			10
			);

		var_dump($contatti);

		foreach ($contatti as $value) 
		{
			if( is_array($value) )
			{
				foreach ($value as $key => $val) 
				{
					//var_dump($val);
					println("$key : $val");
				}
			}
			else
			{
				println("$value");
			}
			println();

		}
	?>
</body>
