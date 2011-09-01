<?php

class Dase_Mongo 
{
    protected $db;
    protected $fields = array();

    function __construct($fields)
    {
        $m = new Mongo(); 
        $this->db = $m->selectDB('dase');
        foreach( $fields as $key ) {
            $this->fields[ $key ] = null;
        }
    }

    public function delete()
    {
        $mc = $this->db->selectCollection($this->mongo_collection);
        $found = $mc->findOne(array($this->unique => $this->fields[$this->unique]));
        if ($found) {
            $mc->remove(array('_id' => $found['_id']), true);
        }
    }

    public function save()
    {
        $data = array();
        $mc = $this->db->selectCollection($this->mongo_collection);
        foreach ($this->fields as $k => $v) {
            $data[$k] = $v;
        }
        //needs unique att . thinks about autogen
        if (isset($data[$this->unique])) {
            $found = $mc->findOne(array($this->unique => $data[$this->unique]));
            if ($found) {
                foreach ($data as $k => $v) {
                    $found[$k] = $v;
                }
                $mc->save($found);
            } else {
                $mc->insert($data);
            }
        }
    }

    public function __get( $key )
    {
        if ( array_key_exists( $key, $this->fields ) ) {
            return $this->fields[ $key ];
        }
        //automatically call accessor method if it exists
        $classname = get_class($this);
        $method = 'get'.ucfirst($key);
        if (method_exists($classname,$method)) {
            return $this->{$method}();
        }
    }

    public function __set( $key, $value )
    {
        if ( array_key_exists( $key, $this->fields ) ) {
            $this->fields[ $key ] = $value;
            return true;
        }
        return false;
    }

}

