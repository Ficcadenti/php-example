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
	$mysql_data_type_hash = array(
	    1=>'tinyint',
	    2=>'smallint',
	    3=>'int',
	    4=>'float',
	    5=>'double',
	    7=>'timestamp',
	    8=>'bigint',
	    9=>'mediumint',
	    10=>'date',
	    11=>'time',
	    12=>'datetime',
	    13=>'year',
	    16=>'bit',
	    252=>'longtext',
	    253=>'varchar',
	    254=>'char',
	    246=>'decimal'
	);

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

	function showEnvironment()
	{
		$env=array("HTTP_REFERER","HTTP_USER_AGENT","HTTP_HOST","QUERY_STRING","PATH_INFO","PHP_SELF","GATEWAY_INTERFACE","SERVER_SOFTWARE","REMOTE_ADDR");
		foreach ($env as $value) 
		{
			if(isset($_SERVER[$value]))
			{
				println("\$_SERVER[$value]=$_SERVER[$value]");
			}
			else
			{
				println("\$_SERVER[$value] not set !!!");
			}
		}
		if(isset($_SERVER["REMOTE_HOST"]))
		{
			println("\$_SERVER[REMOTE_HOST]=$_SERVER[REMOTE_HOST]");
		}
		else if(isset($_SERVER["REMOTE_ADDR"]))
		{
			println("\$_SERVER[REMOTE_HOST]=".gethostbyaddr($_SERVER["REMOTE_ADDR"]));	
		}else
		{
			println("\$_SERVER[REMOTE_HOST]=unknown");
		}

		return true;
	}
		

	$var = 'success';
	return $var;
?> 