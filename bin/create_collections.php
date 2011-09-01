<?php

include 'config.php';


$colls = array(
    array(
        'name' => 'Art & Art History',
        'ascii_id' => 'art_history',
    ),
    array(
        'name' => 'Works Projects Administration Photos',
        'ascii_id' => 'wpa_photos',
    ),
    array(
        'name' => 'Prewar Blues',
        'ascii_id' => 'prewar_blues',
    ),
    array(
        'name' => 'PK Photos',
        'ascii_id' => 'pk_photos',
    ),
);

foreach ($colls as $c) {
    $mc = new Dase_Mongo_Collection($c);
    //$mc->delete();
    $mc->save();
}

