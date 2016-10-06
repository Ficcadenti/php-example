<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_07.php
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
	<title>sorgente: esempio_07.php</title>
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
		$var1="booooo";

		/* if-elseif-else*/
		if($var1=="SI")
		{
			print("SI !!!!<br>");
		}
		else if($var1=="NO")
		{
			print("NO !!!!<br>");
		}
		else
		{
			print("ne SI e ne NO !!!!<br>");
		}

		$var2="NO";

		/* switch */
		switch($var2)
		{
			case "SI":
				{
					print("SI !!!!<br>");
				}
				break;
			case "NO":
				{
					print("NO !!!!<br>");
				}
				break;
			default:
				{
					print("ne SI e ne NO !!!!<br>");
				}
				break;
		}

		$var3="non saprei";
		
		/* ? */
		$result=($var3=="SI")?"SI !!!!<br>":"$var3 !!!!!<br>";
		print($result);

		print("<br>");
		/* while */
		$counter=1;
		while($counter<=12)
		{
			print("$counter<br>");
			$counter++;
		}

		print("<br>");
		/* do-while */
		$counter=7;
		do
		{
			print("$counter<br>");
			$counter--;
		}
		while($counter>0);

		print("<br>");
		/* for */
		for ($counter = 10; $counter <= 20; $counter++) 
		{
			print("$counter<br>");
		} 

		print("<br>");
		$counter=-5;
		/* for break */
		for (; $counter <= 5; $counter++) 
		{
			if($counter==0)
			{
				break;
			}
			$result=10/$counter;
			print("10/$counter=".$result."<br>");
		} 


		print("<br>");
		$counter=-4;
		/* for break */
		for (; $counter <= 4; $counter++) 
		{
			if($counter==0)
			{
				continue;
			}
			$result=10/$counter;
			print("10/$counter=".$result."<br>");
		} 

		print("<br>");
		/* for annidati */
		for ($x = 1; $x <= 10; $x++) 
		{
			for ($y = 1; $y <= 10; $y++) 
			{
				$result=$x*$y;
				printf("%02d ",$result);
			}
			print("<br>");
		} 

		print("<br>");
		$array = array('a', 'b', 'c', 'd', 'e');
		var_dump($array);print("<br>");

		$contatore = 0;
		print("<br>");
		/* foreach  */
		foreach ($array as $value) {
			printf("arrai[$contatore]=%s<br>",$value);
			$contatore++;
		}
	?>
	</b>
</body>
</hmtl>