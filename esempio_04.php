<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_04.php
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
	<title>sorgente: esempio_04.php</title>
	<!-- Sezione per i CSS -->
	<style>
		b {
		    font-size: 15px;
		    color: #000000;
		}
	</style>
</head>
<body>
	<b>
	<!-- Codice PHP -->
	<?php
		$var1=5;
		$var2=5.34;
		$var3="Ciao";
		$var4=true;

		print("var1=$var1 is ".gettype($var1)."<br>"); 
		print("var2=$var2 is ".gettype($var2)."<br>"); 
		print("var3=$var3 is ".gettype($var3)."<br>"); 
		print("var4=$var4 is ".gettype($var4)."<br>"); 
	?>
	</b>
</body>