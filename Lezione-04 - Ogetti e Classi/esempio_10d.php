<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_10d.php
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
	<title>sorgente: esempio_10d.php</title>
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
		h2 {
			margin-left: 30px;
		}
		#m30 
		{
			margin-left: 30px;
		}
		#m70 {
			margin-left: 70px;
		}
		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th, td {
		    padding: 8px;
		    text-align: left;
		    border-bottom: 1px solid #ddd;
		}

		tr#riga:hover{background-color:#f5f5f5}
	</style>
</head>
<body>
	<!-- Codice PHP -->
	<?php
		if( (include("../assets/lib/my_lib.php")) == 'success' ) 
		{
			println("Include \"my_lib.php\" ok. !!!!");
			println();
		}
		else
		{
			include("../assets/lib/my_lib_test.php");
		}

		function printH($h,$str)
		{
			print("<$h>$str</$h>"); // funzione definita dall'utente
		}

		function capitolo($str) /* utilizzo di variabili statiche */
		{
			static $num_capitolo = 0;
			$num_capitolo++;
			printH("h1","$num_capitolo. $str");
			return $num_capitolo;
		}

		function paragrafo($str,$cap) /* utilizzo di variabili statiche */
		{
			static $num_paragrafo = 0;
			$num_paragrafo++;
			printH("h2","$cap.$num_paragrafo. $str");
		}
	?>
	<?php
		class Tabella
		{
			protected $righe=array();
			protected $headers=array();
			protected $colonne;

			function Tabella($headers=array())
			{
				$this->headers=$headers;
				$this->colonne=count($headers);
			}
			public function getRows()
			{
				return $this->righe;
			}

			public function addRow($row)
			{
				if(count($row)!=$this->colonne)
				{
					return false;
				}
				else
				{
					array_push($this->righe, $row);
					return true;
				}
			}

			public function addRowAssocArray($row_assoc)
			{
				$row=array();

				foreach ($this->headers as $header) 
				{
						if(isset($row_assoc[$header]))
						{
							$row[]=$row_assoc[$header];
						}else
						{
							$row[]="UNDEFINED";
						}
				}
				array_push($this->righe, $row);
				return true;
			}

			public function ordina($colonna)
			{
				if( !($indice=array_search($colonna, $this->headers)) )
				{
					$indice=0;
					println("La colonna '$colonna' non è presente ordino per Nome");
				}
				
				$num_elem=count($this->righe);

				for($r=0;$r<$num_elem-1;$r++)
				{
					for($s=$r+1;$s<$num_elem;$s++)
					{
						if($this->righe[$r][$indice] > $this->righe[$s][$indice])
						{

							swap($this->righe[$r],$this->righe[$s]);
						}
					}
				}
			}
			protected function stampa()
			{
				echo "Errore : la funzione va obbligatoriamente ridefinita da una sottoclasse!";
			}

		}

		class Tabella_HTML extends Tabella
		{
			private $nome_tabella="";
			private $bgcolor="#FFFFFF";

			function Tabella_HTML($headers=array(),$str="")
			{
				Tabella::Tabella($headers);
				$this->nome_tabella=$str;
			}

			public function setBgColor($bgcolor)
			{	
				$this->bgcolor=$bgcolor;
			}

			public function stampa()
			{
				printH("h1",$this->nome_tabella);
				print("<table>");
					print("<tr>");
					foreach ($this->headers as $value) 
					{
						print("<td><strong>$value</strong></td>");
					}
					print("</tr>");

					foreach ($this->righe as $riga) 
					{
						print("<tr id=\"riga\" bgcolor=\"$this->bgcolor\" >");
						foreach ($riga as $value) 
						{
							print("<td>$value</td>");
						}
						print("</tr>");
					}

				print("</table>");
			}
		}

		class Tabella_TXT extends Tabella
		{
			private $nome_tabella="";

			function Tabella_HTML($headers=array(),$str="")
			{
				Tabella::Tabella($headers);
				$this->nome_tabella=$str;
			}

			public function stampa()
			{
				printH("h1","HEADERS (".count($this->headers).")");
				foreach ($this->headers as $value) 
				{
					println($value);
				}

				printH("h1","RIGHE (".count($this->righe).")");
				foreach ($this->righe as $riga) 
				{
					foreach ($riga as $value) 
					{
						print("$value;");
					}
					println();
				}
			}
		}

		class Tabella_EMPTY extends Tabella
		{
			public function stampa()
			{
				println("Tabella vuota per test polimorfismo !!!!");
			}
		}

		class Prova
		{
			public $var="Ciao";
		}

		function stampa($obj)
		{
			if($obj instanceof Tabella)
			{
				$obj->stampa();
				println();
				println();
			}
			else
			{
				println("Tipo di oggetto non riconosciuto!!");
				var_dump($obj);
			}
		}

		$tab2=new Tabella_HTML(array("Nome","Cognome","e-Mail"),"Tabella HTML - Ordinata per Cognome");
		$tab2->addRow(array("Raffaele","Ficcadenti","raffaele.ficcadenti@gmail.com"));
		$tab2->addRow(array("Valeria","Greco","valeria5.greco@gmail.com"));
		$tab2->addRow(array("Sofia","Ficcadenti","sofia.ficcadenti@gmail.com"));
		$tab2->addRow(array("Maria","Ficcadenti","maria.ficcadenti@gmail.com"));
		$tab2->addRow(array("Gabriele","Ficcadenti","gabriele.ficcadenti@gmail.com"));
		$tab2->setBgColor("#ffffe6");
		$tab2->ordina("Cognome");
		

		$tab3=new Tabella_TXT(array("Nome","Cognome","e-Mail"),"Tabella HTML - TXT");
		$tab3->addRow(array("Raffaele","Ficcadenti","raffaele.ficcadenti@gmail.com"));
		$tab3->addRow(array("Valeria","Greco","valeria5.greco@gmail.com"));
		$tab3->addRow(array("Sofia","Ficcadenti","sofia.ficcadenti@gmail.com"));
		$tab3->addRow(array("Maria","Ficcadenti","maria.ficcadenti@gmail.com"));
		$tab3->addRow(array("Gabriele","Ficcadenti","gabriele.ficcadenti@gmail.com"));

		$tab4=new Tabella_EMPTY();

		$obj=new Prova();

		stampa($tab2);
		stampa($tab3);
		stampa($tab4);
		stampa($obj);

	?>
</body>
</hmtl>