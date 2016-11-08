<?php
  $path_sviluppo="./";
?>
<style>
	.disabled {
   pointer-events: none;
   cursor: default;
}
</style>
<h2><strong> Repository per Lezioni/esempi PHP </strong></h2>
(c) 09/2016 - Raffaele Ficcadenti (raffaele.ficcadenti@gmail.com) <br>
Ho cercato di raccogliere in questo repository, le basi della programmazione PHP.
Per ogni correzione o suggerimento, non esitate a scrivermi.
Buon 'coding'.
Raffaele.
<p>
	<b>Prima di partire</b><br><br>
	Per gli esempi che utilizzano chiamate a MySQL dovrete installare il database di esempio con le relative tabelle,<br>
	ovviamente deve essere presente un'installazione di MySQL, e dovete conoscere la password di root.<br><br>
	Lanciare da riga di comando:<br><br>
		mysql -u <strong>root</strong> -p{<strong>password</strong>} -h {<strong>nomehost</strong>} < <strong>php-example.sql</strong><br><br>
	Lo script <strong>php-example.sql</strong> lo trovate versionato sotto la directory dumpdb.
</p>
<ul>
	<li><strong>LEZIONE N. 0</strong> - Per iniziare.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lazione-00 - Per iniziare/ascii_tab.html" target="_blank">ascii_tab.html</a></b>: ASCII/ISO 8859-1 (Latin-1).</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lazione-00 - Per iniziare/phpinfo.php" target="_blank">phpinfo.php</a></b>: Un semplice script per info sul php installato.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lazione-00 - Per iniziare/esempio_01.php" target="_blank">esempio_01.php</a></b>: Un semplice script introduttivo.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 1</strong> - Elementi fondamentali.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-01 - Elementi fondamentali/esempio_02.php" target="_blank">esempio_02.php</a></b>: Le variabili assegnazione per valore.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-01 - Elementi fondamentali/esempio_03.php" target="_blank">esempio_03.php</a></b>: Le variabili assegnazione per riferimento.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-01 - Elementi fondamentali/esempio_04.php" target="_blank">esempio_04.php</a></b>: Tipi di dato e casting.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-01 - Elementi fondamentali/esempio_05.php" target="_blank">esempio_05.php</a></b>: Operatori.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-01 - Elementi fondamentali/esempio_06.php" target="_blank">esempio_06.php</a></b>: Costanti.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-01 - Elementi fondamentali/esempio_07.php" target="_blank">esempio_07.php</a></b>: Controllo del flusso di elaborazione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 2</strong> - Funzioni.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-02 - Funzioni/esempio_08.php" target="_blank">esempio_08.php</a></b>: Esempi.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 3</strong> - Array.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-03 - Array/esempio_09.php" target="_blank">esempio_09.php</a></b>: Esempi.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 4</strong> - Oggetti e Classi.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10.php" target="_blank">esempio_10.php</a></b>: Introduzione.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10a.php" target="_blank">esempio_10a.php</a></b>: Un sempio.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10b.php" target="_blank">esempio_10b.php</a></b>: Classi ed ereditarietà, un sempio.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10c.php" target="_blank">esempio_10c.php</a></b>: Attributi e membri statici, costanti, funzioni variabili.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10d.php" target="_blank">esempio_10d.php</a></b>: Polimorfismo.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10e.php" target="_blank">esempio_10e.php</a></b>: Oggetti clonati.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10f.php" target="_blank">esempio_10f.php</a></b>: Classi astratte.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10g.php" target="_blank">esempio_10g.php</a></b>: Interfacce.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10h.php" target="_blank">esempio_10h.php</a></b>: Liste concatenate.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10i.php" target="_blank">esempio_10i.php</a></b>: Serializzare oggetti.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-04 - Ogetti e Classi/esempio_10l.php" target="_blank">esempio_10l.php</a></b>: Metodi magici.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 5</strong> - File esterni.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-05 - File esterni/esempio_11.php" target="_blank">esempio_11.php</a></b>: Include & require.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 6</strong> - Moduli HTML.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-06 - Moduli HTML/esempio_12.php" target="_blank">esempio_12.php</a></b>: Variabili globali e ambientali.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-06 - Moduli HTML/esempio_13.php" target="_blank">esempio_13.php</a></b>: Input utente.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-06 - Moduli HTML/esempio_14.php" target="_blank">esempio_14.php</a></b>: Unione di codice HTML e PHP in una sola pagina.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-06 - Moduli HTML/esempio_15.php" target="_blank">esempio_15.php</a></b>: Upload di file sul server.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 7</strong> - File.
		<ul>
			<br>	
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-07 - File, gestione/esempio_16.php" target="_blank">esempio_16.php</a></b>: File, informazioni.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-07 - File, gestione/esempio_17.php" target="_blank">esempio_17.php</a></b>: File, creazione,eliminazione,lettura e scrittura.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 8</strong> - Directory.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-08 - Directory, gestione/esempio_18.php" target="_blank">esempio_18.php</a></b>: Gestione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 9</strong> - Database DBM.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-09 - Database DBM/esempio_19.php" target="_blank">esempio_19.php</a></b>: Esempio 1.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-09 - Database DBM/esempio_20.php" target="_blank">esempio_20.php</a></b>: Esempio 2.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 10</strong> - Database MySQLi.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-10 - Database MySQL/esempio_21.php" target="_blank">esempio_21.php</a></b>: Utilizzo di MySQLi.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-10 - Database MySQL/esempio_22.php" target="_blank">esempio_22.php</a></b>: Ottenere informazioni su un database.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 11</strong> - Apertura al mondo esterno.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-11 - Apertura al mondo esterno/esempio_23.php" target="_blank">esempio_23.php</a></b>: Introduzione.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-11 - Apertura al mondo esterno/esempio_24.php" target="_blank">esempio_24.php</a></b>: Stabilire una connessione HTTP.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-11 - Apertura al mondo esterno/esempio_25.php" target="_blank">esempio_25.php</a></b>: Codici di stato di una connessione HTTP.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-11 - Apertura al mondo esterno/esempio_26.php" target="_blank">esempio_26.php</a></b>: Stabilire una connessione NNTP.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-11 - Apertura al mondo esterno/esempio_27.php" target="_blank">esempio_27.php</a></b>: Inviare e-mail.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 12</strong> - Immagini dinamiche.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-12 - Immagini dinamiche, GD Library/esempio_28.php" target="_blank">esempio_28.php</a></b>: GD Library.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-12 - Immagini dinamiche, GD Library/esempio_29.php" target="_blank">esempio_29.php</a></b>: PHPGraphLib (PHP Graphing Library v2.31).</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 13</strong> - Date.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-13 - Le date/esempio_30.php" target="_blank">esempio_30.php</a></b>: Esempio.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-13 - Le date/esempio_31.php" target="_blank">esempio_31.php</a></b>: Creiamo un calendario.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 14</strong> - Tipi di dati, nel dettaglio.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-14 - I dati nel dettaglio/esempio_32.php" target="_blank">esempio_32.php</a></b>: Il casting.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-14 - I dati nel dettaglio/esempio_33.php" target="_blank">esempio_33.php</a></b>: Che tipo sei ?</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-14 - I dati nel dettaglio/esempio_34.php" target="_blank">esempio_34.php</a></b>: Ancora su array.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 15</strong> - Stringhe.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-15 - Stringhe/esempio_35.php" target="_blank">esempio_35.php</a></b>: Formattazione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 16</strong> - Espressioni regolari.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-16 - Le espressioni regolari/esempio_36.php" target="_blank">esempio_36.php</a></b>: Espressioni regolari PCRE.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 17</strong> - Salvataggio dello stato, cookie e stringhe di query.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-17 - Salvataggio di stato, cookie/esempio_37.php" target="_blank">esempio_37.php</a></b>: Settare un cookie.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-17 - Salvataggio di stato, cookie/esempio_38.php" target="_blank">esempio_38.php</a></b>: Eliminare un cookie.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-17 - Salvataggio di stato, cookie/esempio_39.php" target="_blank">esempio_39.php</a></b>: Contatore visite sito.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-17 - Salvataggio di stato, cookie/esempio_40.php" target="_blank">esempio_40.php</a></b>: Le stringhe di interrogazione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 18</strong> - Salvataggio dello stato, sessioni.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-18 - Salvataggio di stato, sessioni/esempio_41.php" target="_blank">esempio_41.php</a></b>: Aprire una sessione.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-18 - Salvataggio di stato, sessioni/esempio_42.php" target="_blank">esempio_42.php</a></b>: Leggere parametri di una sessione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 19</strong> - Ambiente server.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-19 - Ambiente server/esempio_43.php" target="_blank">esempio_43.php</a></b>: Utilizzo di popen().</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-19 - Ambiente server/esempio_44.php" target="_blank">esempio_44.php</a></b>: Utilizzo di exec().</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-19 - Ambiente server/esempio_45.php" target="_blank">esempio_45.php</a></b>: Utilizzo di system().</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-19 - Ambiente server/esempio_46.php" target="_blank" class="disabled">esempio_46.php</a></b>: Un esempio interattivo.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-19 - Ambiente server/esempio_47.php" target="_blank">esempio_47.php</a></b>: Richiamare uno script Perl.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 20</strong> - Debugging.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-20 - Debugging/esempio_48.php" target="_blank">esempio_48.php</a></b>: Usare phpinfo().</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-20 - Debugging/esempio_49.php" target="_blank">esempio_49.php</a></b>: File sorgente.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-20 - Debugging/esempio_50.php" target="_blank">esempio_50.php</a></b>: Errori su log file o email.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 21</strong> - Eccezioni.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-21 - Eccezioni/esempio_51.php" target="_blank">esempio_51.php</a></b>: Esempio.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-21 - Eccezioni/esempio_52.php" target="_blank">esempio_52.php</a></b>: Estendiamo la classe exception.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 22</strong> - PHP e JSON.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-22 - PHP e JSON/esempio_53.php" target="_blank">esempio_53.php</a></b>: Encode & Decode.</li>
			<li><b><a href="<?php echo $path_sviluppo?>Lezione-22 - PHP e JSON/esempio_54.php" target="_blank">esempio_54.php</a></b>: Gestione degli errori.</li>
			<br>
		</ul>
	</li>
	<li><strong>APPENDICE</strong> - Alcuni esempi pratici.
		<ul>
			<br>
			<li><b><a href="<?php echo $path_sviluppo?>APPENDICE/esempio_55.php" target="_blank">esempio_55.php</a></b>: Inviare e-mail.</li>
			<li><b><a href="<?php echo $path_sviluppo?>APPENDICE/esempio_55a.php" target="_blank">esempio_55a.php</a></b>: Classe per inviare e-mail.</li>
			<li><b><a href="<?php echo $path_sviluppo?>APPENDICE/esempio_56.php" target="_blank">esempio_56.php</a></b>: Upload file.</li>
			<li><b><a href="<?php echo $path_sviluppo?>APPENDICE/esempio_56a.php" target="_blank">esempio_56a.php</a></b>: Classe per upload file.</li>
			<li><b><a href="<?php echo $path_sviluppo?>APPENDICE/esempio_57.php" target="_blank">esempio_57.php</a></b>: Buffering.</li>
			<br>
		</ul>
	</li>
</ul>