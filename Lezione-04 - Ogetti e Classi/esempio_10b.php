<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_10b.php
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
	<title>sorgente: esempio_10b.php</title>
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

		class Tabella_HTML extends Tabella
		{
			private $nome_tabella="";
			private $bgcolor="#FFFFFF";

			function Tabella_HTML($headers=array(),$str="")
			{
				parent::Tabella($headers);
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
					print("<thead>");
						print("<tr>");
						foreach ($this->headers as $value) 
						{
							print("<td><strong>$value</strong></td>");
						}
						print("</tr>");
					print("</thead>");	
					print("<tbody>");
						foreach ($this->righe as $riga) 
						{
							print("<tr id=\"riga\" bgcolor=\"$this->bgcolor\" >");
							foreach ($riga as $value) 
							{
								print("<td>$value</td>");
							}
							print("</tr>");
						}
					print("</tbody>");	
				print("</table>");
			}
		}

		$tab1=new Tabella(array("Nome","Cognome","e-Mail"));

		$tab1->addRow(array("Raffaele","Ficcadenti","raffaele.ficcadenti@gmail.com"));
		$tab1->addRow(array("Valeria","Greco","valeria5.greco@gmail.com"));
		$tab1->addRow(array("Sofia","Ficcadenti","sofia.ficcadenti@gmail.com"));
		$tab1->addRow(array("Maria","Ficcadenti","maria.ficcadenti@gmail.com"));
		$tab1->addRow(array("Gabriele","Ficcadenti","gabriele.ficcadenti@gmail.com"));
		$tab1->addRowAssocArray(array(
				"Cognome"=>"Greco",
				"e-Mail"=>"francesco.greco@gmail.com",
				"Nome"=>"Francesco"
			)
		);
		$tab1->addRowAssocArray(array(
				"Cognome"=>"Greco",
				"e-Mail"=>"roberto.greco@gmail.com",
				"Nome"=>"Roberto"
			)
		);
		$tab1->addRowAssocArray(array(
				"e-Mail"=>"luca.ficcadenti@gmail.com",
				"Cognome"=>"Ficcadenti",
				"Nome"=>"Luca"
			)
		);

		$tab1->ordina("Nome");
		$tab1->stampa();
		println();
		println();

		$tab2=new Tabella_HTML(array("Nome","Cognome","e-Mail"),"Tabella HTML - Ordinata per Nome");
		foreach ($tab1->getRows() as $righa) {
			$tab2->addRow($righa);
		}
		$tab2->addRowAssocArray(array(
				"e-Mail"=>"enrica.greco@gmail.com",
				"Cognome"=>"Greco",
				"Nome"=>"Enrica"
			)
		);
		$tab2->setBgColor("#e6ffe6");
		$tab2->ordina("Nome");
		$tab2->stampa();
		println();
		println();

		$tab5=new Tabella_HTML(array("Nome","Cognome","e-Mail"),"Tabella HTML - Ordinata per Cognome");
		foreach ($tab2->getRows() as $righa) {
			$tab5->addRow($righa);
		}
		$tab5->setBgColor("#ffffe6");
		$tab5->ordina("Cognome");
		$tab5->stampa();
		println();
		println();

		$tab3=new Tabella_HTML(array("Nome","Cognome","e-Mail"),"Tabella HTML - Ordinata per e-Mail");
		foreach ($tab2->getRows() as $righa) {
			$tab3->addRow($righa);
		}
		$tab3->setBgColor("#ffcccc");
		$tab3->ordina("e-Mail");
		$tab3->stampa();
		println();
		println();

		$tab6=cast("Tabella_HTML",$tab1);
		$tab6->stampa();
	?>
</body>
</hmtl>