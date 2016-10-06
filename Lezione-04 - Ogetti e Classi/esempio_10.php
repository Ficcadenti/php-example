<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_10.php
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
	<title>sorgente: esempio_10.php</title>
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
	?>
	<?php
		class prima_classe
		{
			var $nome="Raffaele";
			var $eta=40;

			function prima_classe($nome="Raffaele",$eta=40)
			{
				$this->setNome($nome);
				$this->setEta($eta);
			}

			function setNome($nome)
			{
				$this->nome=$nome;
			}
			
			function setEta($eta)
			{
				$this->eta=$eta;
			}

			function stampa()
			{
				println("Nome=$this->nome");
				println("Età=$this->eta");
			}
		}

		$obj1=new prima_classe("Valeria",40);
		$obj2=new prima_classe("Gabriele",2);
		$obj3=new prima_classe("Maria",6);
		$obj4=new prima_classe();

		$famiglia=array($obj1,$obj2,$obj3,$obj4);

		$num_capitolo=capitolo("Classi ed oggetti");
		print("<p id=\"m30\">");
		var_dump($obj1);
		println();
		var_dump($obj2);
		println();
		print("<p>");

		paragrafo("Oggetti",$num_capitolo);
		print("<p id=\"m70\">");
			println("\$obj1 è di tipo: ".gettype($obj1));
			println("\$obj1 è di tipo: ".gettype($obj1));
		print("</p>");

		paragrafo("Accesso all'oggetto",$num_capitolo);	
		print("<p id=\"m70\">");
			$obj2->setNome("Sofia");
			$obj2->setEta(8);
			
			foreach ($famiglia as $value) 
			{
				$value->stampa();
				println();
			}
		print("</p>");		
	?>
</body>
</hmtl>