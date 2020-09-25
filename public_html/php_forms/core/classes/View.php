<?php

namespace Core;

class View
{
	protected $data;
	
	public function __construct ($data = [])
	{
		$this->data = $data;
	}
	
	public function render ($template_path)
	{
		$data = $this->data;
		
		ob_start();
		
		require $template_path;
		
		return ob_get_clean();
	}
}