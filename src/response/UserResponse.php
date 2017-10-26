<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class UserResponse extends \carono\turbotext\ResponseAbstract
{
	/**
	 * ник пользователя
	 *
	 * @var string
	 */
	public $user_name;

	/**
	 * рейтинг пользователя в системе
	 *
	 * @var int
	 */
	public $user_rating;

	/**
	 * тип пользователя (1 - исполнитель, 2 - заказчик, 3 - корректор)
	 *
	 * @var int
	 */
	public $user_type;


}
