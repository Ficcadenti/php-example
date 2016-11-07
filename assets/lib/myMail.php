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
	define("HIGH", "High");
	define("NORMAL", "Normal");
	define("LOW", "Low");
	define("XP1", "1");
	define("XP2", "2");
	define("XP3", "3");
	define("XP4", "4");
	define("XP5", "5");
	
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
			$content .= "Content-Transfer-Encoding: " . $this->content_transfer_encoding . EOL . EOL;
			$content .= $this->content . EOL. EOL;
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
			$content .= $this->content. EOL;
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
		private $boundary        = NULL;
		public  $cc              = NULL;
		public  $bcc             = NULL;
		public  $date            = NULL;
		public  $from            = NULL;
		public  $replyto         = NULL;
		public  $xmailer         = NULL;
		public  $xpriority       = NULL;
		public  $xmsmailpriority = NULL;
		public  $importance      = NULL;

		public function Email($object, $content_type = "TEXT")
		{
			$this->to_mail = array();
			$this->object = $object;
			$this->message = array();
			$this->boundary = md5(date('r', time()));
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

		public function cc($cc)
		{
			$this->cc = $cc;
		}

		public function bcc($bcc)
		{
			$this->bcc = $bcc;
		}

		public function date($date)
		{
			$this->date = $date;
		}

		public function xmailer($xmailer)
		{
			$this->xmailer = $xmailer;
		}

		public function xpriority($xpriority)
		{
			$this->xpriority = $xpriority;
		}

		public function xmsmailpriority($xmsmailpriority)
		{
			$this->xmsmailpriority = $xmsmailpriority;
		}

		public function importance($importance)
		{
			$this->importance = $importance;
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
			if ($this->xmailer != NULL) { $header .= "X-Mailer: " .	$this->xmailer. EOL; }
			if ($this->xpriority != NULL) { $header .= "X-Priority: " .	$this->xpriority. EOL; }
			if ($this->xmsmailpriority != NULL) { $header .= "X-MSMail-Priority: " .	$this->xmsmailpriority. EOL; }
			if ($this->importance != NULL) { $header .= "Importance: " .	$this->importance. EOL; }

			return $header;
		}

		public function printmail($str_mail)
		{
				$str=str_replace("<", "", $str_mail);
				$str=str_replace(">", "", $str);
				$str=str_replace("\r\n", "<br>", $str);
				println($str);
		}

		public function stampa()
		{
			$blocchi = count($this->message);

			$message = "--PHP-mixed-" . $this->boundary . EOL;
			$message .= "Content-Type: " . getMIME("ALT") . "; boundary=\"PHP-alt-" . $this->boundary . "\"" . EOL . EOL;

			
			for ($i = 0; $i < $blocchi; $i++)
			{

				if(($this->message[$i] instanceof Allegato)==FALSE)
				{
					$message .= $this->message[$i]; // Richiama il metodo __toString() di "MailBlock"
				}
			}
			// Metto il separatore
			$message .= "--PHP-alt-$this->boundary--". EOL . EOL;

			for ($i = 0; $i < $blocchi; $i++)
			{

				if($this->message[$i] instanceof Allegato)
				{
					$message .= $this->message[$i]; // Richiama il metodo __toString() di "Allegato"
				}
			}
			// Metto il separatore
			$message .= "--PHP-mixed-$this->boundary--". EOL . EOL;
			$to = implode(", ", $this->to_mail);

			$this->printmail($this->header());
			$this->printmail($message);
			$this->printmail($to);
		}

		public function invia()
		{
			$message = "--PHP-mixed-" . $this->boundary . EOL;
			$message .= "Content-Type: " . getMIME("ALT") . "; boundary=\"PHP-alt-" . $this->boundary . "\"" . EOL . EOL;

			$blocchi = count($this->message);
			for ($i = 0; $i < $blocchi; $i++)
			{

				if(($this->message[$i] instanceof Allegato)==FALSE)
				{
					$message .= $this->message[$i]; // Richiama il metodo __toString() di "MailBlock"
				}
			}
			// Metto il separatore
			$message .= "--PHP-alt-$this->boundary--". EOL . EOL;

			for ($i = 0; $i < $blocchi; $i++)
			{

				if($this->message[$i] instanceof Allegato)
				{
					$message .= $this->message[$i]; // Richiama il metodo __toString() di "Allegato"
				}
			}
			// Metto il separatore
			$message .= "--PHP-mixed-$this->boundary--". EOL . EOL;
			$to = implode(", ", $this->to_mail);

			return mail($to, $this->object, $message, $this->header());
		}

		
	}
?>