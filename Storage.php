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

// 	PRIMARY KEY (game_id, player_id)
	public static $battle = [
		['game_id' => 1, 'player_id' => 1],
		['game_id' => 1, 'player_id' => 2],
		['game_id' => 2, 'player_id' => 3]
	];

// 	PRIMARY KEY (game_id, player_id)
	public static $fields = [
		['game_id' => 1, 'player_id' => 1, 'coordinat' => '0:0', 'state' => 2],
		['game_id' => 1, 'player_id' => 2, 'coordinat' => '0:1', 'state' => 2]
	];

//	public static $cells = [];

	public function replace(string $table, array $data){}
}