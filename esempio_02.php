<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_02.php
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 16-09-2016    Ficcadenti Raffaele         
	# -
	#
-->

<hmtl>
<head>
	<title>sorgente: esempio_02.php</title>
	<!-- Sezione per i CSS -->
	<style>
		b {
		    font-size: 30px;
		    color: #00FF00;
		}
	</style>
</head>
<body>
	<b>
	<!-- Codice PHP -->
	<?php
		$varA = 10;
		$varB = "B";
		$holder = "user"; 
		$$holder = "Raffaele";
		${"passwd"} = "123456";

		print($varA."<br>"); // stampa 10
		print($varB."<br>"); // stampa B
		print('$holder=$user<br>'); // stampa $holder=$user
		print("$holder=$user<br>"); // stampa $holder=Raffaele
		print("-> $$holder <br>"); // stampa $user
		print("-> ${$holder} <br>"); //stampa Raffaele
		print($passwd."<br>"); // stampa 1234
	?>
	</b>
</body>
</hmtl>