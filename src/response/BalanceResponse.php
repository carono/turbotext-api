<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class BalanceResponse extends \carono\turbotext\ResponseAbstract
{
	/**
	 * количество денег на балансе
	 * @var float
	 */
	public $balance;

	/**
	 * количество замороженных средств для выполнения заказов и
	 *                             микрозадач
	 *
	 * @var float
	 */
	public $blocked_money;


}
