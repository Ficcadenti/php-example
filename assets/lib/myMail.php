<!--
/*
	# 
	# MODULE DESCRIPTION:
	# myMail.php
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 04-11-2016    Ficcadenti Raffaele   Creazione classe per inviare Mail      
	# -
	#
-->
<?php
	require_once("../assets/lib/mime_type.php");

	define("EOL", "\r\n");
	
	class MailBlock
	{
		protected $content_type;
		protected $charset;
		protected $content_transfer_encoding;
		public    $content;
		protected $boundary;

		public function MailBlock($content_type, $boundary, $content,$charset = "iso-8859-1", $c_t_encoding = "8bit")
		{
			$this->content_type = $content_type;
			$this->charset = $charset;
			$this->content_transfer_encoding = $c_t_encoding;
			$this->content = $content;
			$this->boundary = $boundary;
		}

		public function __toString()
		{
			$content = "--PHP-alt-" . $this->boundary . EOL;
			$content .= "Content-Type: " . $this->content_type . "; charset=" . $this->charset . EOL;
			$content .= "Content-Transfer-Encoding: " . $this->content_transfer_encoding . EOL;
			$content .= $this->content . EOL;
			//$content .= "--PHP-alt-" . $this->boundary . EOL;
			return $content;
		}
	}

	class Allegato extends MailBlock
	{
		public $url;
		public $name;
		public $description;

		public function Allegato($name, $url, $content_type, $boundary,$description = NULL)
		{
			$this->url = $url;
			$this->name = $name;
			$this->boundary = $boundary;
			$this->description = $description;
			$this->content = $this->leggi();
			parent::MailBlock($content_type, $boundary, $this->content,"utf-8", "base64");
		}

		private function leggi()
		{
			$file = @fopen($this->url, "r");
			$allegato = fread($file, filesize($this->url));
			return chunk_split(base64_encode($allegato));
		}

		public function __toString()
		{
			$content = "--PHP-mixed-" . $this->boundary . EOL;
			$content .= "Content-Type: " . $this->content_type . "; name=\"" . $this->name . "\"" . EOL;
			$content .= "Content-Transfer-Encoding: " . $this->content_transfer_encoding . EOL;
			$content .= "Content-Description: " . $this->description . EOL;
			$content .= "Content-Disposition: attachment; filename=\"" . $this->name . "\"" . EOL . EOL;
			$content .= $this->content;
			return $content;
		}
	}


	class Email
	{
		private $to_mail;
		private $object;
		private $message;
		public  $mime = "1.0";
		public  $content_type;
		private $boundary = NULL;
		public  $cc       = NULL;
		public  $bcc      = NULL;
		public  $date     = NULL;
		public  $from     = NULL;
		public  $replyto  = NULL;
		public  $xmailer  = NULL;

		public function Email($object, $content_type = "TEXT")
		{
			$this->to_mail = array();
			$this->object = $object;
			$this->message = array();
			$this->boundary = md5(time());
			$this->content_type = $content_type;
		}
		public function blocco($content_type, $content, $charset = "iso-8859-1", $c_t_encoding = "8bit")
		{
			$succ = count($this->message);
			$this->message[$succ] = new MailBlock($content_type, $this->boundary, $content, $charset, $c_t_encoding);
		}

		public function allegato($name, $url, $mime_type, $description = NULL)
		{
			$succ = count($this->message);
			$this->message[$succ] = new Allegato($name, $url,$mime_type, $this->boundary, $description);
			/* Se questo metodo viene richiamato significa che è stato inserito almeno un allegato quindi per sicurezza modifico il Content-Type a
			"multipart/mixed" */
			$this->content_type = getMIME("MULTI");
		}

		public function destinatario($to_mail)
		{
			array_push($this->to_mail, $to_mail);
		}

		public function from($from)
		{
			$this->from = $from;
		}

		public function replyTo($replyto)
		{
			$this->replyto = $replyto;
		}

		private function header()
		{
			$header = "MIME-Version: " . $this->mime . EOL;
			$header .= "Content-Type: " . $this->content_type . "; boundary=\"PHP-mixed-" . $this->boundary . "\"" . EOL;
			$header .= "Content-Transfer-Encoding: 8bit" . EOL;

			if ($this->from != NULL) { $header .= "From: " . $this->from . EOL; }
			if ($this->replyto != NULL) { $header .= "Reply-To: " .	$this->replyto . EOL; }
			if ($this->cc != NULL) { $header .= "Cc: " . $this->cc . EOL; }
			if ($this->bcc != NULL) { $header .= "Bcc: " . $this->bcc .	EOL; }
			if ($this->date != NULL) { $header .= "Date: " . $this->date . EOL; }
			if ($this->xmailer != NULL) { $header .= "X-Mailer: " .	$this->xmailer; }

			return $header;
		}

		public function printmail($str_mail)
		{
				$str=str_replace("<", "", $str_mail);
				$str=str_replace(">", "", $str);
				$str=str_replace("\r\n", "<br>", $str);
				println($str);
		}

		public function invia()
		{
			$message = "";
			$blocchi = count($this->message);
			for ($i = 0; $i < $blocchi; $i++)
			{
				$message .= $this->message[$i]; // Richiama il metodo __toString() di "Allegato" o "MailBlock"
			}
			$to = implode(", ", $this->to_mail);

			$message .= "--PHP-alt-" . $this->boundary . "--" . EOL;
			$message .= "--PHP-mixed-" . $this->boundary . "--" . EOL;
			$this->printmail($this->header());
			$this->printmail($message);
			return mail($to, $this->object, $message, $this->header());
		}

		
	}
?>