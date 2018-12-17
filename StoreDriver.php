<?php

interface StoreDriver
{
	function replace(string $table, array $data);
}