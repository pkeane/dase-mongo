<?php

class Dase_Handler_Collection extends Dase_Handler
{
    public $resource_map = array(
        '{ascii_id}' => 'collection',
        'form/new' => 'form',
    );

    protected function setup($r)
    {
        $this->user = $r->getUser();
    }

    public function getForm($r) 
    {
        $t = new Dase_Template($r);
        $r->renderResponse($t->fetch('collection_form.tpl'));
    }

    public function postToForm($r) 
    {
        $user = $r->getUser();
        $c = ;
        $c->ascii_id = Dase_Util::dirify($r->get('name'));
        if (!$c->findOne() and $c->ascii_id) {
            $c->name = $r->get('name');
            $c->created = date(DATE_ATOM);
            $c->created_by = $user->eid;
            $c->insert();
        } else {
            $msg = 'please use a different name';
            $params['msg'] = $msg;
            $r->renderRedirect('collection/form/new',$params);
        }
        $r->renderRedirect('home');
    }

    public function getCollection($r) 
    {
        $t = new Dase_Template($r);
        $c = new Dase_DBO_Collection($this->db);
        $c->ascii_id = $r->get('ascii_id');
        if ($c->findOne()) {
            $t->assign('c',$c);
            $r->renderResponse($t->fetch('collection.tpl'));
        }
        $r->renderError(404);
    }
}

