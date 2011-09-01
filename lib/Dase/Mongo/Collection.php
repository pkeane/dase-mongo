<?php

class Dase_Mongo_Collection extends Dase_Mongo 
{
    protected $mongo_collection = 'collections';
    protected $unique = 'ascii_id';

    public function __construct($assoc = false)
    {
        $fields = array(
            'ascii_id',
            'created',
            'created_by',
            'name',
        );
        parent::__construct($fields);
        if ($assoc) {
            foreach ( $assoc as $key => $value) {
                $this->$key = $value;
            }
        }
    }
}

