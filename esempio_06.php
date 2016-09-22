<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_06.php
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
	<title>sorgente: esempio_06.php</title>
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
	<b>
	<!-- Codice PHP -->
	<?php
		define ("USER","Raffaele");
		define ("PASSWORD","!1234");

		print(USER."<br>");
		print(PASSWORD."<br>");

		/* costanti predefinite */
		print("__FILE__=".__FILE__."<br>");	
		print("__LINE__=".__LINE__."<br>");	
		print("PHP_VERSION=".PHP_VERSION."<br>");
		print("PHP_OS=".PHP_OS."<br>");
		print("PHP_INT_MAX=".PHP_INT_MAX."<br>");
	?>
	</b>
	<a href="http://php.net/manual/it/reserved.constants.php">Costanti Predefinite PHP</a> 
</body>
</hmtl>