<!--
/*
	# 
	# MODULE DESCRIPTION:
	# esempio_13.html
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
		<title>sorgente: esempio_13.html</title>
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
		<?php 
			print($_SERVER["PHP_SELF"]);
		?>
		<form action="" method="POST">
			<input type="text" name="utente">
			<br>
			<textarea name="indirizzo" rows="5" cols="40"></textarea>
			<br>
			<select name="prodotti[]" multiple>
				<option>HD 3GB</option>
				<option>microSD 128GB</option>
				<option>Libro PHP</option>
			</select>
			<br>
			<input type="checkbox" name="quantita[]" value="1">1<br>
			<input type="checkbox" name="quantita[]" value="2">2<br>
			<input type="checkbox" name="quantita[]" value="3">3<br>
			<br>
			<input type="submit" value="premi qui!">
		</form>
	</body>

</hmtl>
