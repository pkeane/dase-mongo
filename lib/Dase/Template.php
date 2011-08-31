<?php


class Dase_Template {

	protected $smarty;

	public function __construct($request)
	{
		// make sure E_STRICT is turned off
		$er = error_reporting(E_ALL^E_NOTICE);

        spl_autoload_register('__autoload');
		require_once 'smarty/libs/Smarty.class.php';
		$this->smarty = new Smarty();
		$this->smarty->compile_dir = SMARTY_CACHE_DIR; 
		$this->smarty->caching = false;
		$this->smarty->security = false;
		//todo: confusing! $app_root shouldn't have trailing /
		$this->smarty->assign('app_root', trim($request->app_root,'/').'/');
		$this->smarty->assign('msg', $request->get('msg'));
		$this->smarty->assign('request', $request);
		$this->smarty->assign('main_title', MAIN_TITLE);
		$this->smarty->assign('page_logo_link_target', PAGE_LOGO_LINK_TARGET);
		$this->smarty->assign('page_logo_src', PAGE_LOGO_SRC);

		error_reporting($er);
	}

	public function __call($method, $args)
	{
		$er = error_reporting(E_ALL^E_NOTICE);
		$ret = call_user_func_array( array(&$this->smarty, $method), $args);
		error_reporting($er);
		return $ret;
	}

	public function __get($var)
	{
		$er = error_reporting(E_ALL^E_NOTICE);
		$ret = $this->smarty->$var;
		error_reporting($er);
		return $ret;
	}

	public function __set($var, $value)
	{
		$er = error_reporting(E_ALL^E_NOTICE);
		$ret = ($this->smarty->$var = $value);
		error_reporting($er);
		return $ret;
	}

	public function display($resource_name)
	{
		echo $this->fetch($resource_name);
	}

	public function fetch($resource_name)
	{
		$ret = $this->smarty->fetch($resource_name);
		while($resource = $this->_derived) {
			$this->_derived = null;
			$ret = $this->smarty->fetch($resource);
		}
		return $ret;
	}

	function __destruct() 
	{
		$now = Dase_Util::getTime();
		$elapsed = round($now - START_TIME,4);
		Dase_Log::debug(LOG_FILE,'finished templating '.$elapsed);
	}

	// template inheritance
	public $_blocks = array();
	public $_derived = null;
}

