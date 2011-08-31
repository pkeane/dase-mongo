<?php

class Dase_Handler_Home extends Dase_Handler
{
	public $resource_map = array(
		'/' => 'home',
		'{id}' => 'thing',
	);

	protected function setup($r)
	{
		$this->user = $r->getUser();
	}

	public function getHome($r) 
	{
		$t = new Dase_Template($r);
		$m = new Mongo();
		$col = $m->dase->collections;
		$t->assign('collections',$col->find());
		$r->renderResponse($t->fetch('home.tpl'));
	}

	public function postToHome($r) 
	{
		$user = $r->getUser();
		//do stuff
		$r->renderRedirect('home');
	}

	public function getThing($r) 
	{
		$r->renderResponse($r->get('id'));
	}
}

