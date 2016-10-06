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

		#m30 
		{
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
		include("../assets/lib/my_lib.php");

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

		$functionHolder("Array associativi",$num_capitolo);
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

		$functionHolder("Merge",$num_capitolo);
		$array1=array("a","b","c");
		$array2=array(5,2,3,1,7);

		$array3=array_merge($array1,$array2); /* unisce due array, non modifica i parametri */
		$numero_elementi=count($array3);
		println("L'\$array3 contiene $numero_elementi elementi. !!!!!");
		foreach ($array3 as $key => $value) 
		{
			println("array3[$key]=$value");
		}
		println();

		$functionHolder("Push",$num_capitolo);
		$numero_elementi=array_push($array3, "raffo","vale"); /* aggiunge elementi nell'array passato come parametro, restutuisce il numero di elementi nel array modificato */
		println("il nuovo \$array3 contiene $numero_elementi elementi. !!!!!");
		foreach ($array3 as $key => $value) 
		{
			println("array3[$key]=$value");
		}
		println();

		$functionHolder("Shift",$num_capitolo);
		while(count($array3)) /* array_shift */
		{
			$val=array_shift($array3);
			println("$val");
			println("ci sono ".count($array3)." elementi nell \$array3.");
		}
		println();

		$functionHolder("Slice",$num_capitolo);
		$array3=array_slice($array2, 2,1); /* array_slice */
		foreach ($array3 as $key => $value) 
		{
			println("array3[$key]=$value");
		}
		println();

		$functionHolder("Sort",$num_capitolo);
		sort($array2); /* array_sort */
		foreach ($array2 as $key => $value) 
		{
			println("array2[$key]=$value");
		}
		println();

		$functionHolder("RSort",$num_capitolo);
		sort($array2); /* array_rsort */
		foreach ($array2 as $key => $value) 
		{
			println("array2[$key]=$value");
		}
		println();

		
		$array4=array(
				"Raffaele"=>8,
				"Valeria"=>7,
				"Sofia"=>5,
				"Maria"=>5,
				"Gabriele"=>8
			);

		$functionHolder("ASort",$num_capitolo);
		asort($array4); /* array_asort */
		foreach ($array4 as $key => $value) 
		{
			println("array4[$key]=$value");
		}
		println();

		$functionHolder("ARSort",$num_capitolo);
		arsort($array4); /* array_arsort */
		foreach ($array4 as $key => $value) 
		{
			println("array4[$key]=$value");
		}
		println();

		$functionHolder("KSort",$num_capitolo);
		ksort($array4); /* array_ksort */
		foreach ($array4 as $key => $value) 
		{
			println("array4[$key]=$value");
		}
		println();
		$functionHolder("KRSort",$num_capitolo);
		krsort($array4); /* array_krsort */
		foreach ($array4 as $key => $value) 
		{
			println("array4[$key]=$value");
		}
		println();

	?>
</body>
</hmtl>