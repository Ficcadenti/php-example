<!--
	# 
	# MODULE DESCRIPTION:
	# erroreFile.php
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 07-11-2016    Ficcadenti Raffaele         
	# -
	#
-->

<?php
	define("UPLOAD_ERR_MOVE", 9);
	define("UPLOAD_ERR_NO_FORM", 10);
	define("UPLOAD_ERR_NO_TYPE", 11);
	define("UPLOAD_ERR_UNKNOWN", 12);
	
	class ErroreFile extends Exception
	{
		private $errore;
		private $msg;
		static $tipo = array(
			UPLOAD_ERR_OK => "File inviato con successo",
			UPLOAD_ERR_INI_SIZE => "Dimensione del file troppo grande",
			UPLOAD_ERR_FORM_SIZE => "Dimensione del file troppo grande",
			UPLOAD_ERR_PARTIAL => "File ricevuto parzialmente",
			UPLOAD_ERR_NO_FILE => "Nessun file ricevuto",
			UPLOAD_ERR_NO_TMP_DIR => "Cartella temporanea non trovata",
			UPLOAD_ERR_CANT_WRITE => "Impossibile scrivere file su disco",
			UPLOAD_ERR_EXTENSION => "Iinterrotto il caricamento del file",
			UPLOAD_ERR_MOVE => "Impossibile archiviare il file",
			UPLOAD_ERR_NO_FORM => "Nessun file specificato",
			UPLOAD_ERR_NO_TYPE => "Formato file non consentito",
			UPLOAD_ERR_UNKNOWN => "Errore sconosciuto"
		);

		public function ErroreFile($err_no,$msg="")
		{ 
			$this->errore = (int) $err_no; 
			$this->msg = $msg; 
		}

		public function messaggio()
		{
			foreach (ErroreFile::$tipo as $chiave => $valore)
			{
				if ($this->errore == $chiave)
				{
					return $valore . $this->msg;
				}
			}

			return ErroreFile::$tipo[UPLOAD_ERR_UNKNOWN];
		}
	}
?>