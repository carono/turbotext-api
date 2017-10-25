<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class OrdersResponse extends \carono\turbotext\ResponseAbstract
{
	protected $_responseClasses = ['orders' => 'carono\turbotext\response\OrderElementResponse'];

	/**
	 * массив с микрозадачами
	 *
	 * @var OrderElementResponse[]
	 */
	public $orders = [];


}
