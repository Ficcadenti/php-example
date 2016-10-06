<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_10c.php
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
	<title>sorgente: esempio_10c.php</title>
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
	</style>
</head>
<body> 
	<!-- Codice PHP -->
	<?php
		class Colore
		{
				static public $rosso="#FF0000";
				static public $verde="#00FF00";
				static public $blu="#0000FF";
				const  VERDE = "#00FFFF";

				public $var1=5;

				static public function stampaColore($colore)
				{
					print("<h1><font color=\"".self::$$colore."\"> $colore=".self::${$colore}."</font></h1><br>");
				}

				public function metodo1()
				{
					echo "Chiamato metodo1 !!!! <br>";
				}

				public function metodo2()
				{
					echo "Chiamato metodo2 !!!! <br>";
				}

				public function metodo3()
				{
					echo "Chiamato metodo3 !!!! <br>";
				}

				public function __clone()
				{
					echo "!!!! mi clonanooooooo !!!! <br>";
				}
		}

		Colore::stampaColore("rosso");
		Colore::$rosso= Colore::VERDE;
		Colore::stampaColore("rosso");
		Colore::stampaColore("verde");
		Colore::stampaColore("blu");

		$obj=new Colore();
		$functioHolder="metodo";
		$num=3;

		for ($i = 1; $i <= $num; $i++)
		{
			$metodo=$functioHolder . $i;
			$obj->$metodo();
		}

		$obj1=new Colore();
		$obj2=$obj1;
		$obj3=clone $obj1;

		$obj2->var1=10;

		echo "\$obj1->var = $obj1->var1"."<br>";
		echo "\$obj2->var = $obj2->var1"."<br>";
		echo "\$obj3->var = $obj3->var1"."<br>";

	?>
</body>
</hmtl>