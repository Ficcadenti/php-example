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
	# -[Date]---    -[Who]-------------         -[What]---------------------------------------
	# 16-09-2016    Ficcadenti Raffaele         phpinfo()
	# --
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

		print($varA."<br>");
		print($varB."<br>");
		print('$holder=$user<br>');
		print("$holder=$user<br>");
	?>
	</b>
</body>
</hmtl>