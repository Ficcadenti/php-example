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

		function cast($destination, $sourceObject) /* casting tra oggetti*/
		{
		    if (is_string($destination)) 
		    {
		        $destination = new $destination();
		    }
		    $sourceReflection = new ReflectionObject($sourceObject);
		    $destinationReflection = new ReflectionObject($destination);
		    $sourceProperties = $sourceReflection->getProperties();

		    foreach ($sourceProperties as $sourceProperty) 
		    {
		        $sourceProperty->setAccessible(true);
		        $name = $sourceProperty->getName();
		        $value = $sourceProperty->getValue($sourceObject);
		        if ($destinationReflection->hasProperty($name)) 
		        {
		            $propDest = $destinationReflection->getProperty($name);
		            $propDest->setAccessible(true);
		            $propDest->setValue($destination,$value);
		        } 
		        else 
		        {
		            $destination->$name = $value;
		        }
		    }
		    return $destination;
		}

		function FileSizeConvert($bytes)
		{
		    $bytes = floatval($bytes);
		        $arBytes = array(
		            0 => array(
		                "UNIT" => "TB",
		                "VALUE" => pow(1024, 4)
		            ),
		            1 => array(
		                "UNIT" => "GB",
		                "VALUE" => pow(1024, 3)
		            ),
		            2 => array(
		                "UNIT" => "MB",
		                "VALUE" => pow(1024, 2)
		            ),
		            3 => array(
		                "UNIT" => "KB",
		                "VALUE" => 1024
		            ),
		            4 => array(
		                "UNIT" => "B",
		                "VALUE" => 1
		            ),
		        );

		    foreach($arBytes as $arItem)
		    {
		        if($bytes >= $arItem["VALUE"])
		        {
		            $result = $bytes / $arItem["VALUE"];
		            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
		            break;
		        }
		    }
		    return $result;
		}
			

		$var = 'success';
		return $var;
?> 