<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_10f.php
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
	<title>sorgente: esempio_10f.php</title>
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
		abstract class Animale
		{
			protected $zampe;
			
			protected function Animale($z)
			{
				$this->zampe = $z;
			}
		
			public function numeroZampe()
			{
				echo println($this->zampe);
			}

			abstract protected function suono();
		}

		class Cane extends Animale
		{
			public function Cane($zampe)
			{
				Animale::Animale($zampe);
			}

			public function suono()
			{ 
				println("bau!"); 
			}
		}

		class Gatto extends Animale
		{
			public function Gatto($zampe)
			{
				Animale::Animale($zampe);
			}

			public function suono()
			{ 
				println("Miao!"); 
			}
		}

		class Ragno extends Animale
		{
			public function Ragno($zampe)
			{
				Animale::Animale($zampe);
			}

			public function suono()
			{ 
				println("Booooo!"); 
			}
		}

		$rex = new Cane(4);
		$rex->numeroZampe();
		$rex->suono(); 

		$gatto = new Gatto(4);
		$gatto->numeroZampe();
		$gatto->suono(); 

		$ragno = new Ragno(8);
		$ragno->numeroZampe();
		$ragno->suono(); 

	?>
</body>
</hmtl>