<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class MessageElementResponse extends \carono\turbotext\ArrayObject
{
	/**
	 * ID пользователя от кого сообщение
	 *
	 * @var int
	 */
	public $from_id;

	/**
	 * ID пользователя кому сообщение
	 *
	 * @var int
	 */
	public $to_id;

	/**
	 * дата отправки
	 *
	 * @var string Y-m-d
	 */
	public $date;

	/**
	 * флаг прочитано сообщение или нет
	 *
	 * @var bool
	 */
	public $unread;

	/**
	 * текст сообщения
	 *
	 * @var string
	 */
	public $text;


}
