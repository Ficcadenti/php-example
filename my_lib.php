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
			print("$str<br>");
		}

		function swap(&$a,&$b) /* swap di 2 variabili */
		{
			$temp=$a;
			$a=$b;
			$b=$temp;
		}

		function mySort_cre(&$lista) /* ordinamento crescente di un array */
		{
			$num_elem=count($lista);
			for($i=0;$i<$num_elem-1;$i++)
			{
				for($j=$i+1;$j<$num_elem;$j++)
				{
					if($lista[$i] > $lista[$j])
					{
						swap($lista[$i],$lista[$j]);
					}
				}
			}
		}

		function mySort_dec(&$lista) /* ordinamento decrescente di un array */
		{
			$num_elem=count($lista);
			for($i=0;$i<$num_elem-1;$i++)
			{
				for($j=$i+1;$j<$num_elem;$j++)
				{
					if($lista[$i] < $lista[$j])
					{
						swap($lista[$i],$lista[$j]);
					}
				}
			}
		}
?> 