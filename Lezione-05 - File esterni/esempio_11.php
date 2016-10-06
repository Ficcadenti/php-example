<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_11.php
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
	<title>sorgente: esempio_11.php</title>
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
		if( (include("../assets/lib/my_lib1.php")) == 'success' ) // include genera una warning ma continua l'esecuzione, require genera un error ed interrompe l'esecuzione
		{
			println("Include \"my_lib.php\" ok. !!!!");
			println();
		}
		else
		{
			include("../assets/lib/my_lib_test.php");
		}

		println("Esempio di include. !!!!!");
	?>
</body>
</hmtl>