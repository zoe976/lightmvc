<?php

/**
 * 
 */
class Routes
{

	private $_listGet = array();
	private $_listPost = array();

	private function getUrl()
	{
		$url = ''; 
		$request = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : ''; 
		$self_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : ''; 
		$s = str_replace('/', '\/', str_replace('index.php', '', $self_url));
		$u = preg_replace('/'.$s.'/', '', $request, 1);
		if($request != $self_url) $url = trim($u, '/');
		return $url;
	}


	public function addGet($route, $dest)
	{
		$route = ltrim($route, '/');
		$this->_listGet[$route]=$dest;
	}

	public function addPost($route, $dest)
	{
		$route = ltrim($route, '/');
		$this->_listPost[$route]=$dest;
	}


	public function print_routes()
	{
		print_r($this->_listGet);
		print_r($this->_listPost);
	}


	public function dispatch()
	{
		$url =$this->getUrl();
		$dest='';
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$U = explode('/', $url);
			foreach ($this->_listGet as $key => $value) 
			{
				$K = explode('/', $key);
				if($K[0] === $U[0])
				{
					$dest = $value;
					if (count($U) == count($K)) 
					{
						$D = explode('@', $dest);
						$C = new $D[0];
						array_shift($U);

						call_user_func_array(array($C, $D[1]), $U);
						return true;
					} 
					
				}

			}
			return false;
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$U = explode('/', $url);
			foreach ($this->_listPost as $key => $value) {
				if($key === $url)
				{
					$dest = $value;
					$D = explode('@', $dest);
					$C = new $D[0];
					call_user_func(array($C, $D[1]), $_POST);
					return true;
					
				}
			}
			return false;
		}
	}


}

?>