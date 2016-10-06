<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_05.php
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
	<title>sorgente: esempio_05.php</title>
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
		print($var1="Ciao");
		print("<br>");
		print("var1=$var1<br>"); 

		$var2=10;
		$var2 += 5;
		print("var2=$var2<br>"); 	
		
		print($var2>10);
		print("<br>");
		print($var2>100);
		print("<br>");

		$var3=10;
		$var4=$var3%4;
		print("1) var4=$var4<br>"); 	

		
		$var5=16;
		print("<br>");
		print("<b1>2) $var5>4 and $var5<10 ?</b1><br>"); 
		if(($var5>4)and($var5<10))
		{
			print("true<br>");
		}
		else
		{
			print("false<br>");
		}

		print("<b1>3) $var5>4 or $var5<10 ?</b1><br>"); 
		if(($var5>4)or($var5<10))
		{
			print("true<br>");
		}
		else
		{
			print("false<br>");
		}

		print("<b1>4) $var5>4 xor $var5<10 ?</b1><br>"); 
		if(($var5>4)xor($var5<10))
		{
			print("true<br>");
		}
		else
		{
			print("false<br>");
		}

		$var6=10;
		print("<b1>5) $var6<11 ?</b1><br>"); 
		if($var6++<11)
		{
			print("true<br>");
		}
		else
		{
			print("false<br>");
		}

		$var7=10;
		print("<b1>6) $var7<11 ?</b1><br>"); 
		if(++$var7<11)
		{
			print("true<br>");
		}
		else
		{
			print("false<br>");
		}

		$var8=10;
		$var9="10";
		print("<b1>7) $var8==$var9 ?</b1><br>"); 
		print("$var8 is ".gettype($var8)."<br>");
		print("$var9 is ".gettype($var9)."<br>");
		if($var8==$var9)
		{
			print("true<br>");
		}
		else
		{
			print("false<br>");
		}

		print("<b1>8)$var8===$var9 ?</b1><br>"); 
		print("$var8 is ".gettype($var8)."<br>");
		print("$var9 is ".gettype($var9)."<br>");
		if($var8===$var9)
		{
			print("true<br>");
		}
		else
		{
			print("false<br>");
		}

		$var8=10;
		$var9=10;
		print("<b1>9) $var8===$var9 ?</b1><br>"); 
		print("$var8 is ".gettype($var8)."<br>");
		print("$var9 is ".gettype($var9)."<br>");
		if($var8===$var9)
		{
			print("true<br>");
		}
		else
		{
			print("false<br>");
		}

	?>
	</b>
</body>
</hmtl>