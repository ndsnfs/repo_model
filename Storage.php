<?php

class Storage implements StoreDriver
{
// 	PRIMARY KEY (id)
	public static $games = [
		['id' => 1],
		['id' => 2]
	];

// 	PRIMARY KEY (id)
	public static $players =[
		['id' => 1, 'name' => 'Denis'],
		['id' => 2, 'name' => 'Jon'],
		['id' => 3, 'name' => 'Julia']
	];

// 	PRIMARY KEY (id)
	public static $sides = [
		['id' => 1, 'game_id' => 1, 'player_id' => 1]
	];

// 	PRIMARY KEY (id)
	public static $fields = [
		['id' => 1, 'side_id' => 1],
		['id' => 2, 'side_id' => 2]
	];

	public static $cells = [
		['field_id' => 1, 'coordinat' => '0:0', 'state' => 2],
		['field_id' => 1, 'coordinat' => '0:1', 'state' => 2]
	];

	public function replace(string $table, array $data){}
}