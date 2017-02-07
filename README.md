# php-example
<h2><strong> Repository per Lezioni/esempi PHP </strong></h2>
<br>
(c) 09/2016 - Raffaele Ficcadenti (raffaele.ficcadenti@gmail.com) <br>
Ho cercato di raccogliere in questo repository, le basi della programmazione PHP.
Per ogni correzione o suggerimento, non esitate a scrivermi.<br>
Se volete provare ogni singolo esempio andate sul mio sito <a href="http://www.raffaeleficcadenti.it/">www.raffaeleficcadenti.it</a> nella sezione: <a href="http://www.raffaeleficcadenti.it/components/corso_php.php?lang=it">i miei sviluppi/Corso PHP</a>.<br>
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
			<li><b>ascii_tab.html</b>: ASCII/ISO 8859-1 (Latin-1).</li>
			<br>
			<li><b>phpinfo.php</b>: Un semplice script per info sul php installato.</li>
			<br>
			<li><b>esempio_01.php</b>: Un semplice script introduttivo.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 1</strong> - Elementi fondamentali.
		<ul>
			<br>
			<li><b>esempio_02.php</b>: Le variabili assegnazione per valore.</li>
			<br>
			<li><b>esempio_03.php</b>: Le variabili assegnazione per riferimento.</li>
			<br>
			<li><b>esempio_04.php</b>: Tipi di dato e casting.</li>
			<br>
			<li><b>esempio_05.php</b>: Operatori.</li>
			<br>
			<li><b>esempio_06.php</b>: Costanti.</li>
			<br>
			<li><b>esempio_07.php</b>: Controllo del flusso di elaborazione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 2</strong> - Funzioni.
		<ul>
			<br>
			<li><b>esempio_08.php</b>: Esempi.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 3</strong> - Array.
		<ul>
			<br>
			<li><b>esempio_09.php</b>: Esempi.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 4</strong> - Oggetti e Classi.
		<ul>
			<br>
			<li><b>esempio_10.php</b>: Introduzione.</li>
			<br>
			<li><b>esempio_10a.php</b>: Un sempio.</li>
			<br>
			<li><b>esempio_10b.php</b>: Classi ed ereditarietà, un sempio.</li>
			<br>
			<li><b>esempio_10c.php</b>: Attributi e membri statici, costanti, funzioni variabili.</li>
			<br>
			<li><b>esempio_10d.php</b>: Polimorfismo.</li>
			<br>
			<li><b>esempio_10e.php</b>: Oggetti clonati.</li>
			<br>
			<li><b>esempio_10f.php</b>: Classi astratte.</li>
			<br>
			<li><b>esempio_10g.php</b>: Interfacce.</li>
			<br>
			<li><b>esempio_10h.php</b>: Liste concatenate.</li>
			<br>
			<li><b>esempio_10i.php</b>: Serializzare oggetti.</li>
			<br>
			<li><b>esempio_10l.php</b>: Metodi magici.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 5</strong> - File esterni.
		<ul>
			<br>
			<li><b>esempio_11.php</b>: Include & require.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 6</strong> - Moduli HTML.
		<ul>
			<br>
			<li><b>esempio_12.php</b>: Variabili globali e ambientali.</li>
			<br>
			<li><b>esempio_13.php</b>: Input utente.</li>
			<br>
			<li><b>esempio_14.php</b>: Unione di codice HTML e PHP in una sola pagina.</li>
			<br>
			<li><b>esempio_15.php</b>: Upload di file sul server.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 7</strong> - File.
		<ul>
			<br>	
			<li><b>esempio_16.php</b>: File, informazioni.</li>
			<br>
			<li><b>esempio_17.php</b>: File, creazione,eliminazione,lettura e scrittura.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 8</strong> - Directory.
		<ul>
			<br>
			<li><b>esempio_18.php</b>: Gestione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 9</strong> - Database DBM.
		<ul>
			<br>
			<li><b>esempio_19.php</b>: Esempio 1.</li>
			<br>
			<li><b>esempio_20.php</b>: Esempio 2.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 10</strong> - Database MySQLi.
		<ul>
			<br>
			<li><b>esempio_21.php</b>: Utilizzo di MySQLi.</li>
			<br>
			<li><b>esempio_22.php</b>: Ottenere informazioni su un database.</li>
			<br>
			<li><b>esempio_22a.php</b>: Utilizzo di ADODB.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 11</strong> - Apertura al mondo esterno.
		<ul>
			<br>
			<li><b>esempio_23.php</b>: Introduzione.</li>
			<br>
			<li><b>esempio_24.php</b>: Stabilire una connessione HTTP.</li>
			<br>
			<li><b>esempio_25.php</b>: Codici di stato di una connessione HTTP.</li>
			<br>
			<li><b>esempio_26.php</b>: Stabilire una connessione NNTP.</li>
			<br>
			<li><b>esempio_27.php</b>: Inviare e-mail.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 12</strong> - Immagini dinamiche.
		<ul>
			<br>
			<li><b>esempio_28.php</b>: GD Library.</li>
			<br>
			<li><b>esempio_29.php</b>: PHPGraphLib (PHP Graphing Library v2.31).</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 13</strong> - Le Date.
		<ul>
			<br>
			<li><b>esempio_30.php</b>: Esempio.</li>
			<br>
			<li><b>esempio_31.php</b>: Creiamo un calendario.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 14</strong> - Tipi di dati, nel dettaglio.
		<ul>
			<br>
			<li><b>esempio_32.php</b>: Il casting.</li>
			<br>
			<li><b>esempio_33.php</b>: Che tipo sei ?</li>
			<br>
			<li><b>esempio_34.php</b>: Ancora su array.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 15</strong> - Stringhe.
		<ul>
			<br>
			<li><b>esempio_35.php</b>: Formattazione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 16</strong> - Espressioni regolari.
		<ul>
			<br>
			<li><b>esempio_36.php</b>: Espressioni regolari PCRE.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 17</strong> - Salvataggio dello stato, cookie e stringhe di query.
		<ul>
			<br>
			<li><b>esempio_37.php</b>: Settare un cookie.</li>
			<br>
			<li><b>esempio_38.php</b>: Eliminare un cookie.</li>
			<br>
			<li><b>esempio_39.php</b>: Contatore visite sito.</li>
			<br>
			<li><b>esempio_40.php</b>: Le stringhe di interrogazione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 18</strong> - Salvataggio dello stato, sessioni.
		<ul>
			<br>
			<li><b>esempio_41.php</b>: Aprire una sessione.</li>
			<br>
			<li><b>esempio_42.php</b>: Leggere parametri di una sessione.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 19</strong> - Ambiente server.
		<ul>
			<br>
			<li><b>esempio_43.php</b>: Utilizzo di popen().</li>
			<br>
			<li><b>esempio_44.php</b>: Utilizzo di exec().</li>
			<br>
			<li><b>esempio_45.php</b>: Utilizzo di system().</li>
			<br>
			<li><b>esempio_46.php</b>: Un esempio interattivo.</li>
			<br>
			<li><b>esempio_47.php</b>: Richiamare uno script Perl.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 20</strong> - Debugging.
		<ul>
			<br>
			<li><b>esempio_48.php</b>: Usare phpinfo().</li>
			<br>
			<li><b>esempio_49.php</b>: File sorgente.</li>
			<br>
			<li><b>esempio_50.php</b>: Errori su log file o email.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 21</strong> - Eccezioni.
		<ul>
			<br>
			<li><b>esempio_51.php</b>: Esempio.</li>
			<br>
			<li><b>esempio_52.php</b>: Estendiamo la classe exception.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 22</strong> - PHP e JSON.
		<ul>
			<br>
			<li><b>esempio_53.php</b>: Encode & Decode.</li>
			<br>
			<li><b>esempio_54.php</b>: Gestione degli errori.</li>
			<br>
		</ul>
	</li>
	<li><strong>LEZIONE N. 23</strong> - Google API.
		<ul>
			<br>
			<li><b>esempio_60.php</b>: Iniziamo ad usare le Google API Maps.</li>
			<br>
		</ul>
	</li>
	<li><strong>APPENDICE</strong> - Alcuni esempi pratici.
		<ul>
			<br>
			<li><b>esempio_55.php</b>: Esempio 1 - Inviare e-mail.</li>
			<br>
			<li><b>esempio_55a.php</b>: Esempio 2 - Classe per inviare e-mail.</li>
			<br>
			<li><b>esempio_56.php</b>: Esempio 3 - Upload file.</li>
			<br>
			<li><b>esempio_56a.php</b>: Esempio 4 - Classe per upload file.</li>
			<br>
			<li><b>esempio_57.php</b>: Esempio 5 - Buffering.</li>
			<br>
		</ul>
	</li>
</ul>