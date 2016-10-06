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
	# -[Date]-      -[Who]-               -[What]-
	# 19-09-2016    Ficcadenti Raffaele         
	# -
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
		b1 {
		    font-size: 30px;
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
		$array = array('a', 'b', 'c');
		/* heredoc string */
		$stringa = <<<HDOC
			Il mio nome è "Raffale"
HDOC;


		echo "<b1>Stringa heredoc:</b1> ",$stringa,"<br>";
		print("$array[0]<br>");
		print("$array[1]<br>");
		print("$array[2]<br><br>");

		print("<b1>Tipi di variabile:</b1><br>"); 
		print("var1=$var1 is ".gettype($var1)."<br>"); 
		print("var2=$var2 is ".gettype($var2)."<br>"); 
		print("var3=$var3 is ".gettype($var3)."<br>"); 
		print("var4=$var4 is ".gettype($var4)."<br>"); 


		/* conversione tipi */
		print("<br><b1>Conversione con settype:</b1><br>"); 
		$var5=6.35;
		print("var5=$var5 is ".gettype($var5)."<br>"); 

		settype($var5,"string");
		print("var5=$var5 is ".gettype($var5)."<br>"); 

		settype($var5,"integer");
		print("var5=$var5 is ".gettype($var5)."<br>"); 

		settype($var5,"float");
		print("var5=$var5 is ".gettype($var5)."<br>"); 

		settype($var5,"boolean");
		print("var5=$var5 is ".gettype($var5)."<br>"); 

		/* casting */
		print("<br><b1>Casting:</b1><br>"); 
		$var6=6.35;
		print("var5=$var5 is ".gettype($var5)."<br>"); 

		$var7=(string)$var6;
		print("var7=$var7 is ".gettype($var7)."<br>"); 
		
		$var7=(integer)$var6;
		print("var7=$var7 is ".gettype($var7)."<br>"); 

		$var7=(double)$var6;
		print("var7=$var7 is ".gettype($var7)."<br>"); 

		$var7=(boolean)$var6;
		print("var7=$var7 is ".gettype($var7)."<br>"); 
	?>
	</b>
</body>
</hmtl>