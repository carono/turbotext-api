<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class TaskResponse extends \carono\turbotext\ArrayObject
{
	/**
	 * уникальный идентификатор (номер) отчёта
	 * @var int
	 */
	public $id;

	/**
	 * уникальный идентификатор исполнителя
	 * @var int
	 */
	public $user_id;

	/**
	 * стоимость за выполнение задачи
	 * @var int
	 */
	public $price;

	/**
	 * текст отчёта
	 * @var string
	 */
	public $text;


}
