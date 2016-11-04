<?php
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
			$content = "--" . $this->boundary . EOL;
			$content .= "Content-Type: " . $this->content_type . ";
			charset=" . $this->charset . EOL;
			$content .= "Content-Transfer-Encoding: " . $this->content_transfer_encoding . EOL;
			$content .= $this->content . EOL;
			$content .= "--" . $this->boundary . EOL;
			return $content;
		}
	}
?>