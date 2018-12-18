<?php

spl_autoload_register(function($class) {
	require_once $class . ".php";
});


class Controller
{
	public function __construct()
	{
//		Вычисление первичного ключа игры
//		в боевом проекте будет браться из сессии
		$pk = isset($_GET['pk']) ? (int)$_GET['pk'] : 1;
		$this->repo = new GameRepository(new Storage());
		$this->game = $this->repo->load($pk);
	}

	/**
	 * Игрок заполняет свое поле
	 */
	public function prepare()
	{            
		if($this->game->isPrepared())
		{
			echo 'Игра подготовлена - играем. Redirect to step...'; exit;
		}
		else
		{
			$this->game->prepare('Denis', ['0:0' => 2, '0:1' => 2, /* ... */]); // проверить, что вернулось
			$this->repo->save($this->game);

			echo 'Игра не подготовлена - обновляемся. Reload method ...'; exit;
		}
	}

	/**
	 * Игрок делает ход
	 */
	public function step()
	{
		$res = $this->game->step('1', '0:0'); // проверить, что вернулось

		if($res === TRUE)
		{
			echo 'Игрок продолжает играть'; exit;
		}
		elseif($res === FALSE)
		{
			echo 'Переход хода'; exit;
		}
		else
		{
			throw new Exception('Error Processing');
		}

		$this->repo->save();
	}
}

// допустим route такой
(new Controller())->prepare();