<?php

$m = new Mongo();

$coll = $m->dase->collections;

$data = array(
		array(
				'name' => 'Art & Art History',
				'ascii_id' => 'art_history',
				'attributes' =>
				array (
						'name' => 'Title',
						'ascii_id' => 'title',
						'repeating' => 1,
						'required' => 0,
				),
				array (
						'name' => 'Description',
						'ascii_id' => 'description',
						'repeating' => 1,
						'required' => 0,
				),
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

foreach ($data as $c) {
		$coll->insert($c);
}

