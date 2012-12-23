<?php

class HTTP_Client
	{

			var $host;
			var $port;
			var $socket;
			var $errno;
			var $errstr;
			var $timeout;
			var $buf;
			var $path;


		function HTTP_Client($host, $port, $timeout = 30)
		{
			$this->host = $host;
			$this->port = $port;
			$this->timeout = $timeout;
			$this->path = "/";
		}


		function connect() {
			$this->socket = fsockopen($this->host, $this->port, $this->errno, $this->errstr, $this->timeout);
			if(!$this->socket)
				return false;
			else
				return true;
		}


		function set_path($path)
		{
			$this->path = $path;
		}

		function send_request()
		{
			if(!$this->connect())
			{
				return false;
			}
			else
			{
				$this->buf = "";
				fwrite($this->socket, "GET $this->path HTTP/1.0\r\nHost: $this->host\r\nUser-Agent: MasteringPHP Client\r\n\r\n");
				while(!feof($this->socket))
					$this->buf = fgets($this->socket, 2048);
					$this->close();
					return true;
			}
	}

		function get_data()
		{
			return $this->buf;
		}

		function close()
		{
			fclose($this->socket);
		}
	}
