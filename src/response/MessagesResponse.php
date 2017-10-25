<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class MessagesResponse extends \carono\turbotext\ResponseAbstract
{
	protected $_responseClasses = ['messages_array' => 'carono\turbotext\response\MessageResponse'];

	/**
	 * массив, содержащий список сообщений. Каждый элемент массива содержит:
	 * @var MessageResponse[]
	 */
	public $messages_array = [];


}
