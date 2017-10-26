<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class OrderElementResponse extends \carono\turbotext\ArrayObject
{
	/**
	 * уникальный идентификатор (номер) задачи
	 *
	 * @var int
	 */
	public $id;

	/**
	 * название задачи
	 *
	 * @var string
	 */
	public $name;

	/**
	 * стоимость за выполнение задачи
	 *
	 * @var float
	 */
	public $price;

	/**
	 * статус задание (1 - активно, 0 – выключено)
	 *
	 * @var int
	 */
	public $active;


}
