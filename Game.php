<?php

class Game
{
	/**
	 * @var Массив, где ключ - player_id, а значение - объект Player
	 */
	public $players = [];

	/**
	 * @var Массив, где ключ - player_id, а значение - объект Field
	 */
	public $fields = [];

	public function __construct(int $pk)
	{ 
// 		В последующем будут заполняться fields и players
//		Ниже полная дичь, только для имитации 
		$this->fields = array_filter(Storage::$battle, function($v) use ($pk) {
			return $pk === $v['game_id'];
		});
	}

	/**
	 * @var string $playerName Играющий
	 * @var array $fieldState Координаты палуб
	 */
	public function prepare(string $playerName, array $fieldState)
	{
//		Заполняем $players созданным игроком
//		Заполняем пустое поле пришедшими кораблями и добавляем его в $fields
		return TRUE;
	}

	/**
	 * @var string $enemyId Соперник
	 * @var string $coordinat 
	 * @return bool Палуба найдена - TRUE, не найдена FALSE
	 */
	public function step(string $enemyId, string $coordinat)
	{
//		Находим поле соперника по его id(соперника)
//		Перебираем поле в поиске палубы

//		Просто имитация
		return FALSE;
	}

	/**
	 * Проверяет, готова ли игра для игры), т.е. создано ли достаточное кол-во полей и игроков
	 */	
	public function isPrepared()
	{
		return count($this->fields) === 2 ? TRUE : FALSE;
	}

	public function isEnd(){}
}