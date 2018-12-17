<?php

class GameRepository
{
	private $pk;
	private $storeDriver;

	public function __construct(StoreDriver $sd)
	{
		$this->storeDriver = $sd; 
	}

	public function load(int $pk) :Game
	{
		$this->pk = $pk;

		$g = new Game($pk);
// 		Конструктор Game заполнит все соответствующие свойства по pk
//		Получается конструктору Game все равно придется залазить в базу?
//		Или же найти все необходимые данные в данном методе,
//		а в модель добавить некое подобие сеттеров и насетить game данными?

		return $g;
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
		$this->storeDriver->replace('battle', $replaceData);


		$replaceData = [];

		foreach ($game->players as $player)
		{
			$replaceData[] = ['id' => $player->id, 'name' => $player->name];
		}

// 		Каким-то образом их обнвляем
//		delete + insert
		$this->storeDriver->replace('players', $replaceData);
	}
}