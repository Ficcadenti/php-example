<!--
/*
	# 
	# MODULE DESCRIPTION:
	# my_lib.php
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
<?php
		function println($str="") /* stampa riga incluso CR-LF*/
		{
			print("<h1>($str)</h1><br>");
		}

		function swap(&$a,&$b) /* swap di 2 variabili */
		{
			print("swap() da definire. <br>");
		}

		function mySort_cre(&$lista) /* ordinamento crescente di un array */
		{
			print("mySort_cre() da definire. <br>");
		}

		function mySort_dec(&$lista) /* ordinamento decrescente di un array */
		{
			print("mySort_dec() da definire. <br>");
		}

		$var = 'success';
		return $var;
?> 