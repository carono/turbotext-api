<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext;

abstract class ClientAbstract extends \carono\rest\Client
{
	/**
	 * Работа с заказами на копирайтинг/рерайтинг/переводы
	 *
	 * @return \carono\turbotext\request\OrderRequest
	 */
	public function order()
	{
		return (new \carono\turbotext\request\OrderRequest($this));
	}


	/**
	 * Работа со списками исполнителей
	 *
	 * @return \carono\turbotext\request\UserRequest
	 */
	public function user()
	{
		return (new \carono\turbotext\request\UserRequest($this));
	}


	/**
	 * Работа с микрозадачами
	 *
	 * @return \carono\turbotext\request\MicroTaskRequest
	 */
	public function microTask()
	{
		return (new \carono\turbotext\request\MicroTaskRequest($this));
	}


	/**
	 * Работа с личными сообщениями
	 *
	 * @return \carono\turbotext\request\MessageRequest
	 */
	public function message()
	{
		return (new \carono\turbotext\request\MessageRequest($this));
	}
}
