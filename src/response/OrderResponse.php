<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class OrderResponse extends \carono\turbotext\ResponseAbstract
{
	/**
	 * название заказа
	 *
	 * @var string
	 */
	public $name;

	/**
	 * стоимость за 1000 знаков
	 *
	 * @var float
	 */
	public $price;

	/**
	 * статус заказа (1 - в поиске исполнителя, 2 – в работе, 3 – ожидает проверки, 4 – на доработке, 5 –
	 * одобрен и оплачен)
	 *
	 * @var int
	 */
	public $status;

	/**
	 * уникальный идентификатор исполнителя, работающего над заказом. Если равно 0, значит над заказом
	 * никто не работает.
	 *
	 * @var int
	 */
	public $worker_id;

	/**
	 * задание для копирайтера, описание заказа
	 *
	 * @var string
	 */
	public $description;

	/**
	 * дата публикации заказа
	 *
	 * @var string Y-m-d H:i:s
	 */
	public $date_add;

	/**
	 * дата последнего обновления заказа
	 *
	 * @var string Y-m-d H:i:s
	 */
	public $date_upd;

	/**
	 * тип заказа (1 - копирайтинг, 2 - рерайтинг)
	 *
	 * @var int
	 */
	public $type;

	/**
	 * минимальное необходимое количество символов
	 *
	 * @var int
	 */
	public $min_ch;

	/**
	 * максимальное необходимое количество символов
	 *
	 * @var int
	 */
	public $max_ch;

	/**
	 * заголовок статьи
	 *
	 * @var string
	 */
	public $title;

	/**
	 * анонс
	 *
	 * @var string
	 */
	public $anons;

	/**
	 * текст статьи
	 *
	 * @var string
	 */
	public $text;

	/**
	 * количество символов в тексте статьи
	 *
	 * @var int
	 */
	public $symbol_count;

	/**
	 * теги
	 *
	 * @var string
	 */
	public $tags;

	/**
	 * категория, выбранная копирайтером
	 *
	 * @var string
	 */
	public $category;

	/**
	 * картинка, прикреплённая к заказу
	 *
	 * @var string
	 */
	public $image;

	/**
	 * значение уникальности текста (если была заказана проверка)
	 *
	 * @var float
	 */
	public $unique;

	/**
	 * количество часов на выполнение заказа
	 *
	 * @var int
	 */
	public $order_time;


}
