<?php
	require_once("erroreFile.php");
	// MIME Types
	require_once("mime_type.php");
	
	class File
	{
		private $file;
		private $cartella;

		public function File($nome, $cartella = "./uploads/")
		{
			if (isset($_FILES[$nome]))
			{
				$this->file = $_FILES[$nome];
				$this->cartella = $cartella;
			}
			else throw new ErroreFile(UPLOAD_ERR_NO_FORM);
		}

		public function tipo()
		{
			if (!func_num_args()) 
			{
				throw new ErroreFile(UPLOAD_ERR_NO_TYPE);
			}
			
			$tipi = func_get_args();
			foreach ($tipi as $chiave => $valore)
			{
				if ($this->file["type"] == $valore)
				{
					return true;
				}
			}
			throw new ErroreFile(UPLOAD_ERR_NO_TYPE);
		}

		public function dimensione($dim, $unita = "byte")
		{
			if (strcasecmp($unita, "byte") == 0) 
			{
				$dim = (int) $dim;
			}
			else if (strcasecmp($unita, "kb") == 0) 
			{
				$dim = (int) $dim * 1024;
			}
			else if (strcasecmp($unita, "mb") == 0) 
			{
				$dim = (int) $dim * 1024 * 1024;
			}
			else 
			{
				$dim = 0;
			}

			if ($this->file["size"] > $dim) 
			{
				throw new ErroreFile(UPLOAD_ERR_FORM_SIZE," - La dimensione del file è: ".$this->file["size"]. " byte il limite è di: ".$dim." byte.");
			}
		}

		public function sposta()
		{
			$ok = @move_uploaded_file($this->file["tmp_name"], $this->cartella . $this->file["name"]);
			if (!$ok) 
			{
				throw new ErroreFile(UPLOAD_ERR_MOVE);
			}
		}

		public function immagine($dir, $alt = NULL)
		{
			$dimensioni = getimagesize($dir . $this->file["name"]);
			$dimensioni = $dimensioni[3]; // height="yyy" width="xxx"
			$imgtag = "<img src=\"$dir" . $this->file["name"] . "\" ";
			$imgtag .= "$dimensioni ";
			$imgtag .= (strlen($alt) ? "alt=\"$alt\"" : "") . " /><br><br>"; //Imposta l'attributo ALT per l'immagine
			return $imgtag;
		}

		public function __get($attributo)
		{
			if (array_key_exists($attributo, $this->file))
			{
				return "$attributo=>".$this->file[$attributo];
			}
			return false;
		}

		public function __toString()
		{ 
			return $this->file["name"]; 
		}
	}
?>