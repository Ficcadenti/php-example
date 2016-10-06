<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_03.php
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
	<title>sorgente: esempio_03.php</title>
	<!-- Sezione per i CSS -->
	<style>
		b {
		    font-size: 15px;
		    color: #AAFF00;
		}
	</style>
</head>
<body>
	<b>
	<!-- Codice PHP -->
	<?php
		$var1=10;
		$var2=$var1;

		$var1=20;
		print("var1=$var1<br>"); // stampa 20
		print("var2=$var2<br>"); // stampa 10

		$var2=&$var1;
		$var1=30;
		print("var1=$var1<br>"); // stampa 30
		print("var2=$var2<br>"); // stampa 30

	?>
	</b>
</body>
</hmtl>