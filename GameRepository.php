<?php

class GameRepository
{
	private $pk;
	private $db;

	public function __construct(StoreDriver $sd)
	{
		$this->db = $sd; 
	}

	public function load(int $pk) :Game
	{
		$this->pk = $pk;
                $tmpArr = [];
                
//                $cols = ['sides.id as side_id', 'players.id as player_id', 'players.name as player_name', 'fields.coordinat', 'fields.state'];
//                $this->db->join('fields', 'fields.side_id = sides.id');
//                $this->db->join('cells', 'cells.field_id = fields.id');
//                $this->db->join('players', 'players.id = battle.player_id');
//                $battle = $this->db->getWhere('sides', ['game_id' => $pk], $cols);
//                
//                Имитация выгрузки из DB
                $battle = [
                    ['side_id' => 100, 'player_id' => 1, 'player_name' => 'denis', 'coordinat' => '0:1', 'state' => 2],
                    ['side_id' => 100, 'player_id' => 1, 'player_name' => 'denis', 'coordinat' => '0:2', 'state' => 2],
                    ['side_id' => 100, 'player_id' => 1, 'player_name' => 'denis', 'coordinat' => '0:3', 'state' => 2],
                    ['side_id' => 200, 'player_id' => 2, 'player_name' => 'jon', 'coordinat' => '1:1', 'state' => 2],
                    ['side_id' => 200, 'player_id' => 2, 'player_name' => 'jon', 'coordinat' => '1:2', 'state' => 2],
                    ['side_id' => 200, 'player_id' => 2, 'player_name' => 'jon', 'coordinat' => '1:3', 'state' => 2],
                ];
                
                foreach ($battle as $row)
                {
                    $tmpArr[$row['side_id']]['player_id'] = $row['player_id'];
                    $tmpArr[$row['side_id']]['player_name'] = $row['player_name'];
                    $tmpArr[$row['side_id']]['field'][$row['coordinat']] = $row['state'];
                }
                
// 		Конструктор Game заполнит все соответствующие свойства по pk
//		Получается конструктору Game все равно придется залазить в базу?
//		Или же найти все необходимые данные в данном методе,
//		а в модель добавить некое подобие сеттеров и насетить game данными?

		return new Game($tmpArr);
	}

	/**
	 * Сохраняет данные игры - не важно как
	 */
	public function save(Game $game)
	{
		$replaceData = [];

		foreach ($game->fields as $playerId => $field)
		{
			$replaceData[] = ['game_id' => $this->pk, 'player_id' => $playerId];

			foreach ($field as $coordinat => $state)
			{
				// готовим данные для обновления поля
				$replaceFieldData[] = ['game_id' => $this->pk, 'player_id' => $playerId, 'coordinat' => $coordinat, 'state' => $state];
			}
		}

// 		Каким-то образом их обнвляем
//		delete + insert
		$this->db->replace('battle', $replaceData);


		$replaceData = [];

		foreach ($game->players as $player)
		{
			$replaceData[] = ['id' => $player->id, 'name' => $player->name];
		}

// 		Каким-то образом их обнвляем
//		delete + insert
		$this->db->replace('players', $replaceData);
	}
}