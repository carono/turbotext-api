<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class MessagesResponse extends \carono\turbotext\ResponseAbstract
{
	protected $_responseClasses = [
		'messages_array' => 'carono\turbotext\response\MessageElementResponse',
	];

	/**
	 * массив, содержащий список сообщений. Каждый элемент массива содержит:
	 * @var MessageElementResponse[]
	 */
	public $messages_array = [];


}
